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
use Illuminate\Support\Facades\Auth;

class ExpositionController extends Controller
{
    public function index(Request $request)
    {
        $oeuvres = Oeuvre::all();
        $tags = Tag::all();
        $param_auteur = $request->input('auteur', null);
        $salle_n = $request->input('n_salle', 1);
        $recherche = $request->input('recherche',null);
        $tab=["AmeriqueNord","europe","asie","AmeriqueSud","Afrique","oceanie"];
        if ($param_auteur !== null) {
            $liste_oeuvres = [];
            foreach ($oeuvres as $oeuvre) {
                if ($oeuvre->auteur === $param_auteur) {
                    $liste_oeuvres = [$oeuvre];
                    $salle_n = $oeuvre->salle->id;
                }
            }
            $oeuvres = $liste_oeuvres;
        }
        $liste_oeuvres = [];
        foreach ($oeuvres as $oeuvre) {
            if ($oeuvre->salle->id == $salle_n) {
                $liste_oeuvres[] = $oeuvre;
            }
        }

        $oeuvres = $liste_oeuvres;
        $auteurs = [];
        $salle = Salle::find($salle_n);
        foreach ($salle->oeuvres as $oeuvre) {
            $auteurs[] = $oeuvre->auteur;
        }
        $tags_lst = [];
        foreach ($salle->oeuvres as $oeuvre) {
            if($oeuvre->salle->id == $salle_n) {
                foreach ($oeuvre->tags as $tag) {
                    $est_presten = false;
                    if(count($tags_lst)==0){
                        $tags_lst [] = $tag;
                    }
                    foreach ($tags_lst as $tags_l){
                        if($tags_l->intitule == $tag->intitule){
                            $est_presten = true;
                        }
                    }
                    if(!$est_presten) {
                        $tags_lst [] = $tag;
                    }
                }
            }
        }
        $tags = $tags_lst;
        $salle_adjacentes = $salle->suivantes;
        $liste_salle_adjacentes =[];
        for($i=0;$i<count($salle_adjacentes);$i++){
            $liste_salle_adjacentes[]=$salle_adjacentes[$i]->id;
        }
        if($recherche !== null){
            $oeuvres = Oeuvre::all();
            $liste_oeuvres = [];
            foreach ($oeuvres as$oeuvre){
                foreach($oeuvre->tags as $tag){
                    if($tag->intitule == $recherche){
                        $liste_oeuvres[]=$oeuvre;
                    }
                }
            }
            if(count($liste_oeuvres)==0){
                foreach ($oeuvres as $oeuvre){
                        if($oeuvre->nom == $recherche){
                            $liste_oeuvres[]=$oeuvre;
                        }
                    }
                }
            $oeuvres = $liste_oeuvres;
        }
        return view($tab[$salle_n-1], [
            'salle'=> $salle_n,
            'liste_salle_adjacentes'=>$liste_salle_adjacentes,
            'oeuvres'=> $oeuvres,
            'auteurs' => $auteurs,
            'param_auteur' => $param_auteur,
            'tags'=> $tags,
        ]);
    }


    /**
     * Afficher le d??tail d'une oeuvre
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

    public function create(){

        //$oeuvre = Oeuvre::all();
        $salles = Salle::all();

        if(Auth::user()){
            return view('exposition.create', ['salles' => $salles]);

        }
        return redirect()->route('exposition.index', ['salles'=>$salles]);

    }

    public function store(Request $request){

        $rep = $request->input('salle',null);
        $this->validate(
            $request, [
                'salle_id'=>'required',
                'nom'=>'required',
                'media_url'=>'required',
                'thumbnail_url'=>'required',
                'auteur'=>'required',
                'date_creation'=>'required',
                'description'=>'required'

            ]
        );

        $oeuvre = new Oeuvre();


        $oeuvre->salle_id=$request->salle_id;
        $oeuvre->nom=$request->nom;
        $oeuvre->media_url=$request->media_url;
        $oeuvre->thumbnail_url=$request->thumbnail_url;
        $oeuvre->auteur=$request->auteur;
        $oeuvre->date_creation=$request->date_creation;
        $oeuvre->description=$request->description;

        if(Auth::user()->admin){
            $oeuvre->valide=true;
        }
        else {
            $oeuvre->valide=false;
        }

        $oeuvre->save();

        return redirect()->route('exposition.index');
    }

    public function valideOeuvre(Request $request){
        $oeuvre = Oeuvre::findOrFail($request->oeuvre_id);

        if($request->valide == 'yes'){
            $oeuvre->valide = true;
            $oeuvre->save();
        }
        else {
            $oeuvre->delete();
        }

        return redirect()->route('exposition.index');
    }

    /**
     * Affiche 6 oeuvres sur la page principale
     */
    public function oeuvres() {
        $oeuvres = Oeuvre::all()->take(6);
        return view('oeuvre', ['oeuvres' => $oeuvres]);
    }
}
