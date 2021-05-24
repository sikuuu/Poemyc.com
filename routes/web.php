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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', 'App\Http\Controllers\ProfileController@index');
    Route::get('/articulos', 'App\Http\Controllers\ArticleController@index');
    Route::get('/user/{username}/articulo/{artid}', 'App\Http\Controllers\ArticleController@show');
    Route::get('/planes', 'App\Http\Controllers\PlansController@index');
    Route::post('/deletearts', 'App\Http\Controllers\ProfileController@deletearts');
    Route::post('/deleteall', 'App\Http\Controllers\ProfileController@deleteall');
    Route::post('/user/{username}/', 'App\Http\Controllers\ProfileController@deleteall');
    Route::get('/suscripciones', 'App\Http\Controllers\PlansController@subs');
    Route::get('/unsub/{plaid}','App\Http\Controllers\PlansController@unsub');
    Route::get('like/{artid}','App\Http\Controllers\ArticleController@like');

});

Route::get('/user/{username}','App\Http\Controllers\ProfileController@show');

//Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'home']);

Route::get('/angular-{ruta}',function(){
    return view('angular');
});

Route::get('login/ldap', 'App\Http\Controllers\socialLogin@redirectldap');
Route::get('login/ldap/callback', 'App\Http\Controllers\socialLogin@Callbackldap');

//API ROUTES ##################################################################################################################
Route::middleware(['auth'])->group(function () {

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

        $plansarto = Auth::user()->articles->find($artid)->plans->makeHidden('pivot');

        $userplanso = Auth::user()->plans;
        $userplans = $userplanso->toArray();
        $plansart=$plansarto->toArray();
        //$userplans = array_diff($userplans->toArray(),$plansart->toArray());

        foreach ($userplans as $puser) {
            foreach ($plansart as $part){
                if($puser == $part){
                    unset($userplans[array_search($part,$userplans)]);
                    
                }
            }
        }
        $userplans = array_values($userplans);
    return ['plansart' => $plansart, 'plansnoart' => $userplans/*,'p2' => $plansarto,'u2' => $userplanso*/];
        //Auth::user()->articles->find($artid)->plans()->detach(1);

    });

    Route::post('/createart',function(Request $request){
        $newart = new Article;
        $newart->user_id = Auth::id();
        $newart->name = $request->name;
        if(!($request->foto == "")){
            $newart->foto = $request->foto;
        }
        $newart->text = $request->text;
        $newart->save();

        return response()->json(['created' => 'yes']);

        
    });

    Route::post('/saveart',function(Request $request){

        
        $editart = Auth::user()->articles->find($request->id);
        //dd($editart);
        $editart->name = $request->name;
        if(!($request->foto == "")){
            $editart->foto = $request->foto;
        }
        $editart->text = $request->text;
        $editart->save();

        return response()->json(['edited' => 'yes']);

        
    });

    Route::get('/eliminarart/{id}',function($id){

        
        $art = Auth::user()->articles->find($id);
        $art->delete();
        return response()->json(['deleted' => 'yes']);
    });
 
    Route::post('/createpla',function(Request $request){
        $newpla = new Plan;
        $newpla->user_id = Auth::id();
        $newpla->name = $request->name;
        $newpla->preu = $request->preu;
        if(!($request->foto == "")){
            $newpla->foto = $request->foto;
        }
        $newpla->text = $request->text;
        $newpla->save();

        return response()->json(['created' => 'yes']);

        
    });

    Route::post('/savepla',function(Request $request){

        
        $editpla = Auth::user()->plans->find($request->id);
        //dd($editpla);
        $editpla->name = $request->name;
        $editpla->preu = $request->preu;

        if(!($request->foto == "")){
            $editpla->foto = $request->foto;
        }
        $editpla->text = $request->text;
        $editpla->save();

        return response()->json(['edited' => 'yes']);

        
    });

    Route::get('/eliminarplan/{id}',function($id){

        $pla = Auth::user()->plans->find($id);
        $pla->delete();
        return response()->json(['deleted' => 'yes']);
    });

    Route::get('/addartplan/{idplan}/{idart}',function($idplan,$idart){
        if (sizeof(Auth::user()->articles()->find($idart)->plans()->wherePivot('plan_id',$idplan)->get()) == 0){
            Auth::user()->articles()->find($idart)->plans()->attach(Auth::user()->plans()->find($idplan)->id);//->find($idart)->plans()->attach($idplan);
            
            return response()->json(['attached' => 'yes']);

        }
        
        return response()->json(['attached' => 'already']);
    });

    Route::get('/delartplan/{idplan}/{idart}',function($idplan,$idart){
        if (sizeof(Auth::user()->articles()->find($idart)->plans()->wherePivot('plan_id',$idplan)->get()) != 0){
            Auth::user()->articles()->find($idart)->plans()->detach(Auth::user()->plans()->find($idplan)->id);//->find($idart)->plans()->attach($idplan);
            
            return response()->json(['attached' => 'yes']);

        }
        
        return response()->json(['attached' => 'already']);
    });

    Route::get('/arts', function(){

        $planssucrit = Auth::user()->suscrit()->get();
        $arts = [];
        foreach ($planssucrit as $pla){
            //dd($pla->articles()->orderBy('created_at', 'desc')->get());
            $artsofpla = $pla->articles()->orderBy('created_at', 'desc')->with('creador','plans')->get()->makeHidden('pivot')->makeVisible('text')->toArray();
            foreach ($artsofpla as $art) {

                if (!(in_array($art,$arts))) {
                    $arts[] = $art;

                }
            }
        }
        //dd($planssucrit);
        return response()->json(['arts' => $arts]);

    });
});
