<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedbackClient extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_id',
        'client_id',
        'nb_stars',
        'comment',
    ];

    public function partner(){
      return $this->belongsTo(User::class,'partner_id');
    }

    public function client(){
        return $this->belongsTo(User::class,'client_id');
    }
}
