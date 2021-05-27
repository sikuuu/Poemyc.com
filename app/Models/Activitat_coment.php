<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Article;
use App\Models\Comentari;


class Activitat_coment extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function article(){
        return $this->belongsTo(Article::class);
    }

    public function creador(){
        return $this->belongsTo(User::class);
    }

    public function comentari(){
        return $this->belongsTo(Comentari::class);
    }
}
