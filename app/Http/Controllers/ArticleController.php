<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Article;

use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class ArticleController extends Controller {

    public function index() {
        return view('home', ['pagina' => 'articles']);
    }

    public function show($username,$artid) {
        
        $art = User::where('username',$username)->get()[0]->articles()->with('creador','plans')->find($artid);
       
        function okey($art) {
            if(sizeof(Auth::user()->likes()->where('article_id',$art->id)->get()) == 0){
                $heart = 'far';
            } else {
                $heart = 'fas'; 
            }

            return view('articles.show', ['art' => $art, 'heart' => $heart]);
        }
        
        if (!is_null(Auth::user()->articles->find($art->id))) {
            
            return okey($art);
        }

        $plansart = $art->plans->makeHidden('pivot')->toArray();

        $plansuser = Auth::user()->suscrit->makeHidden('pivot')->toArray();

        foreach ($plansart as $plaart) {
            if (in_array($plaart,$plansuser)) {
                return okey($art);
            }
        }

        notify()->error('No estas suscrito a ningún plan de este artículo','No puedes ver este artículo');

        return redirect('/'); 
    }

//API####################################################################################################################

    public function myarts() {

        return ['articles' => Auth::user()->articles()->with('creador')->get()->makeVisible(['text'])];
    }

    public function createart(Request $request){
        $newart = new Article;
        $newart->user_id = Auth::id();
        $newart->name = $request->name;
        if(!($request->foto == "")){
            $newart->foto = $request->foto;
        }
        $newart->text = $request->text;
        $newart->save();

        return response()->json(['created' => 'yes']);
    }

    public function saveart(Request $request) {

        $editart = Auth::user()->articles->find($request->id);
        //dd($editart);
        $editart->name = $request->name;
        if(!($request->foto == "")){
            $editart->foto = $request->foto;
        }
        $editart->text = $request->text;
        $editart->save();

        return response()->json(['edited' => 'yes']);

    }

    public function eliminarart($id) {

        $art = Auth::user()->articles->find($id);
        $art->delete();
        return response()->json(['deleted' => 'yes']);
    }

    public function addarttoplan($idplan,$idart){
        if (sizeof(Auth::user()->articles()->find($idart)->plans()->wherePivot('plan_id',$idplan)->get()) == 0){
            Auth::user()->articles()->find($idart)->plans()->attach(Auth::user()->plans()->find($idplan)->id);
            
            return response()->json(['attached' => 'yes']);

        }
        
        return response()->json(['attached' => 'already']);
    }

    public function delartfromplan($idplan,$idart) {
        if (sizeof(Auth::user()->articles()->find($idart)->plans()->wherePivot('plan_id',$idplan)->get()) != 0){
            Auth::user()->articles()->find($idart)->plans()->detach(Auth::user()->plans()->find($idplan)->id);
            
            return response()->json(['attached' => 'yes']);

        }
        
        return response()->json(['attached' => 'already']);
    }

    public function novedadesarts() {

        $planssucrit = Auth::user()->suscrit()->get();
        $arts = [];
        foreach ($planssucrit as $pla) {
            $artsofpla = $pla->articles()->orderBy('created_at', 'desc')->with('creador','plans')->get()->makeHidden('pivot')->makeVisible('text')->toArray();
            foreach ($artsofpla as $art) {

                if (!(in_array($art,$arts))) {
                    $arts[] = $art;
                }
            }
        }
        return response()->json(['arts' => $arts]);
    }   
}