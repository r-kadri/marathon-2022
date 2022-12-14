<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Oeuvre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    /**
     * Enregistre un commentaire en base de donnée
     */
    public function store(Request $request) {
        $exposition = Oeuvre::findOrFail($request['oeuvre_id']);
        $commentaire = Commentaire::create([
            'titre' => $request['titre'],
            'contenu' => $request['contenu'],
            'user_id' => Auth::id(),
            'oeuvre_id' => $exposition->id,
            'valide' => false // NE MARCHE PAS : IL CREER UN COMMENTAIRE AVEC TRUE
        ]);
        if($commentaire->user->admin) {
            $commentaire->valide = true;
        } else {
            $commentaire->valide = false;
        }
        
        $commentaire->save();
        return redirect()->route('exposition.show', ['exposition' => $exposition]);
    }

    /**
     * Valide ou non un commentaire
     */
    public function validComment(Request $request) {
        $comment = Commentaire::findOrFail($request->comment_id);
        $oeuvre = Oeuvre::findOrFail($request->oeuvre_id);
        if($request->valide == 'yes') {
            $comment->valide = true;
            $comment->save();
        } else { $comment->delete(); }
        
        return redirect()->route('exposition.show', ['exposition' => $oeuvre]);
    }
}
