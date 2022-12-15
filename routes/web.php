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

Route::get('/salle', function () {
    return view('salle');
})->name('salle');

Route::get('/oeuvre', function () {
    return view('oeuvre');
})->name('oeuvre');

Route::get('/apropos', function () {
    return view('apropos');
})->name('apropos');

Route::get('/article', function () {
    return view('article');
})->name('article');

Route::get('/CultureNum', function () {
    return view('CultureNum');
})->name('CultureNum');
Route::get('/LART', function () {
    return view('LART');
})->name('LART');
Route::get('/edito', function () {
    return view('edito');
})->name('edito');
Route::get('/interviews', function () {
    return view('interviews');
})->name('interviews');
Route::get('/AmeriqueNord', function () {
    return view('AmeriqueNord',['n_salle'=>1]);
})->name('AmeriqueNord');
Route::get('/Afrique', function () {
    return view('Afrique');
})->name('Afrique');
Route::get('/AmeriqueSud', function () {
    return view('AmeriqueSud');
})->name('AmeriqueSud');
Route::get('/europe', function () {
    return view('europe');
})->name('europe');
Route::get('/asie', function () {
    return view('asie');
})->name('asie');
Route::get('/oceanie', function () {
    return view('oceanie');
})->name('oceanie');
Route::get('/masalle', function () {
    return view('masalle');
})->name('masalle');



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
