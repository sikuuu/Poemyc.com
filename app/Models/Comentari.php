<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentari extends Model
{
    use HasFactory;

    public function creador() {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function article() {
        return $this->belongsTo(Article::class);
    }
}
