<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PlansController extends Controller
{
    public function index(){
        //$user = User::findOrFail(Auth::id());
        return view('home', ['pagina' => 'plans']);
        //return view('articles.index',['user' => $user]);
    }

    public function subs(){
        $plans = Auth::user()->suscrit()->get();
        return view('plan.subs',['plans' => $plans]);
    }

    public function unsub($plaid){
        Auth::user()->suscrit()->detach($plaid);
        return $this->subs();
    }
}

