<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\completeMail;
use App\Mail\ridersForgetPassword;
use Illuminate\Support\Facades\Mail;
use App\Account_types;
use App\Couriers;
use App\Dispatch;
use App\Orders;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Locations;
use Illuminate\Support\Facades\Storage;
use App\deliveryDocuments;

class RidersController extends Controller
{
  public function login(Request $request){
      $status = 401;
      $response = ['error' => 'Unauthorized'];

      if (Auth::guard('rider')->attempt($request->only(['email', 'password']))) {
        $status = 200;

        $rider = Couriers::where('email', '=', $request->email)->get();

        $token = Auth::guard('rider')->user()->createToken('usertoken')->accessToken;

        $rider[0]->bearer_token = $token;

        $rider[0]->save();

        $response = [
          'rider' => Auth::guard('rider')->user(),
          'token' => $token,
        ];
      }

      return response()->json($response);
  }

  public function change_password(Request $request){
    $id = $request->id;
    $password = $request->password;

    $data = Couriers::find($id);
    
    $data->password = Hash::make($password);
    
    $data->save();

    $status = 200;
    $response = [
      'success' => 'password Changed Successfully',
      'rider_associate' => $data,
    ];
    
    return response()->json($response);
  }

  public function get_dispatched_orders(){
    $data = DB::table('dispatches')
        ->join('orders', 'orders.id', '=', 'dispatches.orderNo')
        ->join('locations', 'locations.order_id', '=', 'dispatches.orderNo')
        ->join('categories', 'categories.id', '=', 'orders.category_id')
        ->join('truck_types', 'truck_types.id', '=', 'orders.truck_type_id')
                ->join('order_payments', 'order_payments.id', '=', 'orders.payment_id')
                ->join('payment_types', 'payment_types.id', '=', 'order_payments.payment_type_id')
                ->select('orders.category_id', 'orders.user_id', 'orders.sender_name', 'orders.sender_phone', 'orders.recipient_name', 'orders.recipient_phone', 'orders.package_price', 'orders.distance', 'orders.stops_count', 'orders.description', 'orders.pickup_datetime', 'orders.delivery_datetime', 'orders.instructions', 'orders.device' ,'locations.*', 'categories.name as category', 'truck_types.*', 'order_payments.total', 'payment_types.name as payment_type', 'locations.name as address', 'dispatches.dispatchno', 'dispatches.driverNo', 'dispatches.customerName', 'dispatches.DriverName', 'dispatches.DriverPhone', 'dispatches.plateNumber', 'dispatches.status as dispatch.status', 'orders.status as order_status',  'dispatches.id')
                ->where('locations.is_stopover', '=', 0)
                // ->where('locations.name', '=', 'dispatches.from')
                ->get();

        $previous_id = 0;
        foreach($data as $key => $order){
           $order->origin = [];
           $order->origin_longitude = [];
           $order->origin_latitude = [];
           $order->destination = $order->address;
           $order->destination_longitude = $order->longitude;
           $order->destination_latitude = $order->latitude;
               if ($previous_id == $order->order_id) {
                 $minKey = $key-1;
                 if (!empty($data[$minKey]->origin)) {
                    $order->origin = array_merge($order->origin, $data[$minKey]->origin);
                    $order->origin_longitude = array_merge($order->origin_longitude, $data[$minKey]->origin_longitude);
                    $order->origin_latitude = array_merge($order->origin_latitude, $data[$minKey]->origin_latitude);
                    }else {
                      array_push($order->origin, $order->destination, $data[$minKey]->address);
                  }
                  unset($data[$minKey]);
              }else {
                array_push($order->origin,$order->destination);
                array_push($order->origin_longitude, $order->destination_longitude);
                array_push($order->origin_latitude, $order->destination_latitude);
            }
            $previous_id = $order->order_id;
        }

        $data = $data->sortBy('order_id');
        return response()->json($data ,200);
  }

