<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        //$user = User::findOrFail(Auth::id());
        return view('home', ['pagina' => 'articles']);
        //return view('articles.index',['user' => $user]);
    }
}
