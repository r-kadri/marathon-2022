@extends('layouts.app')
@section('content')
    <div class="monprofile">
        <h1>Profil de {{$user->name}}</h1>
        <div class="userinfo">
            <ul>
                <li>Email : {{ $user->email }}</li>
            </ul>
            <img width="200px" src="{{asset('/storage/'.$user->avatar)}}" alt="" srcset="">
            <form action="{{ route('uploadAvatar') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="avatar">Modifier l'avatar</label><br>
                <input type="file" name="avatar" id="avatar">
                <button type="submit">Valider</button>
            </form><br>
    
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

    </div>
@endsection
