<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentsController extends Controller
{
    public function order_payments(){
    	$data = DB::table('order_payments')
    			->join('payment_types', 'payment_types.id', '=', 'order_payments.payment_type_id')
    			->join('users', 'users.id', '=', 'order_payments.user_id')
    			->select('order_payments.*', 'payment_types.*', 'users.*', 'payment_types.name as payment_type', 'order_payments.created_at as datetime', 'order_payments.id as order_payment_id')
    			->get();
    	return view('dashboard.payments.order_payments')->withData($data);
    }

    public function payment_types(){
    	$data = DB::table('payment_types')
    			->select('payment_types.*')
    			->get();
    	return view('dashboard.payments.payment_types')->withData($data);
    }
}
