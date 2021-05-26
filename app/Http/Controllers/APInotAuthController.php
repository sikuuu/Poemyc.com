<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plan;
use App\Models\Article;

class APInotAuthController extends Controller
{
    public function buscador($text) {
          
        $articles = Article::with('creador')->where('name','like','%'.$text.'%')->orWhereHas('creador',function($q) use ($text){
            return $q->where('name','like','%'.$text.'%');
        })->orWhereHas('creador',function($q) use ($text){
            return $q->where('username','like','%'.$text.'%');
        })->get();
        $plans = Plan::with('creador')->where('name','like','%'.$text.'%')->orWhereHas('creador',function($q) use ($text){
            return $q->where('name','like','%'.$text.'%');
        })->orWhereHas('creador',function($q) use ($text){
            return $q->where('username','like','%'.$text.'%');
        })->get();
        //dd(Auth::id());
    
        return ['users'=>User::where('username','like','%'.$text.'%')->orWhere('name','like','%'.$text.'%')->get(),'articles'=>$articles,'plans'=>$plans];
    
    }

    public function llistausers() {
        return response()->json(['status'=>'ok','data'=>User::all()], 200);
    }

    public function creadorsportada(){
        return response()->json(['users' => User::withCount('articles')->having('articles_count','>',0)->inRandomOrder()->limit(6)->get()]);
    }

    public function userarts($username){
        return response()->json(['user' => User::with('articles','articles.plans')->where('username',$username)->get()[0]]);
    }

    public function userplans($username){
        return response()->json(['user' => User::with('plans')->where('username',$username)->get()[0]]);
    }


}
