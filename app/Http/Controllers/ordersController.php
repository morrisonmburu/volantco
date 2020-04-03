<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Orders;
use App\Payments;
use App\User;
use Notification;
use App\Volantuser;
use App\Notifications\mailNotification;
use App\Mail\sendMail;
use Illuminate\Support\Facades\Mail;

class ordersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Orders::orderBy("id", "desc")->get();
        return view("dashboard.orders")->withData($data);
    }

    public function allOrders(Request $request){
        $id = $request->user_id;
        $user = Volantuser::find($id);
        return response()->json(Orders::where("email","=",$user->email)->get(),200);
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
                'phone' => 'required|max:12',
                'payment' => 'required|max:50'
            ]);

        if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }

        // $consumerKey = 'caIceAtGRLG8dC1kLx331naGDEldcEX9';
        // $consumerSecret = 'BMYVBob7kDPhNAxe';

        // $headers = ['Content-Type:application/json; charset-utf8'];

        // $acces_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        // $curl = curl_init();
        // curl_setopt($curl, CURLOPT_URL, $acces_token_url);
        // $credentials = base64_encode($consumerKey.':'.$consumerSecret);
        // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
        // curl_setopt($curl, CURLOPT_HEADER, false);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        // $curl_response = curl_exec($curl);
        // $access_token = json_decode($curl_response)->access_token;

        // //lipa na mpesa online
        // //initiating the transaction

        // $initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

        // $BusinessShortCode = '174379';
        // $Timestamp = '20'.date("ymdhis");
        // $PartyA = $phone;
        // $Amount = $Amount1;
        // $CallBackURL = 'https://lepheme-solution.co.ke/callback.php';
        // $passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        // $Password = base64_encode($BusinessShortCode.$passkey.$Timestamp);
        // $AccountReference = 'lepheme-solutions2019';
        // $TransactionDesc = 'cart payment for lepheme-solutions.co.ke';


        // $curl = curl_init();
        // curl_setopt($curl, CURLOPT_URL, $initiate_url);
        // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token));

        // // curl_setopt($curl, CURLOPT_URL, $initiate_url);
        // // curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader); //setting custom header

        // $curl_post_data = array(
        //   //Fill in the request parameters with valid values
        //   'BusinessShortCode' => $BusinessShortCode,
        //   'Password' => $Password,
        //   'Timestamp' => $Timestamp,
        //   'TransactionType' => 'CustomerPayBillOnline',
        //   'Amount' => $Amount1,
        //   'PartyA' => $PartyA,
        //   'PartyB' => $BusinessShortCode,
        //   'PhoneNumber' => $PartyA,
        //   'CallBackURL' => $CallBackURL,
        //   'AccountReference' => $AccountReference,
        //   'TransactionDesc' => $TransactionDesc
        // );

        // $data_string = json_encode($curl_post_data);

        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_POST, true);
        // curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

        // $curl_response = curl_exec($curl);
        // // print_r($curl_response);

        // // echo $curl_response;

        // $data = json_decode($curl_response);

        // // dd($data);

        // $pay = new Payments();

        // $pay->MerchantRequestID = $data->MerchantRequestID;
        // $pay->CheckoutRequestID = $data->CheckoutRequestID;
        // $pay->ResponseCode = $data->ResponseCode;
        // $pay->ResponseDescription = $data->ResponseDescription;
        // $pay->CustomerMessage = $data->CustomerMessage;
        // $pay->ResultDesc = '';

        $order = new Orders;

        $order->to = $request->to;
        $order->from = $request->from;
        $order->package = $request->packages;
        $order->price = $request->price;
        $order->time = $request->datetime;
        $order->mark = 0;
        $order->cancel = 0;
        $order->payment_type = $request->payment;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->instructions = $request->instructions;

        Mail::to($request->email)->send(new sendMail($order->package, $order->time, $order->price, $order->instructions, $order->to, $order->from, $order->time));

        $data = array( 
            'id' => $order->id,
            'to' => $order->to,
            'from' => $order->from,
            'package' => $order->package,
            'charge' => $order->price,
            'time' => $order->time,
            'email' => $order->email,
            'intructions' => $order->instructions ,
            'phone' => $order->phone
        );

        $user = User::find(1);
  
        $details = [
            'greeting' => 'Hi Admin',
            'body' => $data['email'].' made an order'.' details are as follows'.' to: '.$data['to'].' from: '.$data['from'].' package name: '.$data['package'].' Phone Number: '.$data['phone'],
            'thanks' => 'This order was made from website volantco.net',
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
        $data = Orders::find($id);
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
        return view("dashboard.dispatch")->withData($data);
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
        $order = Orders::find($id) ;
        $order->delete() ;
        return redirect('/orders/')->with('success', 'Order successfully removed');
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
        $mark = $request->mark;
        $order = Orders::find($id);
        $order->mark = $mark;
        $order->save();
        return $order->id;
    }

    public function cancel(Request $request)
    {
        $id = $request->id;
        $order = Orders::find($id);
        $order->cancel = 1;
        $order->save();
        return $order->id;
    }
}
