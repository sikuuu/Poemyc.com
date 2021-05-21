<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Article extends Model
{
    
    protected $hidden = [
        'text',
    ];
    use HasFactory;

    public function creador() {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function comentaris() {
        return $this->hasMany(Comentari::class);
    }

    public function plans() {
        return $this->belongsToMany(Plan::class, 'articles_plans','article_id','plan_id');

    }

}
