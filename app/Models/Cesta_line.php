<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cesta_line extends Model
{
    use HasFactory;

    public function cesta() {
        return $this->belongsTo(Cesta::class);
    }

    public function plan() {
        return $this->belongsTo(Plan::class);
    }
}
