@extends('layouts.app')
@section('content')
    <h1>Oeuvre {{ $oeuvre->nom }}</h1>
    <img src="/storage/{{ $oeuvre->media_url }}" alt="" srcset="">
    <div class="likes">
        <h2>Likes : {{ count($oeuvre->likes) }}</h2>
        @auth
            @if (liked)
                <button>Enlever le like</button>
            @else
                <button>Ajouter un like</button>
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
        <h3>Ajouter un commentaire</h3>
        @auth
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
                @if ($comment->valide == 1)
                    <li>
                        <h4>  {{ $comment->titre }} (par {{ $comment->user->name }}, à {{ $comment->created_at->format('D-M-Y h:m') }})</h4>
                        {{ $comment->contenu }}
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endsection