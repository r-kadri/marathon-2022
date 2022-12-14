@extends('master')

@section('title', 'Liste des oeuvres')


@section('main')

    @guest
        <h4><a href="{{ route('exposition.create') }}">Nouvelle oeuvre</a></h4>
    @endguest
    <form action="{{route('exposition.index')}}" method="get">
        <select name="auteur">
            <option value=""  selected >-- Tous nom d'auteur --</option>
            @foreach($auteurs as $auteur)
                <option value="{{$auteur}}" @if($param == $auteur) selected @endif>{{$auteur}}</option>
            @endforeach
        </select>
        <input type="submit" value="Recherche">
    </form>
    <a href="{{ route('exposition.index',["action"=>"note"]) }}">voir les oeuvres les mieux note</a></br>
    <a href="{{ route('exposition.index',["action"=>"top"]) }}">voir les oeuvres les plus recentes</a>
    <a href="{{ route('exposition.index',["salle"=>$salle]) }}"></a></br>
    @if(!empty($oeuvres))
        <ul>
            @foreach($oeuvres as $oeuvre)
                @if(Auth::user())
                    @foreach($list_fav as $fav)
                        @if($oeuvre->id === $fav->id )
                            est dans tes fav <a href="{{ route('exposition.index',["action"=>"supr_fav","id_o"=>$oeuvre->id]) }}">suprimer des favorie</a>
                        @else
                            <a href="{{ route('exposition.index',["action"=>"ajouter_fav","id_o"=>$oeuvre->id]) }}">ajouter au favorie</a>
                        @endif
                    @endforeach
                @endif
                <br>
                @can('createOeuvre', $oeuvre)
                    <h4><a href="{{ route('exposition.create') }}">Nouveau oeuvre</a></h4>
                @endcan
                <a href="{{ route('exposition.show', $oeuvre->id) }}"> Voir detail de l'oeuvre</a>
                <strong>name :</strong>  {{ $oeuvre->nom}}</br>
                <strong>media url : </strong> {{ $oeuvre->media_url }}</br>
                <strong>description :</strong> {{ $oeuvre->description }}</br>
                <strong>date de creation :</strong> {{ $oeuvre->date_creation }}</br>
                <strong>auteur :</strong> {{ $oeuvre->auteur }}</br>

                <hr>
            @endforeach
        </ul>

    @else
        <h3>aucun oeuvre</h3>
    @endif
@endsection
