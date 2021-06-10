<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\house_type;
use Illuminate\Support\Facades\DB;

class houseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('house_type')->orderBy('id', 'desc')->get();
        return view("dashboard.house_type.index")->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.house_type.create");
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
            'title' => 'required|max:255',
            'room_counts' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $house = new house_type();

        $house->title = $request->title;
        $house->least_room_counts = $request->room_counts;
        $house->price = $request->price;

        $house->save();
        return redirect('/house_type/')->with('success', 'House Type added successfully to the list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('house_type')->find($id);
        return view("dashboard.house_type.show")->withData($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('house_type')->find($id);
        return view("dashboard.house_type.edit")->withData($data);
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
        $house = DB::table('house_type')->find($id);
        $this->validate($request, [
            'title' => 'required|max:255',
            'room_counts' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $house->title = $request->title;
        $house->least_room_counts = $request->room_counts;
        $house->price = $request->price;

        $house->save();
        return redirect('/house_type/')->with('success', 'House Type updated successfully to the list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $house = DB::table('house_type')->find($id);
        $house->delete();
        return redirect('/house_type/')->with('success', 'House Type deleted successfully');
    }
}
