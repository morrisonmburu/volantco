<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Dispatch;
use App\Couriers;
use App\Trucks;

class dispatchController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
            'dispatchno' => 'required|max:25',
            'customerName' => 'required|max:50',
            'from' => 'required|max:100',
            'to' => 'required|max:100',
            'courierName' => 'required|max:100',
            'truckNo' => 'required|max:100',
            'pickup' => 'required|date|max:100',
            'amount' => 'required|max:100'
        ]);

        $courierName = Couriers::find($request->courierName);
        $truckNo = Trucks::find($request->truckNo);

        $dispatch = new Dispatch;
        $dispatch->dispatchno = $request->dispatchno;
        $dispatch->customerName = $request->customerName;
        $dispatch->courierName = $courierName->firstName.' '.$courierName->lastName;
        $dispatch->truckNo = $truckNo->ownerShipType;
        $dispatch->from = $request->from;
        $dispatch->to = $request->to;
        $dispatch->pickup = $request->pickup;
        $dispatch->amount = $request->amount;
        $dispatch->orderNo = $request->orderNo;

        $dispatch->save() ;

        return redirect('/dispatch/')->with('success', 'Dispatch successfully added to the list');
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
}
