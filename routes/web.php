<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

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
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', 'App\Http\Controllers\ProfileController@index');
    Route::get('/articulos', 'App\Http\Controllers\ArticleController@index');
    Route::post('/deletearts', 'App\Http\Controllers\ProfileController@deletearts');
    Route::post('/deleteall', 'App\Http\Controllers\ProfileController@deleteall');
    Route::post('/user/{username}/', 'App\Http\Controllers\ProfileController@deleteall');
});

Route::get('/user/{username}','App\Http\Controllers\ProfileController@show');

//Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'home']);

Route::get('/angular-home',function(){
    return view('angular-home');
});

Route::get('/angular-articles',function(){
    return view('angular-articles');
});
Route::get('login/ldap', 'App\Http\Controllers\socialLogin@redirectldap');
Route::get('login/ldap/callback', 'App\Http\Controllers\socialLogin@Callbackldap');

//API ROUTES