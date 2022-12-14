<?php

namespace App\Http\Controllers;

use App\Models\Oeuvre;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

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
}
