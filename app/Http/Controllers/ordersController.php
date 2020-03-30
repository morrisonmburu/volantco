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
        //
    }

    public function allOrders(){
        return response()->json(Orders::paginate(10),200);
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
        $data = $request->json()->all();

        dd($data);

        $validator = Validator::make($request->json()->all(), [
                'to' => 'required|max:255',
                'from' => 'required|max:255',
                'package' => 'required|max:255',
                'info' => 'required|max:255',
                'time' => 'required',
                'email' => 'required',
                'phone' => 'required|max:12',
                'instructions' => 'required|max:255'
            ]);

        if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }

        $order = new Orders;

        $order->to = $request->to;
        $order->from = $request->from;
        $order->package = $request->package;
        $order->info = $request->info;
        $order->time = $request->time;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->instructions = $request->instructions;

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
