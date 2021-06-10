<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Orders;
use App\Payments;
use App\User;
use Notification;
use App\Notifications\mailNotification;
use App\Mail\sendMail;
use Illuminate\Support\Facades\Mail;
use App\Couriers;
use App\Trucks;
use App\Locations;
use App\Freight_orders;
use Session;
use App\Category;
use Illuminate\Support\Facades\DB;
use App\Truck_types;
use App\Payment_types;
use App\Order_payments;
use App\Admins;
use Illuminate\Support\Str;

class FreightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Freight_orders::orderBy("id", "desc")->get();
        return view("dashboard.freight_orders")->withData($data);
    }

    public function allOrders(Request $request){
        $id = $request->user_id;
        $user = Volantuser::find($id);
        return response()->json(Freight_orders::where("email","=",$user->email)->get(),200);
    }

    public function freightOrder(Request $request){
        $id = $request->order_id;
        return response()->json(Freight_orders::find($id),200);
    }

    public function getfreight_serviceorders(){
        return response()->json(Freight_orders::all(),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storefreightorders(Request $request)
    {
        // dd($request);

        $validator = Validator::make($request->json()->all(), [
                'packages' => 'required|max:255',
                'price' => 'required|max:50',
                'email' => 'required',
                'phone' => 'required|max:12',
                'payment' => 'required|max:50',
                'truck_category' => 'required|max:50',
                'datetime' => 'required|max:50'
            ]);

        if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }

        $order = new Orders;
        //getting truck id
        $truck = Truck_types::where("name", '=', $request->packages)->get();
        $truck_type_id = $truck[0]->id;

        //making payments
        $pay = Payment_types::where("name", '=', $request->payment)->get();
        $type_id = $pay[0]->id;

        $order_payment = new Order_payments();

        $order_payment->payment_type_id = $type_id;
        $order_payment->total = $request->price;
        $order_payment->paid_amount = 0.00;
        $order_payment->balance = $request->price;
        $order_payment->extra = 0.00;
        $order_payment->user_id = $request->user_id;
        $order_payment->status = 1;
        $order_payment->timestamp = 0;

        $order_payment->save();

        //stops count
        $locations = $request->locations;
        $stops = array();
        foreach ($locations as $loc) {
            if($loc['is_stopover'] == 1){
                $stops[] = $loc;
            }
        }
        $stops_count = count($stops);

        $order->category_id = 2;
        $order->user_id = $request->user_id;
        $order->sender_name = $request->name;
        $order->sender_phone = $request->phone;
        $order->recipient_name = $request->name;
        $order->recipient_phone = $request->phone;
        $order->truck_type_id = $truck_type_id;
        $order->package_price = $request->price;
        $order->distance = $request->distance;
        $order->stops_count = $stops_count;
        $order->description = $request->truck_category;
        $order->pickup_datetime = date("Y-m-d h:i:s", strtotime($request->pick_time));
        $order->delivery_datetime = date("Y-m-d h:i:s", strtotime($request->datetime));
        $order->instructions = $request->instructions;
        $order->payment_id = $order_payment->id;
        $order->status = 0;
        $order->device = "website";
        $uuid = 'Volant'.substr(Str::uuid()->toString(), 12, -10);
        $order->ord_no = $uuid;

        $order->save();

        foreach ($locations as $loc) {
            $location = Locations::create([
                'order_id' => $order->id,
                'location_id' => $loc['place_id'],
                'name' => $loc['name'],
                'address' => $loc['name'],
                'latitude' => $loc['lat'],
                'longitude' => $loc['lng'],
                'order_id' => $order->id,
                'is_stopover' => $loc['is_stopover'],
                'is_destination' => $loc['is_destination'],
            ])->id;

        }

        $volantuser = User::find($order->user_id);

        $volantusername = $volantuser->username;

        Mail::to($request->email)->send(new sendMail($request->packages, $order->pickup_datetime, $order->package_price, $order->instructions, $request->from, $request->to, $volantusername));

        $user = Admins::find(1);

        Mail::to('info@volantco.net')->send(new sendMail($request->packages, $order->pickup_datetime, $order->package_price, $order->instructions, $request->from, $request->to,'Admin , '.$volantusername.' Has made an order Here are the details'));

        return response()->json([
                'order' => $order,
                'token' => $order->createToken('orderToken')->accessToken,
            ]);

    }

    public function restStore(Request $request){

        $validator = Validator::make($request->all(), [
                'to' => 'required|max:255',
                'from' => 'required|max:255',
                'package' => 'required|max:255',
                'price' => 'required|max:50',
                'datetime' => 'required',
                'email' => 'required',
                'phone' => 'required|max:12',
                'payment_type' => 'required|max:50',
                'truck_category' => 'required|max:50'
            ]);

        if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }

        $order = new Freight_orders;

        $order->to = $request->to;
        $order->from = $request->from;
        $order->package = $request->package;
        $order->price = $request->price;
        $order->time = $request->datetime;
        $order->mark = 0;
        $order->cancel = 0;
        $order->payment_type = $request->payment_type;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->truck_category = $request->truck_category;
        $order->user_id = $request->user_id;
        $order->stopoverlocation = $request->stopoverlocation;

        $volantuser = Volantuser::find($order->user_id);

        $volantusername = $volantuser->name;

        Mail::to($request->email)->send(new sendMail($order->package, $order->time, $order->price, $order->truck_category, $order->to, $order->from, $volantusername));

        $data = array(
            'id' => $order->id,
            'to' => $order->to,
            'from' => $order->from,
            'package' => $order->package,
            'charge' => $order->price,
            'time' => $order->time,
            'email' => $order->email,
            'truck_category' => $order->truck_category ,
            'phone' => $order->phone
        );

        $user = User::find(1);

        $details = [
            'greeting' => 'Hi Admin',
            'body' => $data['email'].' made an order'.' details are as follows'.' to: '.$data['to'].' from: '.$data['from'].' package name: '.$data['package'].' Phone Number: '.$data['phone'],
            'thanks' => 'This Freight & Cargo order was made from website volantco.net',
            'actionText' => 'View this Site',
            'actionURL' => url('/'),
            'order_id' => $data['id']
        ];

        Notification::send($user, new mailNotification($details));

        $order->save();

        return response()->json([
                'order' => $order,
                'token' => $order->createToken('orderToken')->accessToken,
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Freight_orders::find($id);
        return view("dashboard.showFreightorder")->withData($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dispatch($id)
    {
        $data = Freight_orders::find($id);
        $user_id = $data->user_id;
        $volantuser = Volantuser::find($user_id);
        $driver = Couriers::all();
        $trucks = Trucks::all();
        return view("dashboard.dispatch")->withData($data)->withVolantuser($volantuser)->withDriver($driver)->withTrucks($trucks)->withId($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Freight_orders::find($id) ;
        $order->delete() ;
        return redirect('/freight_orders/')->with('success', 'Freight Order successfully removed');
    }

    public function deleteOrder(Request $request)
    {

        $id = $request->id;
        $order = Freight_orders::find($id);

        $order->delete();

        return response()->json([
                'order' => $order,
                'token' => $order->createToken('orderToken')->accessToken,
            ]);
    }

    public function complete(Request $request)
    {
        $id = $request->id;
        $mark = $request->mark;
        $order = Freight_orders::find($id);
        $order->mark = $mark;
        $order->save();
        return $order->id;
    }

    public function cancel(Request $request)
    {
        $id = $request->id;
        $order = Freight_orders::find($id);
        $order->cancel = 1;
        $order->save();
        return $order->id;
    }
}
