<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Plan;

class Activitat_sub extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function creador_del_plan(){
        return $this->belongsTo(User::class,'creador_id','id');
    }

    public function plan(){
        return $this->belongsTo(Plan::class,'plan_id','id');
    }
}
