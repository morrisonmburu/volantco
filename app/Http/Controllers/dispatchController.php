<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use App\Dispatch;
use App\Couriers;
use App\Trucks;
use App\Orders;
use App\User;
use App\Mail\DispatchMail;
use App\Mail\DispatchMail2;
use Illuminate\Support\Facades\Mail;

class dispatchController extends Controller
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
        $data = Dispatch::orderBy("id", "desc")->paginate(10);
        return view("dashboard.dispatch.index")->withData($data);
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

        $this->validate($request, [
            'orderNo' => 'required',
            'driverNo' => 'required',
            'DriverPhone' => 'required'
        ]);

        $driverNo = Couriers::find($request->driverNo);
        $orderNo = Orders::find($request->orderNo);
        $customerName = User::find($orderNo->user_id);

        if($customerName == null){
            $error = [
                'error',
                'User Name Not found'
            ];
            return $error;
        }else{
            $dispatch = new Dispatch;

            $dispatch->dispatchno = Str::uuid()->toString();
            $dispatch->orderNo = $request->orderNo;
            $dispatch->driverNo = $request->driverNo;
            $dispatch->customerName = $customerName->username;
            $dispatch->DriverName = $driverNo->Name;
            $dispatch->DriverPhone = $request->DriverPhone;
            $dispatch->plateNumber = $driverNo->vehicle_platenumber;
            $dispatch->from = $request->from;
            $dispatch->to = $request->to;
            $dispatch->package = $request->package;
            $dispatch->amount = $request->price;
            $dispatch->status = 0;

            $dispatch->save() ;

            $orderNo->status = 2;
            $orderNo->save();

            if($driverNo->Name == 'N/A'){
                $name = $driverNo->email;
            }else{
                $name = $driverNo->Name;
            }

            $message = 'Hello!ðŸ˜Ž You are receiving this email because we Have dispatched your order and matched you with a suitable driver. The details are as follows:-';
            $time = date("Y-m-d h:i:s");

            Mail::to($customerName->email)->send(new DispatchMail($customerName->f_name, $orderNo->id, $message, $name, $time, $request->DriverPhone));

            $message = 'Hello! Volant DriverðŸ˜Ž You are receiving this email because we Have matched you with an Order. The details are as follows:-';
            $time = date("Y-m-d h:i:s");

            $driverNo->on_the_move = 1;
            $driverNo->save();

            Mail::to($driverNo->email)->send(new DispatchMail2($customerName->f_name, $orderNo->id, $message, $time, $customerName->phone));
            if($driverNo->api_token != null){
                $pickupTime = date('h:i a', strtotime($orderNo->pickup_datetime));
                $dropoffTime = date('h:i a', strtotime($orderNo->delivery_datetime));
                $device_token = $driverNo->api_token;
                $order_id = $orderNo->id;

                $this->sendNotification($request->from, $request->to, $orderNo->sender_name, $pickupTime, $dropoffTime, $orderNo->recipient_name, $device_token, $order_id);
            }

            return $dispatch;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Dispatch::find($id);
        return view("dashboard.dispatch.show")->withData($data);
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
        $dispatch = Dispatch::find($id);
        $dispatch->delete() ;
        return redirect('/dispatch/')->with('success', 'Dispatch successfully removed');
    }

    public function sendNotification($from, $to, $sender_name, $pickupTime, $dropoffTime, $recipient_name, $device_token, $order_id){
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        $token= $device_token;

       
        $extraNotificationData = [ 
            "pickupPoint"=> $from,
            "pickupTime"=> $pickupTime,
            "senderName"=> $sender_name,
            "destination"=> $to,
            "recipientName"=> $recipient_name,
            "deliveryTime"=> $dropoffTime,
            "order_id" => $order_id,
        ];

        $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
            'to'        => $token, //single token
            //'notification' => $notification,
            'data' => $extraNotificationData
        ];

        // $message = [
        //             "message"=>[
        //                 "token"=>"eci4fPtNSUqhspCeyffU32:APA91bE3acdhj9mysNaN3NhQ9K5wJNQcNiI5ToIv09cA-BU3Wcu-C6ZzGa8VBX5ui0bRd7Pycx0JHEkNF9kAu1lsy4EegCV9HeIEu8Apbcx5Fj6YXrPb0HVXGrx7tGc3AOVmOgtIhPbD",
        //                 "notification"=>[
        //                   "title"=>"Portugal vs. Denmark",
        //                   "body"=>"great match!"
        //                 ]
        //               ]
        //             ];

        $headers = [
            'Authorization: key=AAAAdmFNkeQ:APA91bEp8_mbdjq81WynmaHkJYU8i9Tp7Gr1exoURHItUA3t7cuH2LZZY22E_QMDR_haSvFWp7Fj6DCDl_r1yi1zmjdFYIpsNdP75Kb0F7SAojGnS86rVPEM_77WhBjQQOHzLIcY0LIY',
            'Content-Type: application/json'
        ];


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);

        if( $result === false){
            $error = [
                'error',
                'result' => $result,
            ];
            return $error;
        }else{
            $success = [
                'success',
                'result' => $result,
            ];
            return $success;
        }
        curl_close($ch);

        //return true;
    }
}
