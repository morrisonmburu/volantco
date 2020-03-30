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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web']], function(){

	Route::resource("courier", "courierController");
	Route::resource("truck", "truckController");

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/excelcouriers', 'DashboardController@makeExcelCouriers')->name("excelcouriers");
Route::get('/csvcouriers', 'DashboardController@makeCsvCouriers')->name("csvcouriers");
Route::get('/pdfcouriers', 'DashboardController@makePdfCouriers')->name("pdfcouriers");