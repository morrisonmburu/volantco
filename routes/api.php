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
Route::get('getServiceCustomer', 'CustomerController@getServiceCustomer');


	//backend routes
	Route::post('/getorders', 'ordersController@allOrders');
	Route::post('/getorder', 'ordersController@getorder');
	Route::post('/deleteOrder', 'ordersController@deleteOrder');
	Route::post('/storeorders', 'ordersController@store');
	Route::post('/getuser', 'CustomerController@getUser');
	Route::post('/editInfo', 'CustomerController@editInfo');
	Route::post("/changePassword", "CustomerController@changePassword");
    Route::get("/getTruck_types", 'CustomerController@getTruck_types');
    Route::post("/getfreightorders", "FreightController@freightOrder");
    Route::post("/storefreightorders", "FreightController@storefreightorders");
	Route::post("/getallfreightorders", 'FreightController@allOrders');

	Route::post("/storemovesorder", 'movesExtraController@storemovesorder');

	// Send reset password mail
    Route::post('reset-password', 'CustomerController@sendPasswordResetLink');
        
    // handle reset password form process
    Route::post('reset/password', 'CustomerController@resetPassword');

    //customer order tracking
    Route::post('gettracking_order', 'trackerController@gettracking_order');
//rest Api
Route::get('/getallorders', 'ordersController@getOrders');
Route::get('/gettrackorders', 'ordersController@gettrackOrders');
Route::post('/saveOrders', 'ordersController@restStore');
Route::get('/allVolantusers', 'CustomerController@allVolantusers');
Route::post('/saveVolantuser', 'CustomerController@saveVolantuser');

//freight services
Route::get('/getfreight_serviceorders', 'FreightController@getfreight_serviceorders');
Route::post('/saveFreightorders', 'FreightController@restStore');

Route::get('/allDrivers', 'driversController@allDrivers');
Route::post('/saveDrivers', 'driversController@saveDrivers');

//riders App Apis
Route::post('riders_login', 'RidersController@login');
Route::group(['middleware' => ['auth:rider-api']], function(){
	Route::post('riders/change_password', 'RidersController@change_password');
Route::get('riders/get_dispatched_orders', 'RidersController@get_dispatched_orders');
Route::get('riders/get_dispatched_order/{id}', 'RidersController@get_dispatched_order');
Route::post('riders/accept_dispatch_order/{id}', 'RidersController@accept');
Route::post('riders/reject_dispatch_order/{id}', 'RidersController@reject');
Route::get('riders/get_waiting_dispatch_order/{id}', 'RidersController@get_waiting_dispatch_order');
Route::get('riders/get_accepted_dispatch_order/{id}', 'RidersController@get_accepted_dispatch_order');
Route::get('riders/get_complete_dispatched_order/{id}', 'RidersController@get_complete_dispatched_order');
Route::post('riders/complete_dispatch_order/{id}', 'RidersController@complete_dispatch_order');
Route::get('riders/get_rejected_dispatched_order/{id}', 'RidersController@get_rejected_dispatched_order');
Route::post('riders/update_rider_api', 'RidersController@update_rider_api');
Route::post('riders/change_rider_online_status', 'RidersController@change_rider_online_status');
Route::post('riders/rider_device_token', 'RidersController@rider_device_token');
Route::post('riders/updateDriverLocation', 'RidersController@updateDriverLocation');
Route::post('riders/become_available', 'RidersController@become_available');

Route::post('riders/sendPasswordResetLink', 'RidersController@sendPasswordResetLink');

});

//pricing get
Route::post('pricing/volant_pricings', 'volantPricingController@getPricing');
//get Android
Route::get('pricing/volant_pricings', 'volantPricingController@getPricing2');

//get dispatch panel orders
Route::post('getdispatchorders', 'dispatchPanelController@getdispatchorders');

Route::post('volantuser/changeAccount', 'CustomerController@changeAccount');

Route::post('volantuser/getVolantUser', 'CustomerController@getVolantUser');

Route::get('volantuser/auth/emailverification/{token}', 'CustomerController@verify');

Route::post('tookanData', 'ordersController@testData');

Route::post("/volantWebHook", 'ordersController@testWebHook');

Route::get('/notif_data/{id}', 'ordersController@getDataStream');
