@extends('layouts.app')
@section('content')
    <h1>Oeuvre {{ $oeuvre->nom }}</h1>
    <img src="/storage/{{ $oeuvre->media_url }}" alt="" srcset="">
    <div class="likes">
        <h2>Likes : {{ count($oeuvre->likes) }}</h2>

        <!-- LIKER OU PAS UNE OEUVRE -->
        @auth
            @if ($liked)
                <form action="{{ route('addLike') }}" method="post">
                    @csrf
                    <input name="oeuvre_id" type="hidden" value="{{$oeuvre->id}}">
                    <input name="like" type="hidden" value="remove">
                    <button type="submit">Retirer le like</button>
                </form>
            @else
                <form action="{{ route('addLike') }}" method="post">
                    @csrf
                    <input name="like" type="hidden" value="add">
                    <input name="oeuvre_id" type="hidden" value="{{$oeuvre->id}}">
                    <button type="submit">Liker l'oeuvre</button>
                </form>
            @endif
        @endauth


    </div>
    <div class="auteurs">
        <p>Auteur : {{ $oeuvre->auteur }}</p>        
    </div>
    <div class="tags">
        <h2>Tags :</h2>
        <ul>
            @foreach ($oeuvre->tags as $tag)
                <li> {{ $tag->intitule }}</li>
            @endforeach
        </ul>
    </div>

    <div class="comments">
        @auth
            <h3>Ajouter un commentaire</h3>
            <form action="{{ route('storeComment') }}" method="post">
                @csrf
                <input type="hidden" name="oeuvre_id" value="{{$oeuvre->id}}">
                <label for="titre">Titre</label>
                <input type="text" name="titre" id="titre"><br><br>
                <label for="contenu">Commentaire</label><br>
                <textarea name="contenu" id="contenu" cols="30" rows="10" width="100"></textarea>
                <button type="submit">Ajouter</button>
            </form><br><br><br>
        @endauth        

        <h3>Commentaires</h3>
        <form action="" method="GET">
            <select name="sort" id="">
                <option value="new" selected>Plus récents</option>
                <option value="old">Plus anciens</option>
            </select>
            <button type="submit">trier</button>
        </form>
        <ul>
            @foreach ($comments as $comment)
                @if ($comment->valide)
                    <li>
                        <h4>  {{ $comment->titre }} (par {{ $comment->user->name }}, à {{ $comment->created_at->format('D-M-Y h:m') }})</h4>
                        {{ $comment->contenu }}
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endsection