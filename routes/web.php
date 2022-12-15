<?php

use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ExpositionController;
use App\Http\Controllers\UserController;
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

Route::get('/create', function () {
    return view('exposition.create');
})->middleware(['auth'])->name('create');

Route::resource('exposition',ExpositionController::class);
Route::post('/exposition-valide', [ExpositionController::class, 'valideOeuvre'])->name('valideOeuvre');

// USER PROFIL //
Route::get('user-profil', [UserController::class, 'profil'])->name('profil')->middleware('auth');
Route::post('upload-avatar', [UserController::class, 'upload'])->name('uploadAvatar');


// COMMENTAIRES //
Route::post('/commentaire/store', [CommentaireController::class, 'store'])->name('storeComment');
// VALIDER OU NON
Route::post('/commentaire/valide', [CommentaireController::class, 'validComment'])->name('validComment');


// LIKE OEUVRE
Route::post('/exposition-like', [ExpositionController::class, 'addLike'])->name('addLike');
