<?php

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
Route::get('/monprofil', function () {
    return view('monprofil');
})->name('monprofil');


Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

Route::resource('exposition', ExpositionController::class);
