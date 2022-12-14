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
        return view('exposition.show', ['oeuvre' => $oeuvre, 'comments' => $comments]);
    }

    public function create(){

        //$oeuvre = Oeuvre::all();

        if(Auth::user()){
            return view('oeuvre.create');

        }
        return redirect()->route('oeuvre.index');

    }

    public function store(Request $request){
        $this->validate(
            $request, [
                'nom'=>'required',
                'media_url'=>'required',
                'thumbnail_url'=>'required',
                'auteur'=>'required',
                'date_creation'=>'required',
                'description'=>'required'

            ]
        );

        $oeuvre = new Oeuvre();

        $oeuvre->nom=$request->nom;
        $oeuvre->media_url=$request->media_url;
        $oeuvre->thumbnail_url=$request->thumnnail_url;
        $oeuvre->author=$request->author;
        $oeuvre->date_creation=$request->date_creation;
        $oeuvre->description=$request->description;

        $oeuvre->save();

        return redirect()->route('exposition.index');
    }
}
