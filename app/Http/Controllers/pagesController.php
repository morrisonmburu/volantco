<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Couriers;
use App\Mail\driverappMail;
use App\Mail\contactMail;
use Illuminate\Support\Facades\Mail;

class pagesController extends Controller
{
    public function index(){
    	return view("pages.index");
    }

    public function metro_services(){
    	return view("pages.metro_services");
    }

    public function freight_services(){
    	return view("pages.freight_services");
    }

    public function packaging_services(){
    	return view("pages.packaging_services");
    }

    public function construction_services(){
    	return view("pages.construction_services");
    }

    public function consult_services(){
    	return view("pages.consult_services");
    }

    public function driver_application(){
        return view("pages.driver_application");
    }

    public function contact_us(){
        return view("pages.contact_us");
    }

    public function Aboutus(){
        return view("pages.aboutus");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addDriver(Request $request){

        $this->validate($request, [
            'email_address' => 'required|email',
            'phoneNumber' => 'required|min:3|max:25',
        ]);

        $driver1 = new Couriers();
        $driver1->email = $request->input('email_address');
        $driver1->phoneNo = $request->input('phoneNumber');

        $driver1->Name = $request->input('Name') ;
            if ($request->Name == null) {
            $driver1->Name = 'N/A' ;
        }

        $driver1->licenseNo = $request->input('license') ;
            if ($request->license == null) {
            $driver1->licenseNo = 'N/A' ;
        }

        $driver1->vehicle_type = $request->input('v_type') ;
            if ($request->v_type == null) {
            $driver1->vehicle_type = 'N/A' ;
        }

        $driver1->vehicle_model = $request->input('model') ;
            if ($request->model == null) {
            $driver1->vehicle_model = 'N/A' ;
        }

        $driver1->vehicle_color = $request->input('color') ;
            if ($request->color == null) {
            $driver1->vehicle_color = 'N/A' ;
        }

        $driver1->vehicle_platenumber = $request->input('plate_no') ;
            if ($request->plate_no == null) {
            $driver1->vehicle_platenumber = 'N/A' ;
        }

        $driver1->production_year = $request->input('p_year') ;
            if ($request->p_year == null) {
            $driver1->production_year = 'N/A' ;
        }

        $driver1->boardNo = $request->input('boardNo') ;
            if ($request->boardNo == null) {
            $driver1->boardNo = 'N/A' ;
        }

        $driver1->number_of_passangers = $request->input('p_number') ;
            if ($request->p_number == null) {
            $driver1->number_of_passangers = 'N/A' ;
        }

        $driver1->token = str_random(40);

        $driver1->save() ;

        return $driver1->id;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function contact(Request $request){

        Mail::to('morrisonmburu7@gmail.com')->send(new contactMail($request->contact_name, $request->contact_last_name, $request->contact_inquiry, $request->contact_message, $request->contact_email));

    }

    public function driverVerification($token){
        $data = Couriers::where("token", "=", $token)->get();
        return view("auth.driver_activate")->withData($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activate_driver(Request $request){
        $id = $request->driver_id;
        $driver = Couriers::find($id);
        $driver->status = 1;
        $driver->save();
        return $driver->id;
    }
}
