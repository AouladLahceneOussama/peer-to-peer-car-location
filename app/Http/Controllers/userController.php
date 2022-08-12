<?php

namespace App\Http\Controllers;

use App\Models\feedbackClient;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('profile',[
            'user' => $user,
            'stars_count' =>feedbackClient::where('client_id','=',$user->id)->sum('nb_stars'),
        ]);
    }
}


           


    
