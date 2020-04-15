<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Locations;

class locationsController extends Controller
{

    public function getlocations(){
        $data = Locations::select('id','name')->get();
        // dd($data);
        return response()->json($data, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Locations::all();
        return view("dashboard.locations.index")->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.locations.create");
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
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'longitude' => 'required|max:255',
            'latitude' => 'required|max:255'
        ]);

        $location = new Locations();
        
        $location->name = $request->name;
        $location->address = $request->address;
        $location->longitude = $request->longitude;
        $location->latitude = $request->latitude;

        $location->save();
        return redirect('/locations/')->with('success', 'Locations successfully added to the list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Locations::find($id);
        return view("dashboard.locations.show")->withData($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Locations::find($id);
        return view("dashboard.locations.edit")->withData($data);
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
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'longitude' => 'required|max:255',
            'latitude' => 'required|max:255'
        ]);

        $location = Locations::find($id);
        
        $location->name = $request->name;
        $location->address = $request->address;
        $location->longitude = $request->longitude;
        $location->latitude = $request->latitude;

        $location->save();
        return redirect('/locations/')->with('success', 'Location successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Locations::find($id);
        $data->delete();
        return redirect('/locations/')->with('success', 'Location successfully removed');
    }
}
