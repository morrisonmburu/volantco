<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Orders;

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

    public function allOrders(){
        return response()->json(Orders::all(),200);
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
                'info' => 'required|max:255',
                'datetime' => 'required',
                'email' => 'required',
                'phone' => 'required|max:12'
            ]);

        if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }

        $order = new Orders;

        $order->to = $request->to;
        $order->from = $request->from;
        $order->package = $request->packages;
        $order->info = $request->info;
        $order->time = $request->datetime;
        $order->mark = 0;
        $order->cancel = 0;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->instructions = $request->info;

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
}
