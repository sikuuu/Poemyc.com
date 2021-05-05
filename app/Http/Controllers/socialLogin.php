<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Provider;


class socialLogin extends Controller
{
    public function redirectldap(){
        return Socialite::driver('auth0')->redirect();
    }
  
    public function Callbackldap(){
        try {
      
            $user = Socialite::driver('auth0')->stateless()->user();
            //dd($user);
            $finduser = User::where('email', $user->email)->first();
                   
            if($finduser){
       
                Auth::login($finduser);
      
                return redirect('/');
       
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'username' => $user->nickname,
                    'email' => $user->email,
                    'password' => null
                ]);
      
                Auth::login($newUser);
                return redirect('/');
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
