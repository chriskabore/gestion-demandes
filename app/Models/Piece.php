<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    use HasFactory;

    protected $fillable = [
        'intitulé',
        'description',
    ];

    public function demandes() {
        return $this->belongsToMany(Demande::class);
    }

    public function services() {
        return $this->belongsToMany(Service::class);
    }
}
