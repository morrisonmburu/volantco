<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function account_types(){
    	$data = DB::table('account_types')
    			->select('account_types.*')
    			->get();
    	return view('dashboard.extra.account_types')->withData($data);
    }

    public function categories(){
    	$data = DB::table('categories')
    			->select('categories.*')
    			->get();
    	return view('dashboard.extra.categories')->withData($data);
    }

    public function package_sizes(){
    	$data = DB::table('package_sizes')
    			->select('package_sizes.*')
    			->get();
    	return view('dashboard.extra.package_sizes')->withData($data);
    }

    public function truck_types(){
    	$data = DB::table('truck_types')
    			->select('truck_types.*')
    			->get();
    	return view('dashboard.extra.truck_types')->withData($data);
    }

    public function user_roles(){
    	$data = DB::table('user_roles')
    			->select('user_roles.*')
    			->get();
    	return view('dashboard.extra.user_roles')->withData($data);
    }
}
