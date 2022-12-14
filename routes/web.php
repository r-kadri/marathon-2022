<?php

use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ExpositionController;
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
    return view('accueil');
})->name('accueil');



Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

Route::resource('exposition',ExpositionController::class);

// COMMENTAIRES
Route::post('/commentaire/store', [CommentaireController::class, 'store'])->name('storeComment');