<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkingTime extends Model
{
    use HasFactory;
    protected $fillable=['id_pracownika','dzien','godziny','opis'];
    protected $table='czas_pracy';

    public function User():belongsTo
    {
        return $this->belongsTo(User::class,'id_pracownika','id');
    }
}
