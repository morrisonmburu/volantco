<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'CustomerController@login');
Route::post('register', 'CustomerController@register');

Route::group(['middleware' => 'auth:volantuser-api'], function(){
	Route::get('/getorders', 'ordersController@allOrders');
	Route::post('/deleteOrder', 'ordersController@deleteOrder');
	Route::post('/storeorders', 'ordersController@store');
});
