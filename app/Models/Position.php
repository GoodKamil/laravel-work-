<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Position extends Model
{
    use HasFactory;
    protected  $table='stanowisko';
    protected $fillable=['stanowisko','chemia','halas','inne','poziom_dostepu'];

    public function User():hasMany
    {
        return $this->hasMany(User::class,'id_stanowiska','id');
    }

    public function userExists():bool{
        return $this->User()->exists();
    }
}
