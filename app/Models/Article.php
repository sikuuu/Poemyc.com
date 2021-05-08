<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function creador() {
        return $this->belongsTo(User::class);
    }

    public function comentaris() {
        return $this->hasMany(Comentari::class);
    }
}
