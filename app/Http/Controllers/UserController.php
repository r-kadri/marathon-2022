<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Affiche le profile d'un utilisateur
     */
    public function profil() {
        return view('user.profil', ['user' => Auth::user()]);
    }
}
