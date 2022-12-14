<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Oeuvre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    public function store(Request $request) {
        $exposition = Oeuvre::findOrFail($request['oeuvre_id']);
        Commentaire::create([
            'titre' => $request['titre'],
            'contenu' => $request['contenu'],
            'user_id' => Auth::id(),
            'oeuvre_id' => $exposition->id,
            'valide' => false // NE MARCHE PAS : IL CREER UN COMMENTAIRE AVEC TRUE
        ]);
        return redirect()->route('exposition.show', ['exposition' => $exposition]);
    }
}
