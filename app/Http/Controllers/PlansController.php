<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Plan;
use Carbon\Carbon;

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


//API ##################################################################

    public function myplans(){

        return ['plans' => Auth::user()->plans()->get()];

    }

    public function sub($planid){

        if(sizeof(Auth::user()->suscrit()->wherePivot('plan_id',$planid)->wherePivot('caducitat','>',Carbon::now())->get()) == 0){        
        Auth::user()->suscrit()->attach($planid, ['caducitat' => Carbon::now()->addMonth()]);
            return response()->json('okey');
        }

        return response()->json('yaestaba');
    }

    public function getPlansOfArt($artid) {
        
        $plansarto = Auth::user()->articles->find($artid)->plans->makeHidden('pivot');

        $userplanso = Auth::user()->plans;
        $userplans = $userplanso->toArray();
        $plansart=$plansarto->toArray();

        foreach ($userplans as $puser) {
            foreach ($plansart as $part){
                if($puser == $part){
                    unset($userplans[array_search($part,$userplans)]); 
                }
            }
        }
        $userplans = array_values($userplans);
        return ['plansart' => $plansart, 'plansnoart' => $userplans];
    
    }

    public function createpla(Request $request){
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
    }

    public function savepla(Request $request){

        $editpla = Auth::user()->plans->find($request->id);
        $editpla->name = $request->name;
        $editpla->preu = $request->preu;

        if(!($request->foto == "")){
            $editpla->foto = $request->foto;
        }
        $editpla->text = $request->text;
        $editpla->save();

        return response()->json(['edited' => 'yes']);
    }

    public function eliminarpla($id){

        $pla = Auth::user()->plans->find($id);
        $pla->delete();
        return response()->json(['deleted' => 'yes']);
    }
}

