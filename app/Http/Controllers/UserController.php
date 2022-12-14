<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Affiche le profile d'un utilisateur
     */
    public function profil() {
        return view('user.profil');
    }
}
