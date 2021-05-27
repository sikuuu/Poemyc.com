<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function likes(){
        return view('home', ['pagina' => 'favoritos']);
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

    public function articlesliked(){
        
        return ['arts' => Auth::user()->likes()->orderBy('pivot_created_at','desc')->with('creador','plans')->get()->makeVisible('text')];
    }
}