  public function get_dispatched_order($driver_id){
    $data = DB::table('dispatches')
        ->join('orders', 'orders.id', '=', 'dispatches.orderNo')
        ->join('locations', 'locations.order_id', '=', 'dispatches.orderNo')
        ->join('categories', 'categories.id', '=', 'orders.category_id')
        ->join('truck_types', 'truck_types.id', '=', 'orders.truck_type_id')
                ->join('order_payments', 'order_payments.id', '=', 'orders.payment_id')
                ->join('payment_types', 'payment_types.id', '=', 'order_payments.payment_type_id')
                ->select('orders.category_id', 'orders.user_id', 'orders.sender_name', 'orders.sender_phone', 'orders.recipient_name', 'orders.recipient_phone', 'orders.package_price', 'orders.distance', 'orders.stops_count', 'orders.description', 'orders.pickup_datetime', 'orders.delivery_datetime', 'orders.instructions', 'orders.device','locations.*', 'categories.name as category', 'truck_types.*', 'order_payments.total', 'payment_types.name as payment_type', 'locations.name as address', 'dispatches.dispatchno', 'dispatches.driverNo', 'dispatches.customerName', 'dispatches.DriverName', 'dispatches.DriverPhone', 'dispatches.plateNumber', 'dispatches.status as dispatch.status', 'orders.status as order_status', 'dispatches.id')
                ->where('locations.is_stopover', '=', 0)
                ->where('dispatches.driverNo', '=', $driver_id)
                // ->where('locations.name', '=', 'dispatches.from')
                ->get();

        $previous_id = 0;
        foreach($data as $key => $order){
           $order->origin = [];
           $order->origin_longitude = [];
           $order->origin_latitude = [];
           $order->destination = $order->address;
           $order->destination_longitude = $order->longitude;
           $order->destination_latitude = $order->latitude;
               if ($previous_id == $order->order_id) {
                 $minKey = $key-1;
                 if (!empty($data[$minKey]->origin)) {
                    $order->origin = array_merge($order->origin, $data[$minKey]->origin);
                    $order->origin_longitude = array_merge($order->origin_longitude, $data[$minKey]->origin_longitude);
                    $order->origin_latitude = array_merge($order->origin_latitude, $data[$minKey]->origin_latitude);
                    }else {
                      array_push($order->origin, $order->destination, $data[$minKey]->address);
                  }
                  unset($data[$minKey]);
              }else {
                array_push($order->origin,$order->destination);
                array_push($order->origin_longitude, $order->destination_longitude);
                array_push($order->origin_latitude, $order->destination_latitude);
            }
            $previous_id = $order->order_id;
        }

        $data = $data->sortBy('order_id');
        return response()->json($data ,200);
  }

  public function get_waiting_dispatch_order($driver_id){
    $data = DB::table('dispatches')
        ->join('orders', 'orders.id', '=', 'dispatches.orderNo')
        ->join('locations', 'locations.order_id', '=', 'dispatches.orderNo')
        ->join('categories', 'categories.id', '=', 'orders.category_id')
        ->join('truck_types', 'truck_types.id', '=', 'orders.truck_type_id')
                ->join('order_payments', 'order_payments.id', '=', 'orders.payment_id')
                ->join('payment_types', 'payment_types.id', '=', 'order_payments.payment_type_id')
                ->select('orders.category_id', 'orders.user_id', 'orders.sender_name', 'orders.sender_phone', 'orders.recipient_name', 'orders.recipient_phone', 'orders.package_price', 'orders.distance', 'orders.stops_count', 'orders.description', 'orders.pickup_datetime', 'orders.delivery_datetime', 'orders.instructions', 'orders.device','locations.*', 'categories.name as category', 'truck_types.*', 'order_payments.total', 'payment_types.name as payment_type', 'locations.name as address', 'dispatches.dispatchno', 'dispatches.driverNo', 'dispatches.customerName', 'dispatches.DriverName', 'dispatches.DriverPhone', 'dispatches.plateNumber', 'dispatches.status as dispatch.status', 'orders.status as order_status', 'dispatches.id')
                ->where('locations.is_stopover', '=', 0)
                ->where('dispatches.driverNo', '=', $driver_id)
                ->where('dispatches.status', '=', 0)
                // ->where('locations.name', '=', 'dispatches.from')
                ->get();

        $previous_id = 0;
        foreach($data as $key => $order){
           $order->origin = [];
           $order->origin_longitude = [];
           $order->origin_latitude = [];
           $order->destination = $order->address;
           $order->destination_longitude = $order->longitude;
           $order->destination_latitude = $order->latitude;
               if ($previous_id == $order->order_id) {
                 $minKey = $key-1;
                 if (!empty($data[$minKey]->origin)) {
                    $order->origin = array_merge($order->origin, $data[$minKey]->origin);
                    $order->origin_longitude = array_merge($order->origin_longitude, $data[$minKey]->origin_longitude);
                    $order->origin_latitude = array_merge($order->origin_latitude, $data[$minKey]->origin_latitude);
                    }else {
                      array_push($order->origin, $order->destination, $data[$minKey]->address);
                  }
                  unset($data[$minKey]);
              }else {
                array_push($order->origin,$order->destination);
                array_push($order->origin_longitude, $order->destination_longitude);
                array_push($order->origin_latitude, $order->destination_latitude);
            }
            $previous_id = $order->order_id;
        }

        $data = $data->sortBy('order_id');
        return response()->json($data ,200);
  }

