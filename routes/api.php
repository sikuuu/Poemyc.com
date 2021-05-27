<?php

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

Route::get('/users','App\Http\Controllers\APInotAuthController@llistausers');
Route::get('/buscador/{text}','App\Http\Controllers\APInotAuthController@buscador');
Route::get('/creadorshome', 'App\Http\Controllers\APInotAuthController@creadorsportada');
Route::get('/userarts/{username}', 'App\Http\Controllers\APInotAuthController@userarts');
Route::get('/userplans/{username}', 'App\Http\Controllers\APInotAuthController@userplans');
Route::get('/totaactivitat','App\Http\Controllers\APInotAuthController@totaactivitat');
