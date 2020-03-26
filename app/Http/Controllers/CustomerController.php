<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;


class CustomerController extends Controller
{
    public function login(Request $request){
        $status = 401;
        $response = ['error' => 'Unauthorized'];

        if (Auth::guard('web')->attempt($request->only(['email', 'password']))) {
            $status = 200;
            $response = [
                'user' => Auth::guard('web')->user(),
                'token' => Auth::guard('web')->user()->createToken('usertoken')->accessToken,
            ];
        }

        return response()->json($response, $status);
    }

    public function register(Request $request){

        // dd($request);

        $validator = Validator::make($request->all(), [
                'name' => 'required|max:50',
                'email' => 'required|email',
                'password' => 'required|min:6',
                'phone' => 'required',
                'c_password' => 'required|same:password',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }

            $data = $request->only(['name', 'email', 'phone','password']);
            $data['password'] = bcrypt($data['password']);

            $user = User::create($data);
            $user->is_admin = 0;

            return response()->json([
                'user' => $user,
                'token' => $user->createToken('usertoken')->accessToken,
            ]);
    }
}
