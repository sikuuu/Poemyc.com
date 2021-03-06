<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function index(){
        $user = User::findOrFail(Auth::id());
        return view('profile.my',['user' => $user, 'pagina' => 'perfil']);
    }

    public function deletearts(){
        $user = User::findOrFail(Auth::id());
        $user->articles()->delete();
        return redirect('/perfil');
    }

    public function deleteall(){
        $user = User::findOrFail(Auth::id());
        $user->delete();
        return redirect('/perfil');
    }

    public function show($username){
        $user = User::where('username',$username)->get();
        return view('profile.user',['user'=>$user[0],'pagina' => 'perfil']);
    }
}
