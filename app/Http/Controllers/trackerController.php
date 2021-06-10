<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Orders;
use App\Payments;
use App\Volantuser;
use App\Locations;
use App\Category;
use Illuminate\Support\Facades\DB;

class trackerController extends Controller
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
	public function gettracking_order(Request $request){
		$user_id = $request->user_id;
		return response()->json(DB::table('locations')->groupBy('order_id')->join('orders', 'orders.id', '=', 'locations.order_id')->join('categories', 'categories.id', '=', 'orders.category')->select('orders.*','locations.*', 'categories.name as category')->where('user_id', '=', $user_id)->where('status', '=', 1)->get(),200);
	}

	public function trackerPanel(Request $request){
		return view('tracker.testTracker');
	}

	public function getTrackOrders(Request $request){
		$data = DB::table('orders')
                    ->join('locations', 'locations.order_id', '=', 'orders.id')
                    ->join('categories', 'categories.id', '=', 'orders.category_id')
                    ->join('truck_types', 'truck_types.id', '=', 'orders.truck_type_id')
                    ->join('order_payments', 'order_payments.id', '=', 'orders.payment_id')
                    ->join('payment_types', 'payment_types.id', '=', 'order_payments.payment_type_id')
                    ->join('dispatches', 'dispatches.orderNo', '=', 'orders.id')
                    ->select('dispatches.orderNo', 'dispatches.driverNo', 'dispatches.DriverName', 'dispatches.DriverPhone', 'orders.*','locations.*', 'categories.name as category', 'truck_types.*', 'order_payments.total', 'payment_types.name as payment_type', 'locations.name as address', 'orders.created_at as order_created_at', 'orders.status as order_status')
                    ->where('locations.is_stopover', '=', 0)
                    ->where('orders.status', '=', 1)
                    ->orWhere('orders.status', '=', 2)
                    ->orWhere('orders.status', '=', 3)
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

        return response()->json($data,200);
	}

	public function getStopoverLocations(Request $request){
		$id = $request->id;
		$data = DB::table('locations')
					->where('order_id', '=', $id)
					->where('is_stopover', '=', 1)
					->get();

		return response()->json($data,200);
	}
}
