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
    $plans = Plan::where('name','like','%'.$text.'%')->get();
    //dd(Auth::id());
    foreach($articles as $art) {
       /* $art['autorname'] = $art->user->name;
        $art['autorusername'] = */
        $art->creador->id;
    }

    foreach($plans as $pla) {
        /* $art['autorname'] = $art->user->name;
         $art['autorusername'] = */
         $pla->creador->id;
     }

    return ['users'=>User::where('username','like','%'.$text.'%')->orWhere('name','like','%'.$text.'%')->get(),'articles'=>$articles,'plans'=>$plans];
});

Route::get('/creadorshome', function (){
    return response()->json(['users' => User::withCount('articles')->having('articles_count','>',0)->inRandomOrder()->limit(6)->get()]);
});

Route::get('/userarts/{username}', function ($username){
    return response()->json(['articles' => User::with('articles','articles.plans')->where('username',$username)->get()[0]]);
});

Route::get('/userplans/{username}', function ($username){
    return response()->json(['plans' => User::with('plans')->where('username',$username)->get()[0]]);
});

