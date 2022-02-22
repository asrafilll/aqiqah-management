<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('olahan_daging', 'Api\OlahanController@getOlahanDaging')->name('api.olahan_daging');
Route::get('olahan_jeroan', 'Api\OlahanController@getOlahanJeroan')->name('api.olahan_jeroan');
Route::get('menu_pilihan', 'Api\OlahanController@getMenuPilihan')->name('api.menu_pilihan');
Route::get('nasi', 'Api\OlahanController@getNasi')->name('api.nasi');