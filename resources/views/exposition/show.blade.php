@extends('layouts.app')
@section('content')
    <h1>Oeuvre {{ $oeuvre->nom }}</h1>
    <img src="/storage/{{ $oeuvre->media_url }}" alt="" srcset="">
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
        <h2>Commentaires</h2>
        <ul>
            @foreach ($oeuvre->commentaires as $comment)
                <li>
                    <h4>  {{ $comment->titre }} </h4>
                    {{ $comment->contenu }}
                </li>
            @endforeach
        </ul>
    </div>

    <div class="likes">
        <h2>Likes : {{ count($oeuvre->likes) }}</h2>
    </div>
@endsection