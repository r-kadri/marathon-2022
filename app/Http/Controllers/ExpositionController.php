<?php

namespace App\Http\Controllers;

use App\Models\Oeuvre;
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
        $auteurs = $oeuvres->pluck('auteur');
        $param_auteur = $request->input('auteur',null);
        $param_tag = $request->input('tag',null);
        if($param_auteur !== null) {
            $liste_oeuvres = [];
            foreach ($oeuvres as $oeuvre) {
                if ($oeuvre->auteur === $param_auteur) {
                    $liste_oeuvres = [$oeuvre];
                }
            }
            $oeuvres = $liste_oeuvres;
        }
        if($param_tag !== null){
            $oeuvres=Oeuvre::all();
            $liste_tags=[];
            foreach ($oeuvres as $oeuvre){
                foreach ($oeuvre->tags as $tag){
                    if(strval($tag->id)=== $param_tag){
                        $liste_tags=[$oeuvre];
                    }
                }
            }
            $oeuvres = $liste_tags;
        }
        return view('exposition.index', [
            'oeuvres'=> $oeuvres,
            'auteurs' => $auteurs,
            'param_auteur' => $param_auteur,
            'param_tag' => $param_tag,
            'tags'=> $tags,
        ]);
    }
}
