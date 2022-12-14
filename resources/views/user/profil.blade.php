@extends('layouts.app')
@section('content')
    <h1>User profil de {{$user->name}}</h1>
    <div class="userinfo">
        <img src="/storage/{{ $user->avatar }}" alt="" srcset="">
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
                    <h4>  {{ $comment->titre }} ({{ $comment->created_at->format('D-M-Y h:m') }})</h4>
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
                    <a href="{{route('exposition.show', ['exposition' => $liked]) }}"><li> {{$liked->nom }}</li></a>
                @endforeach 
            </ul>
        @else
            <h4>Aucune oeuvre likée</h4>
        @endif
    </div>
@endsection