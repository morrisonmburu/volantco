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
        $this->middleware('auth');
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
