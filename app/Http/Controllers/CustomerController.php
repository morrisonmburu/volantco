<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\service_types;
use App\Mail\passwordReset;
use App\Mail\AccountType;
use App\Mail\emailVerify;
use Illuminate\Support\Facades\Mail;
use App\Truck_types;
use App\Account_types;
use Carbon\Carbon;

class CustomerController extends Controller
{

    public function login(Request $request){
        
        $user = User::where('email', $request->email)->first();

        if (Auth::guard('web')->attempt($request->only(['email', 'password'])) && $user->status != 0) {
            $status = 200;
            $response = [
                'user' => Auth::guard('web')->user(),
                'token' => Auth::guard('web')->user()->createToken('usertoken')->accessToken,
            ];
            $user->user_token = $response['token'];
            $user->save();
        }else{
            $status = 401;
            $response = ['error' => 'Unauthorized'];
        }
        
        return response()->json($response);
    }

    public function register(Request $request){

        // dd($request);

        $validator = Validator::make($request->all(), [
                'f_name' => 'required|max:50',
                'l_name' => 'required|max:50',
                'email' => 'required|max:50',
                'email' => 'required|email|unique:users',
                'phone' => 'required|unique:users',
                'password' => 'required|min:6',
                'c_password' => 'required|same:password',
                'account_type' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 200);
            }

            // morrison45
            $account = 1;
            $status = 1;
            if($request->account_type == 'Classic'){
                $account = 1;
                $status = 1;
            }elseif ($request->account_type == 'Business') {
                $account = 2;
                $message = "Hello!😎 You are receiving this email because you have request for a business account, for this business account you need to sign a contract with us for us to activate your account:-";

                Mail::to($request->email)->send(new AccountType($request->f_name, $message, $request->account_type));
                $status = 0;
            }elseif($request->account_type == 'Corporate'){
                $account = 3;
                $message = "Hello!😎 You are receiving this email because you have request for a corporate account, for this corporate account you need to sign a contract with us for us to activate your account:-";

                Mail::to($request->email)->send(new AccountType($request->f_name, $message, $request->account_type));
                $status = 0;
            }else{
                $account = 1;
                $status = 0;
            }

            $data = $request->only(['f_name', 'l_name', 'username', 'email', 'password', 'phone', 'role', 'account_type', 'status', 'platform']);

            $phone1 =  str_replace(' ', '', $data['phone']);
            $phone2 = ltrim($phone1, 0);
            $phone = "+254".$phone2;

            $data['phone'] = $phone;

            $data['username'] = $data['f_name'].' '.$data['l_name'];
            $data['role'] = 1;
            $data['account_type'] = $account;
            $data['status'] = $status;
            $data['platform'] = 'Website';
            $data['password'] = bcrypt($data['password']);
            $data['email_activation_token'] = str_random(60);

            // dd($data);
            Mail::to($request->email)->send(new emailVerify($data));

            $user = User::create($data);
            $user->is_admin = 0;

            return response()->json([
                'user' => $user,
            ]);
    }

    // public function getDataStream(Request $request){
    //     $response = new \Symfony\Component\HttpFoundation\StreamedResponse(function() use ($request) {
    //         $notif = 'Test';
    //         echo 'data: ' . json_encode($notif) . "\n\n";
    //         ob_flush();
    //         flush();
    //         usleep(200000);
    //     });
    //     $response->headers->set('Content-Type', 'text/event-stream');
    //     $response->headers->set('X-Accel-Buffering', 'no');
    //     $response->headers->set('Cach-Control', 'no-cache');
    //     return $response;
    // }

    public function verify($token){
        $user = User::where('email_activation_token', '=', $token)->first();

        if(!$user){
            return response()->json([
                'message' => 'This Activation Token is invalid.'
            ], 404);
        }

        $user->status = 1;
        $user->email_verified_at = Carbon::now()->setTimezone('GMT+3');
        $user->save();

        return response()->json([
            'user' => $user,
            'success' => true,
        ]);
    }

