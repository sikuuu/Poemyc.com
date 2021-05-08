<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cesta extends Model
{
    use HasFactory;

    public function usuari() {
        return $this->belongsTo(User::class);
    }

    public function lines() {
        return $this->hasMany(Cesta_line::class);
    }
}
