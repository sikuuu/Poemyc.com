<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Article;
use App\Models\Plan;
use App\Models\Comentari;
use App\Models\Cesta;
use App\Models\Comanda;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function articles() {
        return $this->hasMany(Article::class);
    }

    public function plans() {
        return $this->hasMany(Plan::class);
    }

    public function comentaris() {
        return $this->hasMany(Comentari::class);
    }

    public function cesta() {
        return $this->hasMany(Cesta::class);
    }

    public function comanda() {
        return $this->hasMany(Comanda::class);
    }

    //N to N

    public function suscrit() {
        return $this->belongsToMany(Plan::class, 'users_plans','user_id','plan_id')->withPivot('caducitat');
    }
    
    public function likes()
    {
        return $this->belongsToMany(Article::class,'likes','user_id','article_id')->withTimestamps()->withPivot('created_at');
    }
}
