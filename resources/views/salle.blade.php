@extends('layouts.app')

@section('content')
    <h1 class="salle">Les salles</h1>
    <div class="salle-choix">
        <a class="NA" href="{{route('AmeriqueNord')}}">amérique du nord</a>
        <a class="EU" href="{{route('europe')}}">Europe</a>
        <a class="APAC" href="{{route('asie')}}">Asie</a>
        <a class="LATAM" href="{{route('AmeriqueSud')}}">Amérique du sud</a>
        <a class="MOMA" href="{{route('Afrique')}}">Afrique</a>
        <a class="AUS" href="{{route('oceanie')}}">Océanie</a>
        <a class="masalle" href="{{route('AmeriqueNord')}}">Ma Salle</a>
    </div>
@endsection