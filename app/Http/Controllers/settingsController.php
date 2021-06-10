<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Settings;
use Auth;
use Session;
use Validator;
use Illuminate\Support\Facades\Hash;

class settingsController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
    	$data = Settings::latest()->first();
    	$user_id = Auth::user()->id;
    	$user = User::find($user_id);

    	return view("settings.index")->withData($data)->withUser($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function mpesa(Request $request){

    	$validator = Validator::make($request->all(), [
    		'mpesa_consumerKey' => 'required|max:255',
    		'mpesa_consumerSecret' => 'required|max:255'
    	]);

    	if ($validator->fails()) {
    		$errors = [
    			'errors' => $validator->errors(),
    		];
    		return $errors; 
    	}

    	$settings = new Settings();

    	$settings->mpesa_consumerKey = $request->mpesa_consumerKey;
    	$settings->mpesa_consumerSecret = $request->mpesa_consumerSecret;
    	$settings->user_id = $request->user_id;

    	$settings->save();

    	return $settings;
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function user(Request $request){
     	$validator = Validator::make($request->all(), [
    		'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
    	]);

    	if ($validator->fails()) {
    		$errors = [
    			'errors' => $validator->errors(),
    		];
    		return $errors; 
    	}

    	$user = User::find($request->user_id);

    	$user->name = $request->username;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);

    	$user->save();

    	return $user;
     }

}
