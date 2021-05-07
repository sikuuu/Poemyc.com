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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'home']);

Route::get('/angular',function(){
    View::addExtension('html','php');
    return View::make('index');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*
Route::get('login/google', 'App\Http\Controllers\socialLogin@redirectGoogle');
Route::get('login/google/callback', 'App\Http\Controllers\socialLogin@CallbackGoogle');
*/
Route::get('login/ldap', 'App\Http\Controllers\socialLogin@redirectldap');
Route::get('login/ldap/callback', 'App\Http\Controllers\socialLogin@Callbackldap');