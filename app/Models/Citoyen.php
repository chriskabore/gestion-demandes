<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citoyen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenoms',
        'date_naissance',
        'lieu_naissance',
        'sexe',
        'telephone',
        'cnib',
        'user_id',
    ];

    // l'utilisateur lié au citoyen
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function demandes(){
        return $this->hasMany(Demande::class);
    }
}
