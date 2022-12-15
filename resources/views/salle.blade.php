@extends('layouts.app')

@section('content')
    <h1 class="salle">Les salles</h1>
    <div class="salle-choix">
        <a class="NA" href="">amérique du nord</a>
        <a class="EU" href="">Europe</a>
        <a class="APAC" href="">Asie</a>
        <a class="LATAM" href="">Amérique du sud</a>
        <a class="MOMA" href="">Afrique</a>
        <a class="AUS" href="">Océanie</a>
        <a class="masalle" href="">Ma Salle</a>
        <a href="{{ route('exposition.create') }}">Nouvelle oeuvre</a>
    </div>
@endsection
