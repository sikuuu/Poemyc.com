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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'home']);

Route::get('/angular',function(){
   //dd(Auth::id());
    return view('angular');
});


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*
Route::get('login/google', 'App\Http\Controllers\socialLogin@redirectGoogle');
Route::get('login/google/callback', 'App\Http\Controllers\socialLogin@CallbackGoogle');
*/
Route::get('login/ldap', 'App\Http\Controllers\socialLogin@redirectldap');
Route::get('login/ldap/callback', 'App\Http\Controllers\socialLogin@Callbackldap');

//API ROUTES

Route::get('/users',function () {
    
    return response()->json(['status'=>'ok','data'=>User::all()], 200);
});