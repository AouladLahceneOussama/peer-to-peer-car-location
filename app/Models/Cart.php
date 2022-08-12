<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'annonce_id',
        'user_id',
    ];

    public function annonce(){
        return $this->belongsTo(Annonce::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
