<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Plan;
use App\Models\Article;

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
    dd(Auth::id());
    return $request->user();
});

Route::get('/users',function () {
    
    return response()->json(['status'=>'ok','data'=>User::all()], 200);
});

Route::get('/buscador/{text}',function ($text) {
    $putamadre = Article::where('name','like','%'.$text.'%')->get();
    return $putamadre->toJson();
    //return response()->json(['status'=>'ok','users'=>User::where('username','like','%'.$text.'%')->orWhere('name','like','%'.$text.'%')->get(),'articles'=>Article::where('name','like','%'.$text.'%'),'plans'=>Plan::where('name','like','%'.$text.'%')->get()], 200);
});