  public function get_accepted_dispatch_order($driver_id){
    $data = DB::table('dispatches')
        ->join('orders', 'orders.id', '=', 'dispatches.orderNo')
        ->join('locations', 'locations.order_id', '=', 'dispatches.orderNo')
        ->join('categories', 'categories.id', '=', 'orders.category_id')
        ->join('truck_types', 'truck_types.id', '=', 'orders.truck_type_id')
                ->join('order_payments', 'order_payments.id', '=', 'orders.payment_id')
                ->join('payment_types', 'payment_types.id', '=', 'order_payments.payment_type_id')
                ->select('orders.category_id', 'orders.user_id', 'orders.sender_name', 'orders.sender_phone', 'orders.recipient_name', 'orders.recipient_phone', 'orders.package_price', 'orders.distance', 'orders.stops_count', 'orders.description', 'orders.pickup_datetime', 'orders.delivery_datetime', 'orders.instructions', 'orders.device','locations.*', 'categories.name as category', 'truck_types.*', 'order_payments.total', 'payment_types.name as payment_type', 'locations.name as address', 'dispatches.dispatchno', 'dispatches.driverNo', 'dispatches.customerName', 'dispatches.DriverName', 'dispatches.DriverPhone', 'dispatches.plateNumber', 'dispatches.status as dispatch.status', 'orders.status as order_status', 'dispatches.id',  'dispatches.proof_of_delivery_attached')
                ->where('locations.is_stopover', '=', 0)
                ->where('dispatches.driverNo', '=', $driver_id)
                ->where('dispatches.status', '=', 1)
                ->orWhere('dispatches.status', '=', 2)
                ->orWhere('dispatches.status', '=', 3)
                // ->where('locations.name', '=', 'dispatches.from')
                ->get();

        $previous_id = 0;
        foreach($data as $key => $order){
           $order->origin = [];
           $order->origin_longitude = [];
           $order->origin_latitude = [];
           $order->destination = $order->address;
           $order->destination_longitude = $order->longitude;
           $order->destination_latitude = $order->latitude;
               if ($previous_id == $order->order_id) {
                 $minKey = $key-1;
                 if (!empty($data[$minKey]->origin)) {
                    $order->origin = array_merge($order->origin, $data[$minKey]->origin);
                    $order->origin_longitude = array_merge($order->origin_longitude, $data[$minKey]->origin_longitude);
                    $order->origin_latitude = array_merge($order->origin_latitude, $data[$minKey]->origin_latitude);
                    }else {
                      array_push($order->origin, $order->destination, $data[$minKey]->address);
                  }
                  unset($data[$minKey]);
              }else {
                array_push($order->origin,$order->destination);
                array_push($order->origin_longitude, $order->destination_longitude);
                array_push($order->origin_latitude, $order->destination_latitude);
            }
            $previous_id = $order->order_id;
        }

        $data = $data->sortBy('order_id');
        return response()->json($data ,200);
  }

