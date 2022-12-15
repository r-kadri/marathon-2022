@extends('master')

@section('title', 'Liste des oeuvres')


@section('main')

<h4><a href="{{ route('exposition.create') }}">Nouvelle oeuvre</a></h4>
<form action="{{route('exposition.index',["n_salle"=>$salle])}}" method="get">
    <select name="auteur">
        <option value="" selected>-- Tous nom d'auteur --</option>
        @foreach($auteurs as $auteur)
        <option value="{{$auteur}}" @if($param_auteur==$auteur) selected @endif>{{$auteur}}</option>
        @endforeach
    </select>
    <input type="submit" value="Recherche">
</form>
<a href="{{ route('exposition.index',["action"=>"top"]) }}">voir les oeuvres les plus recentes</a>
<a href="{{ route('exposition.index',["salle"=>$salle]) }}"></a></br>
<form action="{{route('exposition.index',["n_salle"=>$salle])}}" method="get">
    <select name="tag">
        <option value="" selected>-- Tous tag --</option>
        @foreach($tags as $tag)
        <option value="{{$tag->id}}" @if($param_tag==$tag) selected @endif>{{$tag->intitule}}</option>
        @endforeach
    </select>
    <input type="submit" value="Recherche">
</form>
@foreach($liste_salle_adjacentes as $page)
<a href="{{ route('exposition.index',["deplacement"=>'true',"n_salle"=>$page])}}">allez vers la page n°{{$page}}</a></br>
@endforeach
<strong>salle n°</strong>{{$salle}}


<!-- OEUVRES A VALIDER PAR UN ADMIN -->
@if (Auth::user()->admin)
<h3>Oeuvres en attente de validation</h3>
<ul>
    @foreach ($oeuvres as $oeuvre)
    @if (!$oeuvre->valide)
    <section id="slider">
        <label for="s1" class="slide" id="slide1">
            <a href="{{ route('exposition.show', $oeuvre->id) }}"> Voir detail de l'oeuvre</a>
            <div class="image"><img src="{{ $oeuvre->media_url }}" alt=""></div>
            <div class="descr">
                <p>{{ $oeuvre->description }}</p>
            </div>
        </label>
    </section>

    <form action="{{ route('valideOeuvre') }}" method="post">
        @csrf
        <input type="hidden" name="oeuvre_id" value="{{ $oeuvre->id}}">
        <button name="valide" value="yes" type="submit" style="color: red">Valider l'oeuvre</button>
        <button name="valide" value="no" type="submit" style="color: red">Refuser l'oeuvre</button>
    </form>
    @endif
    @endforeach
</ul>
@endif


@if(!empty($oeuvres))
<h3>Liste des oeuvres</h3>
<ul>
    @foreach($oeuvres as $oeuvre)
    @if ($oeuvre->valide)
    <a href="{{ route('exposition.show', $oeuvre->id) }}"> Voir detail de l'oeuvre</a>
    <strong>name :</strong> {{ $oeuvre->nom}}</br>
    <strong>media url : </strong> {{ $oeuvre->media_url }}</br>
    <strong>description :</strong> {{ strip_tags($oeuvre->description) }}</br>
    <strong>date de creation :</strong> {{ $oeuvre->date_creation }}</br>
    <strong>auteur :</strong> {{ $oeuvre->auteur }}</br>
    <hr>
    @endif

    @endforeach
</ul>

@else
<h3>aucun oeuvre</h3>
@endif
@endsection