<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Orders;
use App\Payments;
use App\User;
use Notification;
use App\Notifications\mailNotification;
use App\Mail\sendMail;
use App\Mail\sendMailAdmin;
use Illuminate\Support\Facades\Mail;
use App\Couriers;
use App\Trucks;
use App\Locations;
use App\Category;
use Illuminate\Support\Facades\DB;
use App\Truck_types;
use App\Payment_types;
use App\Order_payments;
use App\Admins;


class dispatchPanelController extends Controller
{
    public function dispatchPanelController(Request $request){
    	return response()->json($request->id ,200);
    }
}
