@extends('layouts.app')
@section('content')
<div class="profil">
    <h1 class="user-title">User profil de {{$user->name}}</h1>
    <div class="userinfo">
        <img width="200px" src="/storage/{{ $user->avatar }}" alt="" srcset="">
        <form action="{{ route('uploadAvatar') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label class="label-file" for="avatar">Modifier l'avatar</label><br>
            <input class="input-file" type="file" name="avatar" id="avatar">
            <button type="submit">Valider</button>
        </form><br>

        <ul>
            <li>Email : {{ $user->email }}</li>
        </ul>
    </div>

    <div class="comments">
        <h3>Commentaires</h3>
        @if (count($user->commentaires))
        <ul>
            @foreach ($user->commentaires as $comment)
            <li>
                <h4> {{ $comment->titre }} ({{ $comment->created_at->format('D-M-Y h:m') }})</h4>
                {{ $comment->contenu }}
            </li>
            @if (!$comment->valide)
            <p style="color:red">(en attente de validation)</p>
            @endif
            @endforeach
        </ul>
        @else
        <h4>Aucun commentaire</h4>
        @endif
    </div>

    <div class="liked">
        <h3>Oeuvres likées ({{count($user->likes)}})</h3>
        @if (count($user->likes))
        <ul>
            @foreach ($user->likes as $liked)
            <a href="{{route('exposition.show', ['exposition' => $liked]) }}">
                <li> {{$liked->nom }}</li>
            </a>
            @endforeach
        </ul>
        @else
        <h4>Aucune oeuvre likée</h4>
        @endif
    </div>
    <div class="monprofile">
        <a href="">Voir mes oeuvres</a>
        <a href="">Publier une nouvelle oeuvre <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);">
                <path d="M11 15h2V9h3l-4-5-4 5h3z"></path>
                <path d="M20 18H4v-7H2v7c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2v-7h-2v7z"></path>
            </svg></a>
    </div>
</div>
@endsection