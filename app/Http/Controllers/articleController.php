<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\feedbackArticle;

class articleController extends Controller
{
    public function index()
    {
        return view('articles.index');
    }
    
    public function show($id)
    {
        $annonce = Annonce::findOrFail($id);
        $reviews = feedbackArticle::where('annonce_id', $annonce->id)->get();

        $stars1 = feedbackArticle::where([
            ['nb_stars', 1],
            ['annonce_id', $annonce->id],
        ])->get();
        $stars2 = feedbackArticle::where([
            ['nb_stars', 2],
            ['annonce_id', $annonce->id],
        ])->get();
        $stars3 = feedbackArticle::where([
            ['nb_stars', 3],
            ['annonce_id', $annonce->id],
        ])->get();
        $stars4 = feedbackArticle::where([
            ['nb_stars', 4],
            ['annonce_id', $annonce->id],
        ])->get();
        $stars5 = feedbackArticle::where([
            ['nb_stars', 5],
            ['annonce_id', $annonce->id],
        ])->get();

        $comments = feedbackArticle::where('annonce_id', $annonce->id)->get();
        $reviews->count() == 0 ? $reviewCount = 1 : $reviewCount = $reviews->count();
        return view('articles.show', [
            'annonce' => $annonce,
            'reviewsCount' => $reviews->count(),
            'comments' => $comments,
            'stars1' => round($stars1->count()/$reviewCount * 100),
            'stars2' => round($stars2->count()/$reviewCount * 100),
            'stars3' => round($stars3->count()/$reviewCount * 100),
            'stars4' => round($stars4->count()/$reviewCount * 100),
            'stars5' => round($stars5->count()/$reviewCount * 100),
        ]);
    }

}
