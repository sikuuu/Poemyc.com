<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Article;

use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Http\Request;


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

Route::get('login/ldap', 'App\Http\Controllers\socialLogin@redirectldap');
Route::get('login/ldap/callback', 'App\Http\Controllers\socialLogin@Callbackldap');

Route::middleware(['auth','nums'])->group(function () {
    Route::get('/home', function(){return redirect('/');});
    Route::get('/angular-{ruta}',function(){return view('angular');});
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/perfil', 'App\Http\Controllers\ProfileController@index');
    Route::get('/articulos', 'App\Http\Controllers\ArticleController@index');
    Route::get('/user/{username}/articulo/{artid}','App\Http\Controllers\ArticleController@show');
    Route::get('/planes', 'App\Http\Controllers\PlansController@index');
    Route::post('/deletearts', 'App\Http\Controllers\ProfileController@deletearts');
    Route::post('/deleteall', 'App\Http\Controllers\ProfileController@deleteall');
    Route::post('/user/{username}/', 'App\Http\Controllers\ProfileController@deleteall');
    Route::get('/suscripciones', 'App\Http\Controllers\PlansController@subs');
    Route::get('/unsub/{plaid}','App\Http\Controllers\PlansController@unsub');
    Route::get('/like/{artid}','App\Http\Controllers\LikeController@like');
    Route::get('/likes','App\Http\Controllers\LikeController@likes');
    Route::get('/user/{username}','App\Http\Controllers\ProfileController@show');
});

//API ROUTES (ANGULAR) ##################################################################################################################
Route::middleware(['auth'])->group(function () {
    Route::get('/myarts','App\Http\Controllers\ArticleController@myarts');
    Route::get('/myplans','App\Http\Controllers\PlansController@myplans');
    Route::get('/suscribe/{planid}','App\Http\Controllers\PlansController@sub');
    Route::get('/getPlansOfArt/{artid}','App\Http\Controllers\PlansController@getPlansOfArt');
    Route::post('/createart','App\Http\Controllers\ArticleController@createart');
    Route::post('/saveart','App\Http\Controllers\ArticleController@saveart');
    Route::get('/eliminarart/{id}','App\Http\Controllers\ArticleController@eliminarart');
    Route::post('/createpla','App\Http\Controllers\PlansController@createpla');
    Route::post('/savepla','App\Http\Controllers\PlansController@savepla');
    Route::get('/eliminarplan/{id}','App\Http\Controllers\PlansController@eliminarpla');
    Route::get('/addartplan/{idplan}/{idart}','App\Http\Controllers\ArticleController@addarttoplan');
    Route::get('/delartplan/{idplan}/{idart}','App\Http\Controllers\ArticleController@delartfromplan');
    Route::get('/arts','App\Http\Controllers\ArticleController@novedadesarts');
    Route::get('/getliked','App\Http\Controllers\LikeController@articlesliked');
});