    public function saveVolantuser(Request $request){

        $validator = Validator::make($request->all(), [
                'f_name' => 'required|max:50',
                'email' => 'required|max:50',
                'email' => 'required|email|unique:users',
                'phone' => 'required|unique:users',
                'password' => 'required|min:6',
                'c_password' => 'required|same:password',
                'account_type' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }

            $data = $request->only(['f_name', 'l_name', 'username', 'email', 'password', 'phone', 'role', 'account_type', 'status', 'platform']);
            $data['username'] = $data['f_name'].' '.$data['l_name'];
            $data['role'] = 1;
            if($request->account_type == 'Individual'){
                $data['account_type'] = 1;
            }else{
                $data['account_type'] = 2;
            }
            $data['status'] = 1;
            $data['platform'] = 'Website';
            $data['password'] = bcrypt($data['password']);

            // dd($data);

            $user = User::create($data);
            $user->is_admin = 0;

            return response()->json([
                'user' => $user,
                'token' => $user->createToken('usertoken')->accessToken,
            ]);
    }

    public function allVolantusers(){
        return response()->json(User::all(),200);
    }

    public function getCustomers(){
        $data = User::orderBy("id", "desc")->get();
        return view("dashboard.customer")->withData($data);
    }

    public function destroy($id){
        $customer = User::find($id);
        $customer->delete();
        return redirect('/customers')->with('success', 'Volant Customer successfully removed');
    }

    // public function show($id){
    //     $data = Volantuser::find($id);
    //     return view("dashboard.showCustomer")->withData($data);
    // }

    public function getUser(Request $request){
        $id = $request->user_id;
        return response()->json(User::find($id),200);
    }

    public function editInfo(Request $request){
        $validator = Validator::make($request->all(), [
                'f_name' => 'required|max:50',
                'l_name' => 'required|max:50',
                'email' => 'required|email',
                'phone' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }

            $id = $request->user_id;
            $user = User::find($id);

            $user->f_name = $request->f_name;
            $user->l_name = $request->l_name;
            $user->username = $request->f_name.' '.$request->l_name;
            $user->email = $request->email;

            if ($request->phone[0] === '0') {
                $phone1 =  str_replace(' ', '', $request->phone);
                $phone2 = ltrim($phone1, 0);
                $phone = "+254".$phone2;

                $user->phone = $phone;
            }else{
                $user->phone = $request->phone;
            }

            
            if($request->serviceType == 'Classic'){
                $user->account_type = 1;
            }elseif($request->serviceType == 'Business'){
                $user->account_type = 2;
            }else{
                $user->account_type = 3;
            }

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
            $user = User::find($id);

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

    public function getServiceCustomer(){
        return response()->json(Account_types::all(),200);
    }

    public function sendPasswordResetLink(Request $request)
    {
        $email = $request->email;
        if(User::where("email", "=", $email)->count() == 0){
          $error = [
            'error' => 'Error, User doesnt exist',
          ];
          return response()->json($error);
        }else{
            $volantuser = User::where("email", "=", $email)->get();
            $volantuser[0]->api_token = str_random(40);
            $volantuser[0]->save();
            $message = "Hello!😎 You are receiving this email because we received a password reset request for your account. Click the link below to reset Your Password";
            Mail::to($request->email)->send(new passwordReset($volantuser[0]->username, $message, $volantuser[0]->api_token));
            $success = [
                'success' => 'Successfully Sent a resent link to your email',
            ];
            return response()->json($success);
        }
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $token = $request->token;
        $user = User::where('api_token', '=', $token)->get();
    
        $user[0]->password = bcrypt($request->password);

        $user[0]->save();

        $user[0]->is_admin = 0;

        return response()->json([
            'user' => $user[0],
            'token' => $user[0]->createToken('usertoken')->accessToken,
        ]);
    }

    public function changeAccount(Request $request){
        $user_id = $request->user_id;
        $user = User::find($user_id);
        if($user->account_type == 2 || $user->account_type == 3){
            //change to classic account
            $user->account_type = 1;
        }else{
            //change to business account
            $user->account_type = 2;
        }
        $user->save();
        return response()->json([
            'user' => $user,
            'success' => 'successfull',
            'token' => $user->createToken('usertoken')->accessToken,
        ]);
    }

    public function getVolantUser(Request $request){
        $user_id = $request->user_id;
        $user = User::find($user_id);

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('usertoken')->accessToken,
        ]);

    }

}
