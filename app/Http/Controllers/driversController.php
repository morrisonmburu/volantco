<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Couriers;
use App\Mail\driverappMail;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;
use Session;
use File;

class driversController extends Controller
{
    public function allDrivers(){
        return response()->json(Couriers::all(),200);
    }

    public function restStore(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'phoneNo' => 'required|min:3|max:25',
        ]);

        $driver1 = new Couriers;

        $driver1->email = $request->input('email');
        $driver1->phoneNo = $request->input('phoneNo');

        $driver1->Name = $request->input('Name') ;
            if ($request->Name == null) {
            $driver1->Name = 'N/A' ;
        }

        $driver1->licenseNo = $request->input('licenseNo') ;
            if ($request->licenseNo == null) {
            $driver1->licenseNo = 'N/A' ;
        }

        $driver1->vehicle_type = $request->input('vehicle_type') ;
            if ($request->vehicle_type == null) {
            $driver1->vehicle_type = 'N/A' ;
        }

        $driver1->vehicle_model = $request->input('vehicle_model') ;
            if ($request->vehicle_model == null) {
            $driver1->vehicle_model = 'N/A' ;
        }

        $driver1->vehicle_color = $request->input('vehicle_color') ;
            if ($request->vehicle_color == null) {
            $driver1->vehicle_color = 'N/A' ;
        }

        $driver1->vehicle_platenumber = $request->input('vehicle_platenumber') ;
            if ($request->vehicle_platenumber == null) {
            $driver1->vehicle_platenumber = 'N/A' ;
        }

        $driver1->production_year = $request->input('production_year') ;
            if ($request->production_year == null) {
            $driver1->production_year = 'N/A' ;
        }

        $driver1->boardNo = $request->input('boardNo') ;
            if ($request->boardNo == null) {
            $driver1->boardNo = 'N/A' ;
        }

        $driver1->number_of_passangers = $request->input('number_of_passangers') ;
            if ($request->number_of_passangers == null) {
            $driver1->number_of_passangers = 'N/A' ;
        }

        $driver1->status = 0;

        $driver1->driver_avatar = $request->input('driver_avatar') ;
            if ($request->driver_avatar == null) {
            $driver1->driver_avatar = 'N/A' ;
        }

        $driver1->vehicle_avatar = $request->input('vehicle_avatar') ;
            if ($request->vehicle_avatar == null) {
            $driver1->vehicle_avatar = 'N/A' ;
        }

        $driver1->token = str_random(40);

        $message = "Happy to see you have been registered as a driver in Volant Ltd!😎";

        Mail::to($request->email)->send(new driverappMail('VolantDriver', $message, $request->phoneNo, $driver1->token));
         // $this->sendMessage('Happy to see you have been registered as a driver in Volant Ltd!😎', $request->phoneNo);

        $driver1->save() ;

        return response()->json([
                'driver' => $driver1,
                'token' => $driver1->createToken('driverToken')->accessToken,
            ]);
    }
}
