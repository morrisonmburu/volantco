<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/volantuser/{opt?}', function () {
 return view('customer.index');
})->where('opt', '.*');

// Route::get('/riders_login', 'RidersController@riders_login')->name('riders_login');

Route::group(['middleware' => ['web']], function(){

	Route::resource("courier", "courierController");
    Route::get("/courier/", "courierController@index")->name("courier");
	Route::resource("truck", "truckController");
    Route::get("/truck/", "truckController@index")->name("truck");
	Route::resource("orders", "ordersController");
    Route::get("/orders/", "ordersController@index")->name("orders");
    Route::post("orders/destroy", 'ordersController@destroy')->name("orders.destroy");
	Route::get("/", "pagesController@index");
	Route::resource("dispatch", 'dispatchController');
    Route::get("/dispatch/", "dispatchController@index")->name("dispatch");
    Route::resource("freight_orders", "FreightController");
    Route::get("/freight_orders/", "FreightController@index")->name("freight_orders");
	Route::resource("locations", 'locationsController');
    Route::get("/metro_services", 'pagesController@metro_services')->name("metro_services");
    Route::get("/freight_services", 'pagesController@freight_services')->name("freight_services");
    Route::get("/packaging_services", 'pagesController@packaging_services')->name("packaging_services");
    Route::get("/construction_services", 'pagesController@construction_services')->name("construction_services");
    Route::get("/consult_services", "pagesController@consult_services")->name("consult_services");
    Route::get("/driver_application", "pagesController@driver_application")->name("driver_application");
    Route::get("/contact_us", "pagesController@contact_us")->name("contact_us");

    Route::post("/addDriver/front", "pagesController@addDriver")->name("addDriver.front");
    Route::post("/contact", "pagesController@contact")->name("contact");

	Route::get('messages', 'CustomerSupportController@fetchMessages');
    Route::post('messages', 'CustomerSupportController@sendMessage');
    Route::get('about_us', 'pagesController@Aboutus');

    Route::resource('roles', 'RoleController');
    Route::post('getRole', 'RoleController@getRole')->name('getRole');
    Route::post('roles/update', 'RoleController@update')->name('roles.update');
    Route::post('roles/destroy', 'RoleController@destroy')->name('roles.destroy');
    Route::resource('permissions', 'PermissionController');
    Route::post('permissions/destroy', 'PermissionController@destroy')->name('permissions.destroy');
    Route::post('permissions/update', 'PermissionController@update')->name('permissions.update');
    Route::post('getPermission', 'PermissionController@getPermission')->name('getPermission');

    Route::resource('operators', 'operatorsController');
    Route::get('/operators', 'operatorsController@index')->name('operators');
    Route::post('operators/destroy', 'operatorsController@destroy')->name('operators.destroy');
    Route::post('operators/update', 'operatorsController@update')->name('operators.update');
    Route::post('getOperator', 'operatorsController@getOperator')->name('getOperator');

    //packaging and moves
    Route::resource("house_type", 'houseTypeController');
    Route::get('/house_type', 'houseTypeController@index')->name('house_type');

    Route::get('/testmail', 'testController@testmail')->name('testmail');

});

// Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/excelcouriers', 'DashboardController@makeExcelCouriers')->name("excelcouriers");
Route::get('/csvcouriers', 'DashboardController@makeCsvCouriers')->name("csvcouriers");
Route::get('/pdfcouriers', 'DashboardController@makePdfCouriers')->name("pdfcouriers");
Route::get('/customers', 'CustomerController@getCustomers')->name("customers");
Route::delete('/customersRemove/{id}', 'CustomerController@destroy')->name("customersRemove");
Route::get('/customers/show/{id}', 'CustomerController@show')->name("customers.show");
Route::post('/orders/complete', 'ordersController@complete')->name("orders.complete");
Route::post('/orders/cancel', 'ordersController@cancel')->name("orders.cancel");
Route::get('/orders/{id}/dispatch', 'ordersController@dispatch')->name("orders.dispatch");

Route::post('/freight_orders/complete', 'FreightController@complete')->name("freight_orders.complete");
Route::post('/freight_orders/cancel', 'FreightController@cancel')->name("freight_orders.cancel");
Route::get('/freight_orders/{id}/dispatch', 'FreightController@dispatch')->name("freight_orders.dispatch");