  public function get_complete_dispatched_order($driver_id){
    $data = DB::table('dispatches')
        ->join('orders', 'orders.id', '=', 'dispatches.orderNo')
        ->join('locations', 'locations.order_id', '=', 'dispatches.orderNo')
        ->join('categories', 'categories.id', '=', 'orders.category_id')
        ->join('truck_types', 'truck_types.id', '=', 'orders.truck_type_id')
                ->join('order_payments', 'order_payments.id', '=', 'orders.payment_id')
                ->join('payment_types', 'payment_types.id', '=', 'order_payments.payment_type_id')
                ->select('orders.category_id', 'orders.user_id', 'orders.sender_name', 'orders.sender_phone', 'orders.recipient_name', 'orders.recipient_phone', 'orders.package_price', 'orders.distance', 'orders.stops_count', 'orders.description', 'orders.pickup_datetime', 'orders.delivery_datetime', 'orders.instructions', 'orders.device','locations.*', 'categories.name as category', 'truck_types.*', 'order_payments.total', 'payment_types.name as payment_type', 'locations.name as address', 'dispatches.dispatchno', 'dispatches.driverNo', 'dispatches.customerName', 'dispatches.DriverName', 'dispatches.DriverPhone', 'dispatches.plateNumber', 'dispatches.status as dispatch.status', 'orders.status as order_status', 'dispatches.id')
                ->where('locations.is_stopover', '=', 0)
                ->where('dispatches.driverNo', '=', $driver_id)
                ->where('dispatches.status', '=', 4)
                // ->where('locations.name', '=', 'dispatches.from')
                ->get();

        $previous_id = 0;
        foreach($data as $key => $order){
           $order->origin = [];
           $order->origin_longitude = [];
           $order->origin_latitude = [];
           $order->destination = $order->address;
           $order->destination_longitude = $order->longitude;
           $order->destination_latitude = $order->latitude;
               if ($previous_id == $order->order_id) {
                 $minKey = $key-1;
                 if (!empty($data[$minKey]->origin)) {
                    $order->origin = array_merge($order->origin, $data[$minKey]->origin);
                    $order->origin_longitude = array_merge($order->origin_longitude, $data[$minKey]->origin_longitude);
                    $order->origin_latitude = array_merge($order->origin_latitude, $data[$minKey]->origin_latitude);
                    }else {
                      array_push($order->origin, $order->destination, $data[$minKey]->address);
                  }
                  unset($data[$minKey]);
              }else {
                array_push($order->origin,$order->destination);
                array_push($order->origin_longitude, $order->destination_longitude);
                array_push($order->origin_latitude, $order->destination_latitude);
            }
            $previous_id = $order->order_id;
        }

        $data = $data->sortBy('order_id');
        return response()->json($data ,200);
  }

