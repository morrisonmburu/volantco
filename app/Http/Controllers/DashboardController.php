<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exporter;
use App\Http\Controllers\Controller;
use PDF;
use App\Couriers;
use App\Orders;
use App\Volantuser;
use App\Dispatch;
use App\User;
use DB;

class DashboardController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Orders::all();
        $drivers = Couriers::all();
        $customers = User::all();
        $stats = [
            'orders' => $orders,
            'drivers' => $drivers,
            'customers' => $customers
        ];
        $data = Dispatch::all();

        $getOrder = Orders::orderBy('created_at', 'asc')->get()->groupBy(function($val){
            return $val->created_at->format('M');
        });

        return view('dashboard.index')->withStats($stats)->withData($data)->withgetOrder($getOrder);
    }

    public function makeExcelCouriers(){
    	$data = DB::table('couriers')->select('firstName','lastName','city','county','paymentType','emergencyContactName','emergencyPhoneNo');
    	$excel = Exporter::make('Excel');
        $excel->loadQuery($data);
        $excel->stream('couriers.xlsx');
    }

    public function makeCsvCouriers(){
    	$data = DB::table('couriers')->select('firstName','lastName','city','county','paymentType','emergencyContactName','emergencyPhoneNo');
    	$excel = Exporter::make('Csv');
        $excel->loadQuery($data);
        $excel->stream('couriers.csv');
    }

    public function makePdfCouriers(){
    	$data = Couriers::all();
        
        $pdf = PDF::loadView('courierspdf', ['data' => $data]) ;

        return $pdf->download('couriers.pdf');
    }

    public function dispatchPanel(){
        $data = DB::table('orders')
                    ->join('locations', 'locations.order_id', '=', 'orders.id')
                    ->join('categories', 'categories.id', '=', 'orders.category_id')
                    ->join('truck_types', 'truck_types.id', '=', 'orders.truck_type_id')
                    ->join('order_payments', 'order_payments.id', '=', 'orders.payment_id')
                    ->join('payment_types', 'payment_types.id', '=', 'order_payments.payment_type_id')
                    ->select('orders.*','locations.*', 'categories.name as category', 'truck_types.*', 'order_payments.total', 'payment_types.name as payment_type', 'locations.name as address', 'orders.created_at as order_created_at')
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

        $drivers = Couriers::all();
        $unassigned = Orders::where('status', '=', 0)->get();
        $in_transit = Orders::where('status', '=', 2)->orWhere('status', '=', 3)->orWhere('status', '=', 1)->get();
        $complete = Orders::where('status', '=', 4)->get();

        $orderstats = [
          'unassigned' => count($unassigned),
          'in_transit' => count($in_transit),
          'complete' => count($complete),
        ];

        $online = Couriers::where('is_online', '=', 1)->get();
        $offline = Couriers::where('is_online', '=', 0)->get();
        $inactive = Couriers::where('status', '=', 0)->get();

        $riderstats = [
          'online' => count($online),
          'offline' => count($offline),
          'inactive' => count($inactive),
        ];

        $completeOrders = $this->get_complete_orders();

        // dd($completeOrders);

        return view("dispatch.index")->withData($data)->withDrivers($drivers)->withOrderstats($orderstats)->withRiderstats($riderstats)->withCompleteOrders($completeOrders);
    }

    public function get_complete_orders(){
      $data = DB::table('orders')
                    ->join('locations', 'locations.order_id', '=', 'orders.id')
                    ->join('categories', 'categories.id', '=', 'orders.category_id')
                    ->join('truck_types', 'truck_types.id', '=', 'orders.truck_type_id')
                    ->join('order_payments', 'order_payments.id', '=', 'orders.payment_id')
                    ->join('payment_types', 'payment_types.id', '=', 'order_payments.payment_type_id')
                    ->select('orders.*','locations.*', 'categories.name as category', 'truck_types.*', 'order_payments.total', 'payment_types.name as payment_type', 'locations.name as address', 'orders.created_at as order_created_at')
                    ->where('locations.is_stopover', '=', 0)
                    ->where('orders.created_at', '>=', \Carbon\Carbon::now()->subHour())
                    ->where('orders.status', '=', 4)
                    ->get();
                    // ->orderBy('order_id', 'desc')
                    // ->havingRaw('count("order_id") >= 1')
                    // ->get();

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

        return $data;
    }

    public function getOrder(Request $request){
        $id = $request->id;
        $data = DB::table('orders')
                    ->join('locations', 'locations.order_id', '=', 'orders.id')
                    ->join('categories', 'categories.id', '=', 'orders.category_id')
                    ->join('truck_types', 'truck_types.id', '=', 'orders.truck_type_id')
                    ->join('order_payments', 'order_payments.id', '=', 'orders.payment_id')
                    ->join('payment_types', 'payment_types.id', '=', 'order_payments.payment_type_id')
                    ->select('orders.*','locations.*', 'categories.name as category', 'truck_types.*', 'order_payments.total', 'payment_types.name as payment_type', 'locations.name as address', 'orders.created_at as order_created_at')
                    ->where('order_id', '=', $id)
                    ->where('is_stopover', '=', 0)
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

        $locations  = DB::table('locations')
            ->where('order_id', '=', $id)
            ->where('is_stopover', '=', 1)
            ->get();

        $array = [
            'orders' => $data,
            'locations' => $locations
        ];

        return $array;
    }

    public function trackerPanel(){
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

        $locations = DB::table('locations')
                    ->where('locations.is_stopover', '=', 1)
                    ->get();

        // $drivers = Couriers::where("status", "=", 1)->get();
        return view("tracker.index")->withData($data)->withLocations($locations);
    }

    public function activateCustomer(Request $request){
      $id = $request->id;
      $user = User::find($id);
      $user->status = 1;
      $user->save();
      return $user->id;
    }

    public function deleteCustomer(Request $request){
      $id = $request->id;
      $user = User::find($id);
      $user->delete();
      return $id;
    }

    public function getRider(Request $request){
      $id = $request->id;
      $data = Couriers::find($id);
      return $data;
    }

    public function InTransit(Request $request){
      $id = $request->order_id;
      $data = Orders::find($id);
      $data->status = 3;
      $data->save();
      return $data;
    }

    public function getRiderAccount(Request $request){
      $package = $request->package;

      $data = Couriers::where('associate_type', '=', $package)->where('is_online', '=', 1)->where('on_the_move', '=', 0)->get();

      return $data;
    }

    public function getOrderStatus(Request $request){
      $unassigned = Orders::where('status', '=', 0)->get();
      $picked_up = Orders::where('status', '=', 2)->get();
      $in_transit = Orders::where('status', '=', 3)->get();

      $orderstats = [
        'unassigned' => count($unassigned),
        'picked_up' => count($picked_up),
        'in_transit' => count($in_transit),
      ];

      return $orderstats;
    }
}
