<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Plan;
use Carbon\Carbon ;



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
    Route::get('/planes', 'App\Http\Controllers\PlansController@index');
    Route::post('/deletearts', 'App\Http\Controllers\ProfileController@deletearts');
    Route::post('/deleteall', 'App\Http\Controllers\ProfileController@deleteall');
    Route::post('/user/{username}/', 'App\Http\Controllers\ProfileController@deleteall');
    Route::get('/suscripciones', 'App\Http\Controllers\PlansController@subs');

});

Route::get('/user/{username}','App\Http\Controllers\ProfileController@show');

//Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'home']);

Route::get('/angular-{ruta}',function(){
    return view('angular');
});

Route::get('login/ldap', 'App\Http\Controllers\socialLogin@redirectldap');
Route::get('login/ldap/callback', 'App\Http\Controllers\socialLogin@Callbackldap');

//API ROUTES

Route::get('/myarts',function(){

    return ['articles' => Auth::user()->articles()->get()->makeVisible(['text'])];
});
Route::get('/myplans',function(){

    return ['plans' => Auth::user()->plans()->get()];

});

Route::get('/suscribe/{planid}',function($planid){

    if(sizeof(Auth::user()->suscrit()->wherePivot('plan_id',$planid)->wherePivot('caducitat','>',Carbon::now())->get()) == 0){        
       Auth::user()->suscrit()->attach($planid, ['caducitat' => Carbon::now()->addMonth()]);
        return response()->json('okey');
    }

    return response()->json('yaestaba');

});

/*Route::post('/saveart',function(Request $request){
    
    return [$request];
});
*/

Route::get('/getPlansOfArt/{artid}',function($artid){
    //dd(Auth::user()->articles->find($artid)->plans);
    //dd(Auth::user()->plans);

    $plansart = Auth::user()->articles->find($artid)->plans->makeHidden('pivot');

    $userplans = Auth::user()->plans;
    $userplans = $userplans->toArray();
    $plansart=$plansart->toArray();
    //$userplans = array_diff($userplans->toArray(),$plansart->toArray());

    foreach ($userplans as $puser) {
        foreach ($plansart as $part){
            if($puser == $part){
                array_splice($userplans,array_search($puser,$userplans),1);
            }
        }
    }

    return ['plansart' => $plansart, 'plansnoart' => $userplans];
    //Auth::user()->articles->find($artid)->plans()->detach(1);

});