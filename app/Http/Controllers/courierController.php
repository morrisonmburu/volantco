<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Couriers;

class courierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Couriers::all();
        return view("dashboard.courier.index")->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.courier.create");
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
            'firstName' => 'required|alpha|min:3|max:25',
            'lastName' => 'required|alpha|min:3|max:25',
            'county' => 'required|alpha|min:3|max:25',
            'city' => 'required|alpha|min:3|max:25',
            'paymentType' => 'required',
            'emergencyContactName' => 'required|alpha',
            'emergencyPhoneNo' => 'required|numeric',
        ]);

        $driver1 = new Couriers;
        $driver1->firstName = $request->input('firstName');
        $driver1->lastName = $request->input('lastName');
        $driver1->city = $request->input('city');
        $driver1->county = $request->input('county') ;
        $driver1->phoneNo = $request->input('phoneNo') ;
            if ($driver1->phoneNo == null) {
            $driver1->phoneNo = 'N/A' ;
        }
        $driver1->email = $request->input('email') ;
            if ($driver1->email == null) {
            $driver1->email = 'N/A' ;
        }
        $driver1->paymentType = $request->input('paymentType') ;
        $driver1->licenseNo = $request->input('licenseNo') ;
            if ($driver1->licenseNo == null) {
            $driver1->licenseNo = 'N/A' ;
        }
        $driver1->licenseExpiryDate = $request->input('licenseExpiryDate') ;
            if ($driver1->licenseExpiryDate == null) {
            $driver1->licenseExpiryDate = 'N/A' ;
        }
        $driver1->licenseIssuingState = $request->input('licenseIssuingState') ;
            if ($driver1->licenseIssuingState == null) {
            $driver1->licenseIssuingState = 'N/A' ;
        }
        $driver1->hireDate = $request->input('hireDate') ;
            if ($driver1->hireDate == null) {
            $driver1->hireDate = 'N/A' ;
        }
        $driver1->terminationDate = $request->input('terminationDate') ;
            if ($driver1->terminationDate == null) {
            $driver1->terminationDate = 'N/A' ;
        }
        $driver1->emergencyContactName = $request->input('emergencyContactName') ;
        $driver1->emergencyPhoneNo = $request->input('emergencyPhoneNo') ;

        $driver1->save() ;

        return redirect('/courier/')->with('success', 'Courier successfully added to the list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Couriers::find($id);
        return view("dashboard.courier.show")->withData($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Couriers::find($id);
        return view("dashboard.courier.edit")->withData($data);
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
            'firstName' => 'required|alpha|min:3|max:25',
            'lastName' => 'required|alpha|min:3|max:25',
            'county' => 'required|alpha|min:3|max:25',
            'city' => 'required|alpha|min:3|max:25',
            'paymentType' => 'required',
            'emergencyContactName' => 'required|alpha',
            'emergencyPhoneNo' => 'required|numeric',
        ]);

        $driver1 = Couriers::find($id) ;
        $driver1->firstName = $request->input('firstName');
        $driver1->lastName = $request->input('lastName');
        $driver1->city = $request->input('city');
        $driver1->county = $request->input('county');
        $driver1->phoneNo = $request->input('phoneNo') ;
            if ($driver1->phoneNo == null) {
            $driver1->phoneNo = 'N/A' ;
        }
        $driver1->email = $request->input('email') ;
            if ($driver1->email == null) {
            $driver1->email = 'N/A' ;
        }
        $driver1->paymentType = $request->input('paymentType') ;
        $driver1->licenseNo = $request->input('licenseNo') ;
            if ($driver1->licenseNo == null) {
            $driver1->licenseNo = 'N/A' ;
        }
        $driver1->licenseExpiryDate = $request->input('licenseExpiryDate') ;
            if ($driver1->licenseExpiryDate == null) {
            $driver1->licenseExpiryDate = 'N/A' ;
        }
        $driver1->licenseIssuingState = $request->input('licenseIssuingState') ;
            if ($driver1->licenseIssuingState == null) {
            $driver1->licenseIssuingState = 'N/A' ;
        }
        $driver1->hireDate = $request->input('hireDate') ;
            if ($driver1->hireDate == null) {
            $driver1->hireDate = 'N/A' ;
        }
        $driver1->terminationDate = $request->input('terminationDate') ;
            if ($driver1->terminationDate == null) {
            $driver1->terminationDate = 'N/A' ;
        }
        $driver1->emergencyContactName = $request->input('emergencyContactName') ;
        $driver1->emergencyPhoneNo = $request->input('emergencyPhoneNo') ;
        
        $driver1->save() ;
        //return $driver1;
        return redirect('/courier/')->with('success', 'Courier updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver1 = Couriers::find($id) ;
        $driver1->delete() ;
        return redirect('/courier/')->with('success', 'Courier successfully removed');
    }
}
