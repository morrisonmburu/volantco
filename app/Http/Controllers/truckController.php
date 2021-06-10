<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trucks;


class truckController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Trucks::orderBy("id", "desc")->paginate(5);
        return view("dashboard.truck.index")->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.truck.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'truckNo' => 'required|numeric',
            'truckType' => 'required|alpha',
            'ownership' => 'required',
        ]);

        $truck1 = new Trucks;
        $truck1->truckNo = $request->input('truckNo');
        $truck1->type = $request->input('truckType');
        $truck1->ownerShipType = $request->input('ownership');
        $truck1->comments = $request->input('comments');
        $truck1->save();
        return redirect('/truck/')->with('success', 'Truck successfully added to the list');
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
        $data = Trucks::find($id);
        return view("dashboard.truck.edit")->withData($data);
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
        $this->validate($request, [
            'truckNo' => 'required|numeric',
            'truckType' => 'required|alpha',
            'ownership' => 'required',
        ]);

        $truck1 = Trucks::find($id) ;
        $truck1->truckNo = $request->input('truckNo') ;
        $truck1->type = $request->input('truckType') ;
        $truck1->ownerShipType = $request->input('ownership') ;
        $truck1->comments = $request->input('comments') ;
        $truck1->save() ;
        return redirect('/truck/')->with('success', 'Truck successfully Updated');
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

// if($request->payment == 'mpesa'){
        //
        //     $phone1 =  str_replace(' ', '', $request->phone);
        //     $phone2 = ltrim($phone1, 0);
        //     $amount = str_replace(' ', '', $request->price);
        //     $Amount1 = "10";
        //
        //     $phone = "254".$phone2;
        //
        //     $consumerKey = 'caIceAtGRLG8dC1kLx331naGDEldcEX9';
        //     $consumerSecret = 'BMYVBob7kDPhNAxe';
        //
        //     $headers = ['Content-Type:application/json; charset-utf8'];
        //
        //     $acces_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        //
        //     $curl = curl_init();
        //     curl_setopt($curl, CURLOPT_URL, $acces_token_url);
        //     $credentials = base64_encode($consumerKey.':'.$consumerSecret);
        //     curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
        //     curl_setopt($curl, CURLOPT_HEADER, false);
        //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        //     $curl_response = curl_exec($curl);
        //     $access_token = json_decode($curl_response)->access_token;
        //
        //     //lipa na mpesa online
        //     //initiating the transaction
        //
        //     $initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        //
        //     $BusinessShortCode = '174379';
        //     $Timestamp = '20'.date("ymdhis");
        //     $PartyA = $phone;
        //     $Amount = $Amount1;
        //     $CallBackURL = 'https://volantco.net/callback.php';
        //     $passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        //     $Password = base64_encode($BusinessShortCode.$passkey.$Timestamp);
        //     $AccountReference = 'volant courier 2020';
        //     $TransactionDesc = 'Order Payment for volant.net';
        //
        //
        //     $curl = curl_init();
        //     curl_setopt($curl, CURLOPT_URL, $initiate_url);
        //     curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token));
        //
        //     // curl_setopt($curl, CURLOPT_URL, $initiate_url);
        //     // curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader); //setting custom header
        //
        //     $curl_post_data = array(
        //       //Fill in the request parameters with valid values
        //       'BusinessShortCode' => $BusinessShortCode,
        //       'Password' => $Password,
        //       'Timestamp' => $Timestamp,
        //       'TransactionType' => 'CustomerPayBillOnline',
        //       'Amount' => $Amount1,
        //       'PartyA' => $PartyA,
        //       'PartyB' => $BusinessShortCode,
        //       'PhoneNumber' => $PartyA,
        //       'CallBackURL' => $CallBackURL,
        //       'AccountReference' => $AccountReference,
        //       'TransactionDesc' => $TransactionDesc
        //     );
        //
        //     $data_string = json_encode($curl_post_data);
        //
        //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //     curl_setopt($curl, CURLOPT_POST, true);
        //     curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        //
        //     $curl_response = curl_exec($curl);
        //     // print_r($curl_response);
        //
        //     // echo $curl_response;
        //
        //     $data = json_decode($curl_response);
        //
        //     $pay = new Payments();
        //
        //     $pay->MerchantRequestID = $data->MerchantRequestID;
        //     $pay->CheckoutRequestID = $data->CheckoutRequestID;
        //     $pay->ResponseCode = $data->ResponseCode;
        //     $pay->ResponseDescription = $data->ResponseDescription;
        //     $pay->CustomerMessage = $data->CustomerMessage;
        //     $pay->ResultDesc = '';
        //
        //     $pay->save();
        // }

// $push_notification_key = 'AAAA3aHvQ3E:APA91bHUih1NrUnxhzRnjsPNrPVSIHtaCA4ZI8xF8EQ0y64dX3Z0oplzRX5V1f8X-6O-cD8uS4IXCibP-zwTE1u5eOVzbM99TwliNxWEdefROduYLEIpRH4PJ5q_JUcmM0FUK0IegW0m';
//         $url = "https://fcm.googleapis.com/fcm/send";
//         $header = array("authorization: key=" . $push_notification_key . "",
//             "content-type: application/json");
//         $message = 'Hello!😎 You are receiving this email because we Have dispatched your order and matched you with a suitable driver. The details are as follows';
//         $title = 'Volant co Ltd';
//         // $fcm_key = 'BBBg_OtlH8Oxlg7KKMubEHGK9Q7ewtt8hrxglShmytuiCcI4VrAIJopaKhqjHYiAlFg1NFmT_nnCvFHG1NGM_js';
//         $postdata = '{
//             "to" : "/topics/testTopic",
//                 "notification" : {
//                     "title":"' . $title . '",
//                     "text" : "' . $message . '"
//                 },
//             "data" : {
//                 "id" : "'.$request->orderNo.'",
//                 "title":"' . $title . '",
//                 "description" : "' . $message . '",
//                 "text" : "' . $message . '",
//                 "is_read": 0
//               }
//         }';


//         $ch = curl_init();
//         $timeout = 120;
//         curl_setopt($ch, CURLOPT_URL, $url);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//         curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
//         curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//         curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
//         curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

//         // Get URL content
//         $result = curl_exec($ch);    
//         // close handle to release resources
//         curl_close($ch);

//         dd($result);