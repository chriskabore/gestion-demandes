<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'date',
        'citoyen_id',
        'service_id',
    ];

     // le service a qui correspond la demande
     public function service(){
        return $this->belongsTo(Service::class);
    }

    // le citoyen à qui appartient la demande
    public function citoyen(){
        return $this->belongsTo(Citoyen::class);
    }

    //les pieces jointes de la demande
    public function pieces() {
        return $this->belongsToMany(Piece::class);
    }
}