  public function get_rejected_dispatched_order($driver_id){
    $data = DB::table('dispatches')
        ->join('orders', 'orders.id', '=', 'dispatches.orderNo')
        ->join('locations', 'locations.order_id', '=', 'dispatches.orderNo')
        ->join('categories', 'categories.id', '=', 'orders.category_id')
        ->join('truck_types', 'truck_types.id', '=', 'orders.truck_type_id')
                ->join('order_payments', 'order_payments.id', '=', 'orders.payment_id')
                ->join('payment_types', 'payment_types.id', '=', 'order_payments.payment_type_id')
                ->select('orders.category_id', 'orders.user_id', 'orders.sender_name', 'orders.sender_phone', 'orders.recipient_name', 'orders.recipient_phone', 'orders.package_price', 'orders.distance', 'orders.stops_count', 'orders.description', 'orders.pickup_datetime', 'orders.delivery_datetime', 'orders.instructions', 'orders.device','locations.*', 'categories.name as category', 'truck_types.*', 'order_payments.total', 'payment_types.name as payment_type', 'locations.name as address', 'dispatches.dispatchno', 'dispatches.driverNo', 'dispatches.customerName', 'dispatches.DriverName', 'dispatches.DriverPhone', 'dispatches.plateNumber', 'dispatches.status as dispatch.status', 'orders.status as order_status', 'dispatches.id')
                ->where('locations.is_stopover', '=', 0)
                ->where('dispatches.driverNo', '=', $driver_id)
                ->where('dispatches.status', '=', 5)
                // ->where('locations.name', '=', 'dispatches.from')
                ->get();

        $previous_id = 0;
        foreach($data as $key => $order){
           $order->origin = [];
           $order->origin_longitude = [];
           $order->origin_latitude = [];
           $order->destination = $order->address;
           $order->destination_longitude = $order->longitude;
           $order->destination_latitude = $order->latitude;
               if ($previous_id == $order->order_id) {
                 $minKey = $key-1;
                 if (!empty($data[$minKey]->origin)) {
                    $order->origin = array_merge($order->origin, $data[$minKey]->origin);
                    $order->origin_longitude = array_merge($order->origin_longitude, $data[$minKey]->origin_longitude);
                    $order->origin_latitude = array_merge($order->origin_latitude, $data[$minKey]->origin_latitude);
                    }else {
                      array_push($order->origin, $order->destination, $data[$minKey]->address);
                  }
                  unset($data[$minKey]);
              }else {
                array_push($order->origin,$order->destination);
                array_push($order->origin_longitude, $order->destination_longitude);
                array_push($order->origin_latitude, $order->destination_latitude);
            }
            $previous_id = $order->order_id;
        }

        $data = $data->sortBy('order_id');
        return response()->json($data ,200);
  }

  public function complete_dispatch_order(Request $request, $id)
    {
        $dispatch = Dispatch::find($id);
        $order = Orders::find($dispatch->orderNo);
        $user = User::find($order->user_id);
        $dispatch->status = 3;
        $order->status = 4;
        $order->save();

        $volant_pricing = DB::table('volant_pricings')
                          ->join('truck_types', 'truck_types.id', '=', 'volant_pricings.truck_type_id')
                          ->where('volant_pricings.truck_type_id', '=', $order->truck_type_id)
                          ->select('volant_pricings.*', 'truck_types.name as truck_type')
                          ->get();

        $id = $volant_pricing[0]->id;

        if($id == 1 || $id == 2){
            $base_price = $volant_pricing[0]->light_price;
            $unit_distance = $volant_pricing[0]->light_unit_distance;
            $unit_additional_price = $volant_pricing[0]->light_unit_additional_price; 
        }elseif($id == 4 || $id == 5){
            $base_price = $volant_pricing[0]->medium_price;
            $unit_distance = $volant_pricing[0]->medium_unit_distance;
            $unit_additional_price = $volant_pricing[0]->medium_unit_additional_price; 
        }elseif($id == 6 || $id == 7 || $id == 8 || $id == 15){
            $base_price = $volant_pricing[0]->heavy_price;
            $unit_distance = $volant_pricing[0]->heavy_unit_distance;
            $unit_additional_price = $volant_pricing[0]->heavy_unit_additional_price;
        }elseif($id == 9 || $id == 10 || $id == 11 || $id == 12 || $id == 13 || $id == 16){
            $base_price = $volant_pricing[0]->cargo_price;
            $unit_distance = $volant_pricing[0]->cargo_unit_distance;
            $unit_additional_price = $volant_pricing[0]->cargo_unit_additional_price;
        }

        $additional_location = $volant_pricing[0]->additional_location;
        $insurance = $volant_pricing[0]->insurance;
        $waiting_time = $volant_pricing[0]->waiting_time;
        $loading = $volant_pricing[0]->loading;

        Mail::to($user->email)->send(new completeMail($dispatch->customerName, $dispatch->DriverName, $dispatch->from, $dispatch->to, $order->created_at, $order->pickup_datetime, $order->package_price, $order->truck_type_id, $base_price, $unit_distance, $unit_additional_price, $additional_location, $insurance, $waiting_time, $loading, $order->distance, $order->device, $order->stops_count));
        $dispatch->save();
        $status = 200;
        $response = [
            'success' => 'Dispatch Order Complete',
        ];
        return response()->json($response);
    }

