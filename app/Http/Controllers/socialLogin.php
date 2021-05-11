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
            //dd($user->user['picture']);
            $finduser = User::where('email', $user->email)->first();
            
            if (isset($user->user['picture'])){
                //dd('hola');
                $avatar = $user->user['picture'];
            } else{
                dd('gay');
                $avatar = 'https://poemyc.com/imgs/default.png';

            }
            if($finduser){
       
                Auth::login($finduser);

                $finduser->name = $user->name;
                $finduser->avatar = $avatar;
                $finduser->save();
      
                return redirect('/');
       
            }else{
                
                $newUser = User::create([
                    'name' => $user->name,
                    'username' => $user->nickname,
                    'email' => $user->email,
                    'password' => null,
               ]);

      
                Auth::login($newUser);
                $newUser->avatar = $avatar;
                $newUser->save();
                return redirect('/');
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
