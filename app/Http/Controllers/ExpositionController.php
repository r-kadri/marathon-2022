<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Oeuvre;
use App\Models\Salle;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ExpositionController extends Controller
{
    public function index(Request $request){
        $oeuvres = Oeuvre::all();
        $tags = Tag::all();
        $param_auteur = $request->input('auteur',null);
        $param_tag = $request->input('tag',null);
        $deplacement = $request->input('deplacement',null);
        $salle = $request->input('n_salle',1);
        if($param_auteur !== null) {
            $liste_oeuvres = [];
            foreach ($oeuvres as $oeuvre) {
                if ($oeuvre->auteur === $param_auteur) {
                    $liste_oeuvres = [$oeuvre];
                    $salle = $oeuvre->salle->id;
                }
            }
            $oeuvres=$liste_oeuvres;
        }
        if($param_tag !== null){
            $oeuvres=Oeuvre::all();
            $liste_tags=[];
            foreach ($oeuvres as $oeuvre){
                foreach ($oeuvre->tags as $tag){
                    if(strval($tag->id)=== $param_tag){
                        $liste_tags[]=$oeuvre;
                    }
                }
            }
            $oeuvres = $liste_tags;
        }
        if($deplacement !== null) {
            $salle += 1;
            $salle = ($salle % 6);
            if ($salle === 0) {
                $salle = 1;
            }
        }
        $liste_oeuvres = [];
        foreach ($oeuvres as $oeuvre) {
            if($oeuvre->salle->id===$salle){
                $liste_oeuvres[]=$oeuvre;
            }
        }
        $oeuvres=$liste_oeuvres;
        $auteurs = [];
        $salle_tmp = Salle::find($salle);
        foreach ($salle_tmp->oeuvres as $oeuvre){
            $auteurs[]=$oeuvre->auteur;
        }

        return view('exposition.index', [
            'salle'=> $salle,
            'oeuvres'=> $oeuvres,
            'auteurs' => $auteurs,
            'param_auteur' => $param_auteur,
            'param_tag' => $param_tag,
            'tags'=> $tags,
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
        return view('exposition.show', ['oeuvre' => $oeuvre, 'comments' => $comments]);
    }
}
