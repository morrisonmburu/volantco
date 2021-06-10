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
use Illuminate\Support\Facades\DB;
use App\Truck_types;
use App\Payment_types;
use App\Order_payments;
use App\Admins;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class ordersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('orders')
                    ->join('locations', 'locations.order_id', '=', 'orders.id')
                    ->join('categories', 'categories.id', '=', 'orders.category_id')
                    ->join('truck_types', 'truck_types.id', '=', 'orders.truck_type_id')
                    ->join('order_payments', 'order_payments.id', '=', 'orders.payment_id')
                    ->join('payment_types', 'payment_types.id', '=', 'order_payments.payment_type_id')
                    ->select('orders.*','locations.*', 'categories.name as category', 'truck_types.*', 'order_payments.total', 'payment_types.name as payment_type', 'locations.name as address')
                    ->where('locations.is_stopover', '=', 0)
                    // ->orderBy('order_id', 'desc')
                    // ->havingRaw('count("order_id") >= 1')
                    ->get();

        $previous_id = 0;
        foreach($data as $key => $order){
           $order->origin = [];
           $order->destination = $order->address;
               if ($previous_id == $order->order_id) {
                 $minKey = $key-1;
                 if (!empty($data[$minKey]->origin)) {
                    $order->origin = array_merge($order->origin, $data[$minKey]->origin);
                    }else {
                      array_push($order->origin, $order->destination, $data[$minKey]->address);
                  }
                  unset($data[$minKey]);
              }else {
                array_push($order->origin,$order->destination);
            }
            $previous_id = $order->order_id;
        }
        $data = $data->sortBy('order_id');

        $unassigned = Orders::where('status', '=', 0)->get();
        $accepted = Orders::where('status', '=', 1)->get();
        $picked_up = Orders::where('status', '=', 2)->get();
        $in_transit = Orders::where('status', '=', 3)->get();
        $complete = Orders::where('status', '=', 4)->get();
        $cancelled = Orders::where('status', '=', 5)->get();

        $orderstats = [
          'unassigned' => count($unassigned),
          'accepted' => count($accepted),
          'picked_up' => count($picked_up),
          'in_transit' => count($in_transit),
          'complete' => count($complete),
          'cancelled' => count($cancelled),
        ];

        return view("dashboard.metro_orders")->withData($data)->withOrderstats($orderstats);
    }

    public function allOrders(Request $request){
        $id = $request->user_id;

        $data = DB::table('orders')
                    ->join('locations', 'locations.order_id', '=', 'orders.id')
                    ->join('categories', 'categories.id', '=', 'orders.category_id')
                    ->join('truck_types', 'truck_types.id', '=', 'orders.truck_type_id')
                    ->join('order_payments', 'order_payments.id', '=', 'orders.payment_id')
                    ->join('payment_types', 'payment_types.id', '=', 'order_payments.payment_type_id')
                    ->select('orders.*','locations.*', 'categories.name as category', 'truck_types.*', 'order_payments.total', 'payment_types.name as payment_type', 'locations.name as address', 'orders.created_at as orders_created_at')
                    ->where('locations.is_stopover', '=', 0)
                    ->where('orders.user_id', '=', $id)
                    ->get();

        $previous_id = 0;
        foreach($data as $key => $order){
           $order->origin = [];
           $order->destination = $order->address;
               if ($previous_id == $order->order_id) {
                 $minKey = $key-1;
                 if (!empty($data[$minKey]->origin)) {
                    $order->origin = array_merge($order->origin, $data[$minKey]->origin);
                    }else {
                      array_push($order->origin, $order->destination, $data[$minKey]->address);
                  }
                  unset($data[$minKey]);
              }else {
                array_push($order->origin,$order->destination);
            }
            $previous_id = $order->order_id;
        }
        // $data = $data->sortBy('order_id');

        return response()->json($data ,200);
    }

    public function getorder(Request $request){
        $id = $request->order_id;

        $data = DB::table('orders')
                    ->join('locations', 'locations.order_id', '=', 'orders.id')
                    ->join('categories', 'categories.id', '=', 'orders.category_id')
                    ->join('truck_types', 'truck_types.id', '=', 'orders.truck_type_id')
                    ->join('order_payments', 'order_payments.id', '=', 'orders.payment_id')
                    ->join('payment_types', 'payment_types.id', '=', 'order_payments.payment_type_id')
                    ->select('orders.*','locations.*', 'categories.name as category', 'truck_types.*', 'order_payments.total', 'payment_types.name as payment_type', 'locations.name as address', 'orders.created_at as created_at')
                    ->where('locations.is_stopover', '=', 0)
                    ->where('locations.order_id', '=', $id)
                    ->get();

        $previous_id = 0;
        foreach($data as $key => $order){
           $order->origin = [];
           $order->destination = $order->address;
               if ($previous_id == $order->order_id) {
                 $minKey = $key-1;
                 if (!empty($data[$minKey]->origin)) {
                    $order->origin = array_merge($order->origin, $data[$minKey]->origin);
                    }else {
                      array_push($order->origin, $order->destination, $data[$minKey]->address);
                  }
                  unset($data[$minKey]);
              }else {
                array_push($order->origin,$order->destination);
            }
            $previous_id = $order->order_id;
        }
        // $data = $data->sortBy('order_id');

        return response()->json($data ,200);
    }

    public function getDataStream(Request $request, $id){

        $response = new \Symfony\Component\HttpFoundation\StreamedResponse(function() use ($request, $id) {
            // $notif = 'Test';
            $data = DB::table('orders')
                    ->join('locations', 'locations.order_id', '=', 'orders.id')
                    ->join('categories', 'categories.id', '=', 'orders.category_id')
                    ->join('truck_types', 'truck_types.id', '=', 'orders.truck_type_id')
                    ->join('order_payments', 'order_payments.id', '=', 'orders.payment_id')
                    ->join('payment_types', 'payment_types.id', '=', 'order_payments.payment_type_id')
                    ->select('orders.*','locations.*', 'categories.name as category', 'truck_types.*', 'order_payments.total', 'payment_types.name as payment_type', 'locations.name as address', 'orders.created_at as created_at')
                    ->where('locations.is_stopover', '=', 0)
                    ->where('locations.order_id', '=', $id)
                    ->get();

                $previous_id = 0;
                foreach($data as $key => $order){
                   $order->origin = [];
                   $order->destination = $order->address;
                       if ($previous_id == $order->order_id) {
                         $minKey = $key-1;
                         if (!empty($data[$minKey]->origin)) {
                            $order->origin = array_merge($order->origin, $data[$minKey]->origin);
                            }else {
                              array_push($order->origin, $order->destination, $data[$minKey]->address);
                          }
                          unset($data[$minKey]);
                      }else {
                        array_push($order->origin,$order->destination);
                    }
                    $previous_id = $order->order_id;
                }

            echo 'data: ' . json_encode($data) . "\n\n";
            ob_flush();
            flush();
            usleep(200000);
        });
        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('X-Accel-Buffering', 'no');
        $response->headers->set('Cach-Control', 'no-cache');
        return $response;
    }

    public function gettrackOrders(){
        return response()->json(
            Orders::select("id", "to as orders_to", "from as orders_from", "time as orders_time", "email as orders_email", "user_id as orders_user_id")->get(),200);
    }

    public function getOrders(){
        return response()->json(DB::table('locations')->groupBy('order_id')->join('orders', 'orders.id', '=', 'locations.order_id')->join('categories', 'categories.id', '=', 'orders.category')->select('orders.*','locations.*', 'categories.name as category')->get(),200);
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
    public function store(Request $request)
    {
        // dd($request);

        $validator = Validator::make($request->json()->all(), [
                'to' => 'required|max:255',
                'from' => 'required|max:255',
                'packages' => 'required|max:255',
                'price' => 'required|max:50',
                'datetime' => 'required',
                'email' => 'required',
                'sender_phone' => 'required|max:50',
                'payment' => 'required|max:50'
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

        // ALTER TABLE `orders` ADD `volant_order_id` TEXT NULL AFTER `id`;

        $order->category_id = 1;
        $order->user_id = $request->user_id;
        $order->sender_name = $request->sender_name;
        $order->sender_phone = $request->sender_phone;
        $order->recipient_name = $request->recipient_name;
        $order->recipient_phone = $request->recipient_phone;
        $order->truck_type_id = $truck_type_id;
        $order->package_price = $request->price;
        $order->distance = $request->distance;
        $order->stops_count = $stops_count;
        $order->description = $request->instructions;
        $order->pickup_datetime = date("Y-m-d H:i:s", strtotime($request->datetime));
        $order->instructions = $request->instructions;
        $order->payment_id = $order_payment->id;
        $order->status = 0;
        $order->device = "website";
        $order->created_at = Carbon::now()->setTimezone('GMT+3');
        $uuid = str_random(15);
        $order->ord_no = strtoupper($uuid);

        // ALTER TABLE `orders` ADD `ord_no` VARCHAR(50) NULL AFTER `id`;

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

        // Mail::to($request->email)->send(new sendMail($request->packages, $order->pickup_datetime, $order->package_price, $order->instructions, $request->from, $request->to, $volantusername, $order->description, 'Metro Deliveries'));

        $user = Admins::find(1);

        // Mail::to('info@volantltd.com')->send(new sendMailAdmin($request->packages, $order->pickup_datetime, $order->package_price, $order->instructions, $request->from, $request->to,'Admin , '.$volantusername.' Has made an order Here are the details'));

        return response()->json([
                'order' => $order,
                'token' => $order->createToken('orderToken')->accessToken,
            ]);

    }

    // public function restStore(Request $request){

    //     // dd($request);

    //     $validator = Validator::make($request->all(), [
    //             'to' => 'required|max:255',
    //             'from' => 'required|max:255',
    //             'package' => 'required|max:255',
    //             'price' => 'required|max:50',
    //             'datetime' => 'required',
    //             'email' => 'required',
    //             'phone' => 'required|max:12',
    //             'payment_type' => 'required|max:50'
    //         ]);

    //     if ($validator->fails()) {
    //             return response()->json(['error' => $validator->errors()], 401);
    //         }

    //     // if($request->payment_type == 'mpesa'){

    //     //     $phone1 =  str_replace(' ', '', $request->phone);
    //     //     $phone2 = ltrim($phone1, 0);
    //     //     $amount = str_replace(' ', '', $request->price);
    //     //     $Amount1 = "10";

    //     //     $phone = "254".$phone2;

    //     //     // dd($phone);

    //     //     $consumerKey = 'caIceAtGRLG8dC1kLx331naGDEldcEX9';
    //     //     $consumerSecret = 'BMYVBob7kDPhNAxe';

    //     //     $headers = ['Content-Type:application/json; charset-utf8'];

    //     //     $acces_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

    //     //     $curl = curl_init();
    //     //     curl_setopt($curl, CURLOPT_URL, $acces_token_url);
    //     //     $credentials = base64_encode($consumerKey.':'.$consumerSecret);
    //     //     curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
    //     //     curl_setopt($curl, CURLOPT_HEADER, false);
    //     //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    //     //     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    //     //     $curl_response = curl_exec($curl);
    //     //     $access_token = json_decode($curl_response)->access_token;

    //     //     //lipa na mpesa online
    //     //     //initiating the transaction

    //     //     $initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

    //     //     $BusinessShortCode = '174379';
    //     //     $Timestamp = '20'.date("ymdhis");
    //     //     $PartyA = $phone;
    //     //     $Amount = $Amount1;
    //     //     $CallBackURL = 'https://volantco.net/callback.php';
    //     //     $passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
    //     //     $Password = base64_encode($BusinessShortCode.$passkey.$Timestamp);
    //     //     $AccountReference = 'volant courier 2020';
    //     //     $TransactionDesc = 'Order Payment for volant.net';


    //     //     $curl = curl_init();
    //     //     curl_setopt($curl, CURLOPT_URL, $initiate_url);
    //     //     curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token));

    //     //     // curl_setopt($curl, CURLOPT_URL, $initiate_url);
    //     //     // curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader); //setting custom header

    //     //     $curl_post_data = array(
    //     //       //Fill in the request parameters with valid values
    //     //       'BusinessShortCode' => $BusinessShortCode,
    //     //       'Password' => $Password,
    //     //       'Timestamp' => $Timestamp,
    //     //       'TransactionType' => 'CustomerPayBillOnline',
    //     //       'Amount' => $Amount1,
    //     //       'PartyA' => $PartyA,
    //     //       'PartyB' => $BusinessShortCode,
    //     //       'PhoneNumber' => $PartyA,
    //     //       'CallBackURL' => $CallBackURL,
    //     //       'AccountReference' => $AccountReference,
    //     //       'TransactionDesc' => $TransactionDesc
    //     //     );

    //     //     $data_string = json_encode($curl_post_data);

    //     //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //     //     curl_setopt($curl, CURLOPT_POST, true);
    //     //     curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

    //     //     $curl_response = curl_exec($curl);
    //     //     // print_r($curl_response);

    //     //     // echo $curl_response;

    //     //     $data = json_decode($curl_response);

    //     //     $pay = new Payments();

    //     //     try {
    //     //         $pay->MerchantRequestID = $data->MerchantRequestID;
    //     //         $pay->CheckoutRequestID = $data->CheckoutRequestID;
    //     //         $pay->ResponseCode = $data->ResponseCode;
    //     //         $pay->ResponseDescription = $data->ResponseDescription;
    //     //         $pay->CustomerMessage = $data->CustomerMessage;
    //     //         $pay->ResultDesc = '';

    //     //         $pay->save();
    //     //     } catch (Exception $e) {
    //     //         echo $e;
    //     //     }
    //     // }

    //     $order = new Orders;

    //     $order->to = $request->to;
    //     $order->from = $request->from;
    //     $order->package = $request->package;
    //     $order->price = $request->price;
    //     $order->time = $request->datetime;
    //     $order->mark = 0;
    //     $order->cancel = 0;
    //     $order->payment_type = $request->payment_type;
    //     $order->email = $request->email;
    //     $order->phone = $request->phone;
    //     $order->instructions = $request->instructions;
    //     $order->user_id = $request->user_id;
    //     $order->stopoverlocation = $request->stopoverlocation;

    //     $volantuser = User::find($order->user_id);

    //     $volantusername = $volantuser->name;

    //     Mail::to($request->email)->send(new sendMail($order->package, $order->time, $order->price, $order->instructions, $order->to, $order->from, $volantusername));

    //     $data = array(
    //         'id' => $order->id,
    //         'to' => $order->to,
    //         'from' => $order->from,
    //         'package' => $order->package,
    //         'charge' => $order->price,
    //         'time' => $order->time,
    //         'email' => $order->email,
    //         'intructions' => $order->instructions ,
    //         'phone' => $order->phone
    //     );

    //     $user = User::find(1);

    //     $details = [
    //         'greeting' => 'Hi Admin',
    //         'body' => $data['email'].' made an order'.' details are as follows'.' to: '.$data['to'].' from: '.$data['from'].' package name: '.$data['package'].' Phone Number: '.$data['phone'],
    //         'thanks' => 'This order was made from website volantco.net',
    //         'actionText' => 'View this Site',
    //         'actionURL' => url('/'),
    //         'order_id' => $data['id']
    //     ];

    //     Notification::send($user, new mailNotification($details));

    //     $order->save();

    //     return response()->json([
    //             'order' => $order,
    //             'token' => $order->createToken('orderToken')->accessToken,
    //         ]);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = DB::table('orders')
                    ->join('locations', 'locations.order_id', '=', 'orders.id')
                    ->join('categories', 'categories.id', '=', 'orders.category_id')
                    ->join('truck_types', 'truck_types.id', '=', 'orders.truck_type_id')
                    ->join('order_payments', 'order_payments.id', '=', 'orders.payment_id')
                    ->join('payment_types', 'payment_types.id', '=', 'order_payments.payment_type_id')
                    ->join('users', 'users.id', '=', 'orders.user_id')
                    ->select('orders.*','locations.*', 'categories.name as category', 'truck_types.*', 'order_payments.total', 'payment_types.name as payment_type', 'locations.name as address', 'users.username as client_name', 'users.phone as client_phone', 'orders.created_at as order_created_at')
                    ->where('orders.id', '=', $id)
                    ->get();

        $previous_id = 0;
        foreach($data as $key => $order){
           $order->origin = [];
           $order->destination = $order->address;
               if ($previous_id == $order->order_id) {
                 $minKey = $key-1;
                 if (!empty($data[$minKey]->origin)) {
                    $order->origin = array_merge($order->origin, $data[$minKey]->origin);
                    }else {
                      array_push($order->origin, $order->destination, $data[$minKey]->address);
                  }
                  unset($data[$minKey]);
              }else {
                array_push($order->origin,$order->destination);
            }
            $previous_id = $order->order_id;
        }

        return view("dashboard.showOrder")->withData($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dispatch($id)
    {
        $data = Orders::find($id);
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
    public function destroy(Request $request)
    {
        $id = $request->id;
        $order = Orders::find($id) ;
        $order->delete() ;
        return $request->id;
    }

    public function deleteOrder(Request $request)
    {
        $id = $request->id;
        $order = Orders::find($id);

        $order->delete();

        return response()->json([
                'order' => $order,
                'token' => $order->createToken('orderToken')->accessToken,
            ]);
    }

    public function complete(Request $request)
    {
        $id = $request->id;
        $order = Orders::find($id);
        $order->status = 2;
        $order->save();
        return $order->id;
    }

    public function cancel(Request $request)
    {
        $id = $request->id;
        $order = Orders::find($id);
        $order->status = 3;
        $order->save();
        return $order->id;
    }

    public function testData(Request $request)
    {
        $logfile = "response.txt";
        $log = fopen($logfile, "a");
        fwrite($log, $request);
        fclose($log);
    }

    public function testWebHook(Request $request){
       // https://volantltd.com/volantWebHook
        $input = $request->all();
        Log::info('received response');
        Log::info($input);
    }
}