    public function accept(Request $request, $id){
        $dispatch = Dispatch::find($id);
        $dispatch->status = 1;
        $dispatch->save();
        $status = 200;
        $response = [
            'success' => 'Dispatch Order accepted Successfully',
        ];
        return response()->json($response);
    }

    public function reject(Request $request, $id){
        $dispatch = Dispatch::find($id);
        $dispatch->status = 2;
        $dispatch->save();
        $status = 200;
        $response = [
            'success' => 'Dispatch Order rejected',
        ];
        return response()->json($response);
    }


    public function updateOrderStatus(Request $request){
      $orderId = $request->orderId;
      $status = $request->statusId;
      $dispatch= Dispatch::findOrFail($orderId);

      if( $dispatch != null){
        if( $status !=null){
          $dispatch->status = $status; 
          $dispatch->updated_at = Carbon::now()->setTimezone('GMT+3');

          if( $dispatch ->save()){
            $order = Orders::findOrFail($dispatch->orderNo);
            $order->status = $status;

            if( $order->save() ){
              $user = User::find($order->user_id);
              if($request->statusId == 4){
                //$delivery_time = date('Y-m-d h:i:s');
                $order_time = Carbon::parse($order->created_at, 'GMT+3');
                $pickup_time = Carbon::parse($order->pickup_datetime, 'GMT+3');
                $delivery_time = Carbon::now()->setTimezone('GMT+3');
                $get_rider = Couriers::where('Name', '=', $dispatch->DriverName)->get();
                $get_rider[0]->on_the_move = 0;
                $get_rider[0]->save();
                
                $volant_pricing = DB::table('volant_pricings')
                          ->join('truck_types', 'truck_types.id', '=', 'volant_pricings.truck_type_id')
                          ->where('volant_pricings.truck_type_id', '=', $order->truck_type_id)
                          ->select('volant_pricings.*', 'truck_types.name as truck_type')
                          ->get();

              $id = $volant_pricing[0]->id;

              if($id == 1 || $id == 2){
                  $base_price = $volant_pricing[0]->light_price;
                  $unit_distance = $volant_pricing[0]->light_unit_distance;
                  $unit_additional_price = $volant_pricing[0]->light_unit_additional_price; 
              }elseif($id == 4 || $id == 5){
                  $base_price = $volant_pricing[0]->medium_price;
                  $unit_distance = $volant_pricing[0]->medium_unit_distance;
                  $unit_additional_price = $volant_pricing[0]->medium_unit_additional_price; 
              }elseif($id == 6 || $id == 7 || $id == 8 || $id == 15){
                  $base_price = $volant_pricing[0]->heavy_price;
                  $unit_distance = $volant_pricing[0]->heavy_unit_distance;
                  $unit_additional_price = $volant_pricing[0]->heavy_unit_additional_price;
              }elseif($id == 9 || $id == 10 || $id == 11 || $id == 12 || $id == 13 || $id == 16){
                  $base_price = $volant_pricing[0]->cargo_price;
                  $unit_distance = $volant_pricing[0]->cargo_unit_distance;
                  $unit_additional_price = $volant_pricing[0]->cargo_unit_additional_price;
              }

              $additional_location = $volant_pricing[0]->additional_location;
              $insurance = $volant_pricing[0]->insurance;
              $waiting_time = $volant_pricing[0]->waiting_time;
              $loading = $volant_pricing[0]->loading;

              Mail::to($user->email)->send(new completeMail($dispatch->customerName, $dispatch->DriverName, $dispatch->from, $dispatch->to, $order_time, $pickup_time, $delivery_time, $order->package_price, $order->truck_type_id, $base_price, $unit_distance, $unit_additional_price, $additional_location, $insurance, $waiting_time, $loading, $order->distance, $order->device, $order->stops_count));
              }

              $locations = Locations::where("order_id", $dispatch->orderNo)->get();
              $userFCMToken = User::where("id", $order->user_id)->value("fcm_token");

              $this->sendNotificationToCustomer($locations, $dispatch->status,$dispatch->orderNo,$userFCMToken);

              return response()->json(["message"=>"updated", "status"=>$dispatch->status]);
            }else{
              return response()->json(["message"=>"error"]);
            }
            
          }
          else{
            return response()->json(["message"=>"error"]);
          }
        }
        else{
          return response()->json(["message"=>"error"]);
        }
        

      }else{
        return response()->json(["message"=>"order not found"]);
      }
    }
    
