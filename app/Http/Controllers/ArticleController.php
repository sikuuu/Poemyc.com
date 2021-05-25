<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Article;

use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        //$user = User::findOrFail(Auth::id());
        return view('home', ['pagina' => 'articles']);
        //return view('articles.index',['user' => $user]);
    }

    public function show($username,$artid){
        
        $art = User::where('username',$username)->get()[0]->articles()->with('creador','plans')->find($artid);
        if(sizeof(Auth::user()->likes()->where('article_id',$artid)->get()) == 0){
            $heart ='far';
        } else {
            $heart = 'fas';
        }

        //dd($art);
        return view('articles.show', ['art' => $art, 'heart' => $heart]);
        //return view('articles.index',['user' => $user]);
    }

    public function like($artid){
        if(sizeof(Auth::user()->likes()->where('article_id',$artid)->get()) == 0){
            Auth::user()->likes()->attach($artid);
            $likes = Article::findOrFail($artid)->likes;

            return '<i class="fas fa-2x fa-heart"></i><b>'.$likes.'</b>';
        } else {
            Auth::user()->likes()->detach($artid);
            $likes = Article::findOrFail($artid)->likes;

            return '<i class="far fa-2x fa-heart"></i><b>'.$likes.'</b>';
        }
    }

    public function likes(){
        return view('home', ['pagina' => 'favoritos']);
    }
}
