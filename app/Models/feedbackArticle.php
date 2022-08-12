<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedbackArticle extends Model
{
    protected $fillable = [
        'annonce_id',
        'user_id',
        'nb_stars',
        'comment',
    ];

    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function annonce(){
        return $this->belongsTo(Annonce::class);
    }
}
