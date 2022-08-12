<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annoncedispo extends Model
{
    protected $fillable=[

        'annonce_id',
        'day',
        'from',
        'to',
        'stat',
    ];
    use HasFactory;

    public function annonce(){
        return $this->belongsTo(Annonce::class);
    }

    public function demande(){
        return $this->hasOne(Demande::class);
    }

}
