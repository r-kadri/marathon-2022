@extends('layouts.app')
@section('content')
    <h1>Oeuvre {{ $oeuvre->nom }}</h1>
    <img src="/storage/{{ $oeuvre->media_url }}" alt="" srcset="">
    <div class="likes">
        <h2>Likes : {{ count($oeuvre->likes) }}</h2>
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
        <h2>Commentaires</h2>
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
                        <h4>  {{ $comment->titre }} ({{ $comment->created_at->format('D-M-Y h:m') }})</h4>
                        {{ $comment->contenu }}
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endsection