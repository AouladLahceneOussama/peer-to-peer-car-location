<?php

use App\Http\Controllers\articleController;
use App\Http\Controllers\userController;
use App\Http\Controllers\feedbackController;
use App\Http\Controllers\partnerController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(["middleware" => "auth"], function () {

    Route::get('articles', [articleController::class, 'index'])->name('articles');

    Route::get('article/{id}', [articleController::class, 'show']);

    Route::post('article/add', [articleController::class, 'store']);

    Route::get('/partner', [partnerController::class, 'index'])->name('partner');

    Route::get('/addAnnonce', [partnerController::class, 'create'])->name('addAnnonce');

    Route::post('/addAnnonce/add', [partnerController::class, 'store']);

    Route::get('/profile/{id}', [userController::class, 'show']);

    Route::get('/feedback/{demande_id}/{id}', [feedbackController::class, 'create']);

    Route::post('/feedback/add', [feedbackController::class, 'store']);

    Route::get('/dashboard', function () {
        return view('articles/index');
    });
});