    public function update_rider_api(Request $request){
        $id = $request->id;
        $validator = Validator::make($request->all(), [
            'email_address' => 'required|email',
            'phoneNumber' => 'required|min:3|max:25',
        ]);

        if ($validator->fails()) {
          return response()->json(['error' => $validator->errors()], 200);
        }

        $driver1 = Couriers::findOrFail($id) ;
        $driver1->email = $request->input('email_address');
        $driver1->phoneNo = $request->input('phoneNumber');

        $driver1->Name = $request->input('Name') ;
            if ($request->Name == null) {
            $driver1->Name = 'N/A' ;
        }

        $driver1->licenseNo = $request->input('license_number') ;
            if ($request->license_number == null) {
            $driver1->licenseNo = 'N/A' ;
        }

        $driver1->vehicle_type = $request->input('vehicle_type') ;
            if ($request->vehicle_type == null) {
            $driver1->vehicle_type = 'N/A' ;
        }

        $driver1->vehicle_model = $request->input('vehicle_model') ;
            if ($request->vehicle_model == null) {
            $driver1->vehicle_model = 'N/A' ;
        }

        $driver1->vehicle_color = $request->input('vehicle_color') ;
            if ($request->vehicle_color == null) {
            $driver1->vehicle_color = 'N/A' ;
        }

        $driver1->vehicle_platenumber = $request->input('vehicle_platenumber') ;
            if ($request->vehicle_platenumber == null) {
            $driver1->vehicle_platenumber = 'N/A' ;
        }

        $driver1->production_year = $request->input('production_year') ;
            if ($request->production_year == null) {
            $driver1->production_year = 'N/A' ;
        }

        $driver1->boardNo = $request->input('boardNo') ;
            if ($request->boardNo == null) {
            $driver1->boardNo = 'N/A' ;
        }

        $driver1->number_of_passangers = $request->input('number_of_passangers') ;
            if ($request->number_of_passangers == null) {
            $driver1->number_of_passangers = 'N/A' ;
        }

         $driver1->category = $request->input('category_id') ;
            if ($request->category_id == null) {
            $driver1->category = 0;
        }

        $driver1->is_online = $request->input('is_online') ;
            if ($request->is_online == null) {
            $driver1->is_online = 0;
        }

        $driver1->api_token = $request->input('api_token') ;
            if ($request->api_token == null) {
            $driver1->api_token = '';
        }

        $driver1->save();

        $response = [
            'success' => 'Rider details updated Successfully',
            'rider' => $driver1,
        ];
        return response()->json($response);
    }

    public function change_rider_online_status(Request $request){
      $id = $request->id;
      $rider = Couriers::findOrFail($id);
      $rider->is_online = $request->is_online;
      $rider->save();

      $response = [
            'success' => 'rider status updated Successfully',
            'rider' => $rider,
        ];

        return response()->json($response);
    }

    public function rider_device_token(Request $request){
      $id = $request->id;
      $rider = Couriers::findOrFail($id);
      $rider->api_token = $request->api_token;
      $rider->save();

      $response = [
          'success' => 'rider device token updated Successfully',
          'rider' => $rider,
      ];

        return response()->json($response);      
    }

    public function updateDriverLocation(Request $request){
      $id = $request->id;
      $longitude = $request->longitude;
      $latitude = $request->latitude;
      $on_the_move = $request->on_the_move;

      $rider = Couriers::findOrFail($id);
      $rider->longitude = $longitude;
      $rider->latitude = $latitude;
      $rider->on_the_move = $on_the_move;
      $rider->save();

      $response = [
        'success' => 'Rider Location Successfully updated',
        'rider' => $rider,
      ];

      return response()->json($response);
    }


