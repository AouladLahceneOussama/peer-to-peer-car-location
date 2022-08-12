<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'car_model',
        'city',
        'color',
        'price',
        'stat',
        'premium',
        'premium_duration',
        'image1',
        'image2',
        'image3',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function demande()
    {
        return $this->hasMany(Demande::class);
    }


    public function feedbackArticle()
    {
        return $this->hasMany(feedbackArticle::class);
    }



    public function annoncedispo()
    {
        return $this->hasMany(Annoncedispo::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}
