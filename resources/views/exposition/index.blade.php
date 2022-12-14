@extends('master')

@section('title', 'Liste des oeuvres')


@section('main')

    @can('create', \App\Models\Oeuvre::class )
        <h4><a href="{{ route('exposition.create') }}">Nouvel oeuvre</a></h4>
    @endcan

    <form action="{{route('exposition.index',["n_salle"=>$salle])}}" method="get">
        <select name="auteur">
            <option value=""  selected >-- Tous nom d'auteur --</option>
            @foreach($auteurs as $auteur)
                <option value="{{$auteur}}" @if($param_auteur == $auteur) selected @endif>{{$auteur}}</option>
            @endforeach
        </select>
        <input type="submit" value="Recherche">
    </form>
    <form action="{{route('exposition.index',["n_salle"=>$salle])}}" method="get">
        <select name="tag">
            <option value=""  selected >-- Tous tag --</option>
            @foreach($tags as $tag)
                <option value="{{$tag->id}}" @if($param_tag == $tag) selected @endif>{{$tag->intitule}}</option>
            @endforeach
        </select>
        <input type="submit" value="Recherche">
    </form>
    <a href="{{ route('exposition.index',["deplacement"=>'true',"n_salle"=>$salle])}}">ce deplacer dans la salle de droite</a></br>
    <strong>salle n°</strong>{{$salle}}
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