     public function sendNotificationToCustomer($locations, $dispatchStatus, $orderNo, $userFCMToken){
      $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
      $token= $userFCMToken;

      $data = [
          "dispatchStatus" => $dispatchStatus,
          "locations" => $locations,
          "orderNumber" => $orderNo,
        ];


        $fcmMessage = [
            'to' => $token, 
            'data' => $data
        ];

        $headers = [
            'Authorization: key=AAAAGOO35Z0:APA91bFnn9i8VdBuXa_cTwYi0txBnyRr7F6DrghSN9_Beej9foGSVHMy0UXavZnVpzrfIP0q6dKio4K2xI-9X6tRko-Dd28t90u6EccT0oDddJ2UwQyy3w-ylJ41tYFqGOdg4O8-H0jw',
            'Content-Type: application/json'
        ];


        $request = curl_init();
        curl_setopt($request, CURLOPT_URL,$fcmUrl);
        curl_setopt($request, CURLOPT_POST, true);
        curl_setopt($request, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($request, CURLOPT_POSTFIELDS, json_encode($fcmMessage));
        $result = curl_exec($request);

        // if( $result === false){
        //    return "error";
        // }else{
           
        //     return "success";
        // }
        curl_close($request);
    }

    public function sendPasswordResetLink(Request $request){
        $email = $request->email;
        if(Couriers::where('email', '=', $email)->count() == 0){
          $error = [
            'error' => 'Error, Rider doesnt exist',
          ];
          return response()->json($error);
        }else{
          $rider = Couriers::where("email", "=", $email)->get();
          $message = "Hello!😎 You are receiving this email because we received a password reset request for your account. Click the link below to reset Your Password";
          Mail::to($request->email)->send(new ridersForgetPassword($rider[0]->username, $message, $rider[0]->token));
          $success = [
            'success' => 'Successfully Sent a resent link to your email',
          ];
          return response()->json($success);
        }
    }

    public function resetLink($token){
      $data = Couriers::where('token', '=', $token)->get();
      return view('auth.resetLinkPassword')->withData($data);
    }

    public function postResetPassword(Request $request){
      $rider = Couriers::find($request->driver_id);
      $new_password = $request->new_password;
      $rider->password = bcrypt($new_password);
      $rider->save();
      return $rider->id;
    }

    public function become_available(Request $request){
     if(Couriers::where('id', '=', $request->driver_id)->count() == 0){
      $error = [
        'error' => 'Associate Not Found',
      ];
      return response()->json($error);
     }else{
      $rider = Couriers::find($request->driver_id);
      $rider->on_the_move = $request->become_available;
      $rider->save();
      $success = [
        'success' => 'Successfully',
      ];
      return response()->json($success);
     }
    }


    public function uploadProofOfDelivery(Request $request){
      $orderId = $request->orderId;
     
      $image = $request->file;  //base64 encoded image
      $image = str_replace('data:image/png;base64,', '', $image);
      $image = str_replace(' ', '+', $image);
      $imageName = str_random(10).'.'.'png';
      
      if ( Storage::put('/app/public/Proof_of_delivery/'.$imageName, base64_decode($image) ) ){
        $path = Storage::url('app/public/Proof_of_delivery/'.$imageName);

        $deliveryDocuments = new deliveryDocuments;
        $deliveryDocuments->order_id = $orderId;
        $deliveryDocuments->file_path = $path;
        $deliveryDocuments->save();
        //updating dispatch to show that proof of dispatch has been uploaded 
        $dispatch = Dispatch::findOrFail($orderId);
        $dispatch->proof_of_delivery_attached = 1;
        if( $dispatch->save() ){
          return response()->json(["message"=>"uploaded"]);
        }else{

        }

        
      }else{
         return response()->json(["message"=>"error"]);
      }
      
      
    }

    public function errorCallback(){
      return response()->json(['error' => 'Unauthenticated.'], 401);
    }
}