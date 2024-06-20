<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'intitulé',
        'frais_dossier',
         'description',
     ];

     public function demandes(){
        return $this->hasMany(Demande::class);
    }

    public function pieces() {
        return $this->belongsToMany(Piece::class);
    }

}
