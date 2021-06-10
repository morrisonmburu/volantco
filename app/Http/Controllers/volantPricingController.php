<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\volantPricings;

class volantPricingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('volant_pricings')->get();
        return view('dashboard.volant_pricings.index')->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('truck_types')->get();
        return view('dashboard.volant_pricing')->withData($data);
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
            'truck_type_id' => 'required|numeric',
        ]);

        $price = new volantPricings();
        $price->light_price = $request->light_price;
        $price->light_unit_distance = $request->light_unit_distance;
        $price->light_unit_additional_price = $request->light_unit_additional_price;
        $price->medium_price = $request->medium_price;
        $price->medium_unit_distance = $request->medium_unit_distance;
        $price->medium_unit_additional_price = $request->medium_unit_additional_price;
        $price->heavy_price = $request->heavy_price;
        $price->heavy_unit_distance = $request->heavy_unit_distance;
        $price->heavy_unit_additional_price = $request->heavy_unit_additional_price;
        $price->cargo_price = $request->cargo_price;
        $price->cargo_unit_distance = $request->cargo_unit_distance;
        $price->cargo_unit_additional_price = $request->cargo_unit_additional_price;
        $price->truck_type_id = $request->truck_type_id;
        $price->save();

        $data = DB::table('truck_types')->get();

        return view('dashboard.volant_pricing')->with('success', 'Truck successfully added to the list')->withData($data);
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
    public function update(Request $request)
    {
        $id = $request->id;
        $data = volantPricings::find($id);
        if($id == 1 || $id == 2){
            $data->light_price = $request->base_price;
            $data->light_unit_distance = $request->unit_distance;
            $data->light_unit_additional_price = $request->unit_additional_price; 
        }elseif($id == 4 || $id == 5){
            $data->medium_price = $request->base_price;
            $data->medium_unit_distance = $request->unit_distance;
            $data->medium_unit_additional_price = $request->unit_additional_price; 
        }elseif($id == 6 || $id == 7 || $id == 8 || $id == 15){
            $data->heavy_price = $request->base_price;
            $data->heavy_unit_distance = $request->unit_distance;
            $data->heavy_unit_additional_price = $request->unit_additional_price;
        }elseif($id == 9 || $id == 10 || $id == 11 || $id == 12 || $id == 13 || $id == 16){
            $data->cargo_price = $request->base_price;
            $data->cargo_unit_distance = $request->unit_distance;
            $data->cargo_unit_additional_price = $request->unit_additional_price;
        }else{
            $message = 'Volant Pricing Selected Does Not Exist';
            return $message;
        }
        $data->additional_location = $request->additional_location_price;
        $data->insurance = $request->insurance;
        $data->waiting_time = $request->waiting_time;
        $data->loading = $request->loading_price;

        $data->save();

        $truck_type = DB::table('truck_types')->where('id', '=', $data->truck_type_id)->get();

        $message = $truck_type[0]->name;
        return $message;
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

    public function getPricing(Request $request){
        $data = DB::table('volant_pricings')
                ->join('truck_types', 'truck_types.id', '=', 'volant_pricings.truck_type_id')
                ->select('volant_pricings.*', 'truck_types.name', 'truck_types.id as truck_id')
                ->get();
        return response()->json($data,200);
    }

    public function getPricing2(){
        $data = DB::table('volant_pricings')
                ->join('truck_types', 'truck_types.id', '=', 'volant_pricings.truck_type_id')
                ->select('volant_pricings.*', 'truck_types.name as truck_type', 'truck_types.id as truck_id')
                ->get();
        return response()->json($data,200);
    }
}