Route::post('/addDriver', 'courierController@store')->name("addDriver");
Route::post('/getDriver', 'courierController@getDriver')->name("getDriver");
Route::post('/updateDriver', 'courierController@update')->name("updateDriver");
Route::get('/dispatchPanel', 'DashboardController@dispatchPanel')->name("dispatchPanel");
// Route::get('/trackerPanel', 'DashboardController@trackerPanel')->name("trackerPanel");
Route::post('/getOrder', 'DashboardController@getOrder')->name("getOrder");
Route::post('/image/upload/store', 'courierController@imageStore')->name("image/upload/store");
Route::post('image/delete', 'courierController@imageDelete')->name("image/delete");

Route::post('/image/car/upload/store', 'courierController@imagecarStore')->name("image/car/upload/store");
Route::post('image/car/delete', 'courierController@imagecarDelete')->name("image/car/delete");

Route::get('/driverVerification/{token}', 'pagesController@driverVerification')->name('driverVerification');
Route::post('/activate_driver', 'pagesController@activate_driver')->name('activate_driver');

Route::post("/fetchDriver", 'courierController@fetchDriver')->name('fetchDriver');
Route::post("/dispatch/store", 'dispatchController@store')->name('/dispatch/store');
Route::post("suspendDriver", 'courierController@suspend')->name('suspendDriver');
Route::post("deleteDriver", 'courierController@destroy')->name('deleteDriver');
Route::post("activateDriver", 'courierController@activateDriver')->name('activateDriver');

//service Types
Route::resource('serviceType', 'serviceTypesController');
Route::get('/serviceType/', 'serviceTypesController@index')->name('serviceType');
Route::post('getService/', 'serviceTypesController@getService')->name('getService');
Route::post('/createService', 'serviceTypesController@store')->name('createService');
Route::post('/edit/serviceType', 'serviceTypesController@update')->name('edit.serviceType');
Route::post('/suspendService/', 'serviceTypesController@suspendService')->name('suspendService');
Route::post('/deleteServiceType', 'serviceTypesController@destroy')->name('deleteServiceType');

//all settings
Route::get('/settings', 'settingsController@index')->name('settings');
Route::post('/settings/mpesa', 'settingsController@mpesa')->name('settings.mpesa');
Route::post('/settings/user', 'settingsController@user')->name('settings.user');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/customer/activate', 'DashboardController@activateCustomer')->name('customer.activate');
Route::post('/customer/delete', 'DashboardController@deleteCustomer')->name('customer.delete');

//payments miscellaneous
Route::get('/order_payments', 'PaymentsController@order_payments')->name('order_payments');
Route::get('/payment_types', 'PaymentsController@payment_types')->name('payment_types');

//company miscellaneous
Route::get('/account_types', 'CompanyController@account_types')->name('account_types');
Route::get('/categories', 'CompanyController@categories')->name('categories');
Route::get('/package_sizes', 'CompanyController@package_sizes')->name('package_sizes');
Route::get('/truck_types', 'CompanyController@truck_types')->name('truck_types');
Route::get('/user_roles', 'CompanyController@user_roles')->name('user_roles');

Route::post('/getRider', 'DashboardController@getRider')->name("getRider");
Route::post('/InTransit', 'DashboardController@InTransit')->name("InTransit");
Route::post('/getRiderAccount', 'DashboardController@getRiderAccount')->name("getRiderAccount");

Route::get('/trackerPanel', 'trackerController@trackerPanel')->name('trackerPanel');
Route::get('/getTrackOrders', 'trackerController@getTrackOrders')->name('getTrackOrders');
Route::post('/getStopoverLocations', 'trackerController@getStopoverLocations')->name('getStopoverLocations');

Route::resource('volant_pricings', 'volantPricingController');
Route::get('/volant_pricings', 'volantPricingController@index')->name('volant_pricings');
Route::post('/volant_pricings/update', 'volantPricingController@update')->name('volant_pricings.update');

Route::get('/riders/reset-password/{token}', 'RidersController@resetLink')->name('riders.reset-password');
Route::post('/riders/resetPasswordLink', 'RidersController@postResetPassword')->name('riders.resetPasswordLink');

Route::post('/getOrderStatus', 'DashboardController@getOrderStatus')->name('getOrderStatus');

Route::get('error_callback', 'RidersController@errorCallback')->name('error_callback');
