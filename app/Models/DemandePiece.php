<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandePiece extends Model
{
    use HasFactory;

    protected $fillable =[
        'nom_fichier',
        'chemin_fichier',
        'demande_id',
        'piece_id',
    ];
}
