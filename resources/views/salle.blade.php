@extends('layouts.app')

@section('content')
    <h1 class="salle">Les salles</h1>
    <div class="salle-choix">
        <a class="NA" href="{{route('exposition.index',['n_salle'=>1])}}">amérique du nord</a>
        <a class="EU" href="{{route('exposition.index',['n_salle'=>2])}}">Europe</a>
        <a class="APAC" href="{{route('exposition.index',['n_salle'=>3])}}">Asie</a>
        <a class="LATAM" href="{{route('exposition.index',['n_salle'=>4])}}">Amérique du sud</a>
        <a class="MOMA" href="{{route('exposition.index',['n_salle'=>5])}}">Afrique</a>
        <a class="AUS" href="{{route('exposition.index',['n_salle'=>6])}}">Océanie</a>
        <a class="masalle" href="{{route('exposition.index',['n_salle'=>7])}}">Ma Salle</a>
    </div>
@endsection
