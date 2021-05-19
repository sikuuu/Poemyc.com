<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
 
    public function creador() {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function suscrit() {
        return $this->belongsToMany(User::class, 'users_plans','plan_id','user_id');
    }

}
