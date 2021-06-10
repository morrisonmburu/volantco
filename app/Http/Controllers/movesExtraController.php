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
use App\Mail\sendMailAdmin;
use Illuminate\Support\Facades\Mail;
use App\Couriers;
use App\Trucks;
use App\Locations;
use App\Category;
use App\Extra_moves;
use App\Truck_types;
use App\Payment_types;
use App\Order_payments;
use Illuminate\Support\Facades\DB;
use App\Admins;
use App\MovesModel;
use Carbon\Carbon;

class movesExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function storemovesorder(Request $request)
    {

        $validator = Validator::make($request->json()->all(), [
                'service' => 'required',
                'selectedHouse' => 'required',
            ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $order = new Orders;

        $truck_id = 0;

        if($request->selectedHouse == 'Bedsitter' || $request->selectedHouse == 'Studio Apartment'){
          $truck_id = 5;
        }else if($request->selectedHouse == 'One Bedroom House'){
          $truck_id = 6;
        }else{
          $truck_id = 7;
        }

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

        $order->category_id = 3;
        $order->user_id = $request->user_id;
        $order->sender_name = $request->sender_name;
        $order->sender_phone = $request->sender_phone;
        $order->recipient_name = $request->recipient_name;
        $order->recipient_phone = $request->recipient_phone;
        $order->truck_type_id = $truck_id;
        $order->package_price = $request->price;
        $order->distance = $request->distance;
        $order->stops_count = $stops_count;
        $order->description = 'Packaging and Moves';
        $uuid = str_random(15);
        $order->ord_no = strtoupper($uuid);

        if($request->pickup_time == ''){
          $order->pickup_datetime = Carbon::now()->setTimezone('GMT+3');
        }else{
          $order->pickup_datetime = date('Y-m-d h:m:s', strtotime($request->pickup_time));
        }

        $order->instructions = $request->instructions;
            if ($request->instructions == null) {
            $order->instructions = 'N/A' ;
        }

        $order->payment_id = $order_payment->id;
        $order->status = 0;
        $order->device = "website";

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

        $pcp = json_encode($request->selectedPack);
        $other = json_encode($request->sendData2);
        $type_of_rooms = json_encode($request->sendData);
        
        $house = DB::table('house_type')->where('title', '=', $request->selectedHouse)->get();
        $moves_extra = MovesModel::create([
            'order_id' => $order->id,
            'house_type_id' => $house[0]->id,
            'rooms_count' => $house[0]->least_room_counts,
            'type_of_rooms' => $type_of_rooms,
            'pcp' => $pcp,
            'other_services' => $other,
        ]);

        $volantuser = User::find($order->user_id);

        $volantusername = $volantuser->username;

        // Mail::to($request->email)->send(new sendMail($request->packages, $order->pickup_datetime, $order->package_price, $order->instructions, $request->from, $request->to, $volantusername, $order->description, 'Packaging & Moves'));

        $user = Admins::find(1);

        // Mail::to('morrisonmburu7@gmail.com')->send(new sendMailAdmin($request->packages, $order->pickup_datetime, $order->package_price, $order->instructions, $request->from, $request->to,'Admin , '.$volantusername.' Has made an order Here are the details'));

        return response()->json([
            'order' => $order,
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
