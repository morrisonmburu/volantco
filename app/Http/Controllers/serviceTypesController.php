<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\service_types;
use Session;

class serviceTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = service_types::OrderBy("id", "desc")->get();
        return view("dashboard.serviceType.index")->withData($data);
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
            's_type' => 'required|max:100',
            'name' => 'required|max:100',
            'r_type' => 'required|max:100',
            'instant_book' => 'required|max:100',
            'pa_number' => 'required|max:100',
            'payment_method' => 'required|max:100',
            'per_minute' => 'required|max:100',
            'per_kilometer' => 'required|max:100',
            'default_cost' => 'required|max:100'
        ]);

        $service = new service_types;

        $service->serviceType = $request->input('s_type') ;
            if ($request->s_type == null) {
            $service->serviceType = 'N/A' ;
        }

        $service->name = $request->input('name') ;
            if ($request->name == null) {
            $service->name = 'N/A' ;
        }

        $service->rateType = $request->input('r_type') ;
            if ($request->r_type == null) {
            $service->rateType = 'N/A' ;
        }

        $service->instant_bookings = $request->input('instant_book') ;
            if ($request->instant_book == null) {
            $service->instant_bookings = 'N/A' ;
        }

        $service->nop = $request->input('pa_number') ;
            if ($request->pa_number == null) {
            $service->nop = 'N/A' ;
        }

        $service->payment_methods = $request->input('payment_method') ;
            if ($request->payment_method == null) {
            $service->payment_methodst = 'N/A' ;
        }

        $service->per_minute = $request->input('per_minute') ;
            if ($request->per_minute == null) {
            $service->per_minute = 'N/A' ;
        }

        $service->per_kilometer = $request->input('per_kilometer') ;
            if ($request->per_kilometer == null) {
            $service->per_kilometer = 'N/A' ;
        }

        $service->default_cost = $request->input('default_cost') ;
            if ($request->default_cost == null) {
            $service->default_cost = 'N/A' ;
        }

        $service->status = 1;

        $service->save();

        return $service->id;
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
        $this->validate($request, [
            's_type' => 'required|max:100',
            'name' => 'required|max:100',
            'r_type' => 'required|max:100',
            'instant_book' => 'required|max:100',
            'pa_number' => 'required|max:100',
            'payment_method' => 'required|max:100',
            'per_minute' => 'required|max:100',
            'per_kilometer' => 'required|max:100',
            'default_cost' => 'required|max:100'
        ]);

        $service = service_types::find($request->id_number);

        $service->serviceType = $request->input('s_type') ;
            if ($request->s_type == null) {
            $service->serviceType = 'N/A' ;
        }

        $service->name = $request->input('name') ;
            if ($request->name == null) {
            $service->name = 'N/A' ;
        }

        $service->rateType = $request->input('r_type') ;
            if ($request->r_type == null) {
            $service->rateType = 'N/A' ;
        }

        $service->instant_bookings = $request->input('instant_book') ;
            if ($request->instant_book == null) {
            $service->instant_bookings = 'N/A' ;
        }

        $service->nop = $request->input('pa_number') ;
            if ($request->pa_number == null) {
            $service->nop = 'N/A' ;
        }

        $service->payment_methods = $request->input('payment_method') ;
            if ($request->payment_method == null) {
            $service->payment_methods = 'N/A' ;
        }

        $service->per_minute = $request->input('per_minute') ;
            if ($request->per_minute == null) {
            $service->per_minute = 'N/A' ;
        }

        $service->per_kilometer = $request->input('per_kilometer') ;
            if ($request->per_kilometer == null) {
            $service->per_kilometer = 'N/A' ;
        }

        $service->default_cost = $request->input('default_cost') ;
            if ($request->default_cost == null) {
            $service->default_cost = 'N/A' ;
        }

        $service->status = 1;

        $service->save();

        return $service->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = service_types::find($request->id);
        $data->delete();
        return $request->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function suspend(Request $request)
    {
        $data = service_types::find($request->id);
        $data->status = 2;
        return $request->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getService(Request $request)
    {
        $data = service_types::find($request->id);
        return $data;
    }
}
