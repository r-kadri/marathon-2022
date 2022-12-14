<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Oeuvre;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class ExpositionController extends Controller
{
    public function index(Request $request){
        $oeuvres = Oeuvre::all();
        $auteurs = $oeuvres->pluck('auteur');
        $param = $request->input('auteur',null);
        if($param !== null){
            //$oeuvres = $oeuvres->auteur;
            //dd($oeuvres);
        }
        return view('exposition.index', [
            'oeuvres'=> $oeuvres,
            'auteurs' => $auteurs,
            'param' => $param,
        ]);
    }

    /**
     * Afficher le détail d'une oeuvre
     */
    public function show($id, Request $request) {
        $oeuvre = Oeuvre::findOrFail($id);
        $comments = $oeuvre->commentaires->sortBy('created_at');
        if($request['sort'] === 'old') {
            $comments = $oeuvre->commentaires->sortByDesc('created_at');
        }

        if(Auth::user()) {
            $userIds = $oeuvre->likes->pluck('id')->toArray();
            if(in_array(Auth::id(), $userIds)) {
                return view('exposition.show', ['oeuvre' => $oeuvre, 'comments' => $comments, 'liked' => true]);
            }
        }

        return view('exposition.show', ['oeuvre' => $oeuvre, 'comments' => $comments, 'liked' => false]);
    }

    /**
     * Ajouter ou supprimer le like d'un utilisateur
     */
    public function addLike(Request $request) {
        $oeuvre = Oeuvre::findOrFail($request->oeuvre_id);

        if($request->like == 'add') {
            $oeuvre->likes()->attach(Auth::id());
        } else {
            $oeuvre->likes()->detach(Auth::id());
        }
        return redirect()->route('exposition.show', ['exposition' => $request->oeuvre_id]);
    }
}
