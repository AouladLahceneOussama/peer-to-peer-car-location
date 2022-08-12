<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [
        'annoncedispo_id',
        'user_id',
        'reservation_date',
        'reservation_day',
        'state',
        'feedbackClient',
        'feedbackArticle',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function annonce(){
        return $this->belongsTo(Annonce::class);
    }
    public function annoncedispo(){
        return $this->belongsTo(Annoncedispo::class);
    }
    public function notification(){
        return $this->hasOne(Notification::class);
    }

}
