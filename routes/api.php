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
    //$putamadre = Article::where('name','like','%'.$text.'%')->get();
    //return $putamadre->toJson();
    $articles = Article::where('name','like','%'.$text.'%')->get();

    
    $i = 0;
    foreach($articles as $art) {
       /* $art['autorname'] = $art->user->name;
        $art['autorusername'] = */
        $art->user->username;


    }

    return ['users'=>User::where('username','like','%'.$text.'%')->orWhere('name','like','%'.$text.'%')->get(),'articles'=>$articles,'plans'=>Plan::where('name','like','%'.$text.'%')->get()];
});
Route::get('/joder/{text}',function ($text) {
    $putamadre = Article::all()[0];

    
    return $putamadre->puta();
    //return ['users'=>User::where('username','like','%'.$text.'%')->orWhere('name','like','%'.$text.'%')->get(),'articles'=>Article::where('name','like','%'.$text.'%')->get(),'plans'=>Plan::where('name','like','%'.$text.'%')->get()];
});