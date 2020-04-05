<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Volantuser;
use Validator;
use Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function login(Request $request){
        $status = 401;
        $response = ['error' => 'Unauthorized'];

        if (Auth::guard('volantuser')->attempt($request->only(['email', 'password']))) {
            $status = 200;
            $response = [
                'user' => Auth::guard('volantuser')->user(),
                'token' => Auth::guard('volantuser')->user()->createToken('usertoken')->accessToken,
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

            $user = Volantuser::create($data);
            $user->is_admin = 0;

            return response()->json([
                'user' => $user,
                'token' => $user->createToken('usertoken')->accessToken,
            ]);
    }

    public function getCustomers(){
        $data = Volantuser::orderBy("id", "desc")->get();
        return view("dashboard.customer")->withData($data);
    }

    public function destroy($id){
        $customer = Volantuser::find($id);
        $customer->delete();
        return redirect('/customers')->with('success', 'Volant Customer successfully removed');
    }

    public function show($id){
        $data = Volantuser::find($id);
        return view("dashboard.showCustomer")->withData($data);
    }

    public function getUser(Request $request){
        $id = $request->user_id;
        return response()->json(Volantuser::find($id),200);
    }

    public function editInfo(Request $request){
        $validator = Validator::make($request->all(), [
                'name' => 'required|max:50',
                'email' => 'required|email',
                'phone' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }

            $id = $request->user_id;
            $user = Volantuser::find($id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;

            $user->save();

            $user->is_admin = 0;

            return response()->json([
                'user' => $user,
                'token' => $user->createToken('usertoken')->accessToken,
            ]);
    }

    public function changePassword(Request $request){
         $validator = Validator::make($request->all(), [
                'oldpassword' => 'required|min:6',
                'password' => 'required|min:6',
                'c_password' => 'required|same:password',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }

            $id = $request->user_id;
            $user = Volantuser::find($id);

            if(Hash::check($request->oldpassword, $user->password)){
                $user->password = bcrypt($request->password);

                $user->save();

                $user->is_admin = 0;

                return response()->json([
                    'user' => $user,
                    'token' => $user->createToken('usertoken')->accessToken,
                ]);
            }else{
                return "error";
            }
    }
}
