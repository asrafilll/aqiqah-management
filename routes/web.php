<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
	if (\Auth::check()) {
		return back();
	}
	return redirect('login');
});

Auth::routes();

Route::get('init', function(){
	\Artisan::call('storage:link');
	\Artisan::call('key:generate');
	\Artisan::call('view:clear');
	\Artisan::call('config:cache');
	\Artisan::call('migrate:fresh');
	\Artisan::call('db:seed');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('order', OrderController::class);
Route::post('order_detail/store-customer-information' , 'OrderController@storeCustomerInformation')->name('order.store-customer-information');
Route::post('order_detail/store-order-information' , 'OrderController@storeOrderInformation')->name('order.store-order-information');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
	Route::get('/', 'Admin\HomeController@index')->name('home');
});

Route::group(['prefix' => 'kepala_cabang', 'as' => 'kepala_cabang.', 'middleware' => 'kepala.cabang'], function () {
	Route::get('/', 'KepalaCabang\HomeController@index')->name('home');
});

Route::group(['prefix' => 'kaptain_dapur', 'as' => 'kaptain_dapur.', 'middleware' => 'kaptain.dapur'], function () {
	Route::get('/', 'KaptainDapur\HomeController@index')->name('home');
});

Route::group(['prefix' => 'cs', 'as' => 'cs.', 'middleware' => 'cs'], function () {
	Route::get('/', 'CS\HomeController@index')->name('home');
});

Route::group(['prefix' => 'crew', 'as' => 'crew.', 'middleware' => 'crew'], function () {
	Route::get('/', 'Crew\HomeController@index')->name('home');
});

Route::group(['prefix' => 'direktur', 'as' => 'direktur.', 'middleware' => 'direktur'], function () {
	Route::get('/', 'Direktur\HomeController@index')->name('home');
});

Route::group(['prefix' => 'manager', 'as' => 'manager.', 'middleware' => 'manager'], function () {
	Route::get('/', 'Manager\HomeController@index')->name('home');
});

Route::group(['prefix' => 'ppic', 'as' => 'ppic.', 'middleware' => 'ppic'], function () {
	Route::get('/', 'Ppic\HomeController@index')->name('home');
});