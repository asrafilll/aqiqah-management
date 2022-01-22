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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::view('test', 'test');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
	Route::get('/', 'Admin\HomeController@index')->name('home');
});

Route::group(['prefix' => 'kepala_cabang', 'as' => 'kepala_cabang.', 'middleware' => 'kepala.cabang'], function () {
	Route::get('/', 'KepalaCabang\HomeController@index')->name('home');
});

Route::group(['prefix' => 'cabang', 'as' => 'cabang.', 'middleware' => 'cabang'], function () {
	Route::get('/', 'Cabang\HomeController@index')->name('home');
});