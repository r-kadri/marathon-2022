<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Affiche le profile d'un utilisateur
     */
    public function profil() {
        return view('user.profil', ['user' => Auth::user()]);
    }

    /**
     * Modification de l'avatar d'un utilisateur
     */
    public function upload(Request $request) {
        $user = Auth::user();
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $file = $request->file('avatar');
            $nom = 'avatar';
            $now = time();
            $nom = sprintf("%s_%d.%s", $nom, $now, $file->extension());
            $file->storeAs('public/images/avatars', $nom);
            $user->avatar = 'images/avatars/'.$nom;
            $user->save();
        }
        return redirect()->route('profil');
    }

}
