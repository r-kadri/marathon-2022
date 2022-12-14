<?php

namespace App\Http\Controllers;

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
        $salle_n = $request->input('n_salle',1);
        if($param_auteur !== null) {
            $liste_oeuvres = [];
            foreach ($oeuvres as $oeuvre) {
                if ($oeuvre->auteur === $param_auteur) {
                    $liste_oeuvres = [$oeuvre];
                    $salle_n = $oeuvre->salle->id;
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
        $liste_oeuvres = [];
        foreach ($oeuvres as $oeuvre) {
            if(strval($oeuvre->salle->id) === $salle_n){
                $liste_oeuvres[]=$oeuvre;
            }
        }
        $oeuvres=$liste_oeuvres;
        $auteurs = [];
        $salle = Salle::find($salle_n);
        foreach ($salle->oeuvres as $oeuvre){
            $auteurs[]=$oeuvre->auteur;
        }
        $salle_adjacentes = $salle->suivantes;
        $liste_salle_adjacentes =[];
        for($i=0;$i<count($salle_adjacentes);$i++){
            $liste_salle_adjacentes[]=$salle_adjacentes[$i]->id;
        }
        return view('exposition.index', [
            'salle'=> $salle_n,
            'liste_salle_adjacentes'=>$liste_salle_adjacentes,
            'oeuvres'=> $oeuvres,
            'auteurs' => $auteurs,
            'param_auteur' => $param_auteur,
            'param_tag' => $param_tag,
            'tags'=> $tags,
        ]);
    }
}
