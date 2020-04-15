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

Route::group(['middleware' => ['web']], function(){

	Route::resource("courier", "courierController");
	Route::resource("truck", "truckController");
	Route::resource("orders", "ordersController");
	Route::get("/", "pagesController@index");
	Route::resource("dispatch", 'dispatchController');
	Route::resource("locations", 'locationsController');
	Route::get("/packages", 'pagesController@packages');

});

Auth::routes();

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