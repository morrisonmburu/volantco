<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Couriers;
use App\Mail\driverappMail;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;
use App\Category;
use Session;
use File;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class courierController extends Controller
{
    private function sendMessage($message, $recipients)
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients, 
                ['from' => $twilio_number, 'body' => $message] );
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('couriers')->get();
        $category = Category::all();
        return view("dashboard.courier.index")->withData($data)->withCategory($category);
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
    public function getDriver(Request $request){
        $id = $request->id;
        $driver = DB::table('couriers')
                ->join('categories', 'categories.id', '=', 'couriers.category')
                ->select('couriers.*', 'categories.name as category', 'couriers.id as id')
                ->where('couriers.id', '=', $id)
                ->get();
        return $driver;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:couriers',
            'phoneNo' => 'required|min:3|max:25',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 200);
        }

        $driver1 = new Couriers;

        $driver1->email = $request->input('email');
        $driver1->phoneNo = $request->input('phoneNo');

        $driver1->Name = $request->input('associate_name') ;
            if ($request->associate_name == null) {
            $driver1->Name = 'N/A';
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

        $driver1->boardNo = 'Volant_'.rand(1, 10000);

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

        $driver1->category = $request->input('category_id') ;
            if ($request->category_id == null) {
            $driver1->category = 1;
        }

        $driver1->associate_type = $request->input('associate_type');
        if ($request->associate_type == null) {
            $driver1->associate_type = 'N/A';
        }

        $driver1->token = str_random(40);
        $rider_password = str_random(8);
        $driver1->password = Hash::make($rider_password);
        $driver1->is_online = 0;
        $driver1->is_special = 0;

        $message = "Happy to see you have been registered as a driver in Volant Ltd!😎";
        Mail::to($request->email)->send(new driverappMail('VolantDriver', $message, $request->phoneNo, $driver1->token, $rider_password, $driver1->email));
         // $this->sendMessage('Happy to see you have been registered as a driver in Volant Ltd!😎', $request->phoneNo);

        $driver1->save() ;

        return $driver1->id;
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
        $data = DB::table('couriers')
                ->join('categories', 'categories.id', '=', 'couriers.category')
                ->select('couriers.*', 'categories.name as category')
                ->find($id);
        return view("dashboard.courier.edit")->withData($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function imageStore(Request $request){
        $id = $request->orderImageid;
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);
        
        $imageUpload = Couriers::find($id);

        $file = $imageUpload->driver_avatar;

        if ($imageUpload->driver_avatar == '' || $imageUpload->driver_avatar == 'N/A') {
            $imageUpload->driver_avatar = $imageName;
            $imageUpload->save();
        }else{
            $path=public_path().'/images/'.$file;
            if (file_exists($path)) {
                File::delete('images/'.$file);
                $imageUpload->driver_avatar = $imageName;
                $imageUpload->save();
            }else{
                $imageUpload->driver_avatar = $imageName;
                $imageUpload->save();
            }
        }
        return response()->json(['success'=>$imageName]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function imageDelete(Request $request)
    {
        $id = $request->orderImageid;
        $filename =  $request->get('filename');
        $driver_avatar = Couriers::find($id);
        $driver_avatar->driver_avatar = 'N/A';
        $driver_avatar->save();
        $path=public_path().'/images/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function imagecarStore(Request $request){

        $id = $request->orderImageid2;
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);
        
        $imageUpload = Couriers::find($id);

        $file = $imageUpload->vehicle_avatar;

        if ($imageUpload->vehicle_avatar == '' || $imageUpload->vehicle_avatar == 'N/A') {
            $imageUpload->vehicle_avatar = $imageName;
            $imageUpload->save();
        }else{
            $path=public_path().'/images/'.$file;
            if (file_exists($path)) {
                File::delete('images/'.$file);
                $imageUpload->vehicle_avatar = $imageName;
                $imageUpload->save();
            }else{
                $imageUpload->vehicle_avatar = $imageName;
                $imageUpload->save();
            }
        }
        return response()->json(['success'=>$imageName]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function imagecarDelete(Request $request)
    {
        $id = $request->orderImageid;
        $filename =  $request->get('filename');
        $vehicle_avatar = Couriers::find($id);
        $vehicle_avatar->vehicle_avatar = 'N/A';
        $vehicle_avatar->save();
        $path=public_path().'/images/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;  
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

        $id = $request->input('id_number');
        $this->validate($request, [
            'email_address' => 'required|email',
            'phoneNumber' => 'required|min:3|max:25',
        ]);

        $driver1 = Couriers::find($id) ;
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

        $driver1->number_of_passangers = $request->input('p_number') ;
            if ($request->p_number == null) {
            $driver1->number_of_passangers = 'N/A' ;
        }

        if($request->input('category_id') == 'Metro Deliveries' || $request->input('category_id') == 1){
            $category_name = 1;
        }else if($request->input('category_id') == 'Cargo & Freight' || $request->input('category_id') == 2){
            $category_name = 2;
        }else if($request->input('category_id') == 'Packaging & Moves' || $request->input('category_id') == 3){
            $category_name = 3;
        }else{
            $category_name = 4;
        }

         $driver1->category = $category_name;
            if ($category_name == null) {
            $driver1->category = 1;
        }

        $driver1->associate_type = $request->input('associate_type') ;
            if ($request->associate_type == null) {
            $driver1->associate_type = 'N/A';
        }

        $driver1->save() ;

        return $driver1->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $driver1 = Couriers::find($id);
        $driver1->delete();
        return $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fetchDriver(Request $request){
        $id = $request->select;
        $driver = Couriers::find($id);
        return $driver;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function suspend(Request $request){
        $id = $request->id;
        $driver = Couriers::find($id);
        $driver->status = 2;
        $driver->save();
        return $driver->id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function activateDriver(Request $request){
        $id = $request->id;
        $driver = Couriers::find($id);
        $driver->status = 1;
        $driver->save();
        return $driver->id;
    }

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

        $driver1->category = $request->input('category_id') ;
            if ($request->category_id == null) {
            $driver1->category = 0;
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