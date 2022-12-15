@extends('master')

@section('title', 'Liste des oeuvres')


@section('main')

        <h4><a href="{{ route('exposition.create') }}">Nouvelle oeuvre</a></h4>


    <form action="{{route('exposition.index',["n_salle"=>$salle])}}" method="get">
        <select name="auteur">
            <option value=""  selected >-- Tous nom d'auteur --</option>
            @foreach($auteurs as $auteur)
                <option value="{{$auteur}}" @if($param_auteur == $auteur) selected @endif>{{$auteur}}</option>
            @endforeach
        </select>
        <input type="submit" value="Recherche">
    </form>
    <a href="{{ route('exposition.index',["action"=>"note"]) }}">voir les oeuvres les mieux note</a></br>
    <a href="{{ route('exposition.index',["action"=>"top"]) }}">voir les oeuvres les plus recentes</a>
        <a href="{{ route('exposition.index',["salle"=>$salle]) }}"></a></br>
    <form action="{{route('exposition.index',["n_salle"=>$salle])}}" method="get">
        <select name="tag">
            <option value=""  selected >-- Tous tag --</option>
            @foreach($tags as $tag)
                <option value="{{$tag->id}}" @if($param_tag == $tag) selected @endif>{{$tag->intitule}}</option>
            @endforeach
        </select>
        <input type="submit" value="Recherche">
    </form>
    @foreach($liste_salle_adjacentes as $page)
        <a href="{{ route('exposition.index',["deplacement"=>'true',"n_salle"=>$page])}}">allez vers la page n°{{$page}}</a></br>
    @endforeach
    <strong>salle n°</strong>{{$salle}}
    @if(!empty($oeuvres))
        <ul>
            @foreach($oeuvres as $oeuvre)
                <a href="{{ route('exposition.show', $oeuvre->id) }}"> Voir detail de l'oeuvre</a>
                <strong>name :</strong>  {{ $oeuvre->nom}}</br>
                <strong>media url : </strong> {{ $oeuvre->media_url }}</br>
                <strong>description :</strong> {{ strip_tags($oeuvre->description) }}</br>
                <strong>date de creation :</strong> {{ $oeuvre->date_creation }}</br>
                <strong>auteur :</strong> {{ $oeuvre->auteur }}</br>

                <hr>
            @endforeach
        </ul>

    @else
        <h3>aucun oeuvre</h3>
    @endif
@endsection
