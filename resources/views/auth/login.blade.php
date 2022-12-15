@extends('layouts.app')

@section('content')

    @include("_errors")
<div class="login-form" >
    <form action="{{route('login')}}" method="post">
        @csrf
        <div>
            <h1>Accès musée</h1>
            <div>
                Si vous n'avez pas de compte, <a href="{{route('register')}}">vous pouvez en créer un</a>.
            </div>
        </div>
        <div>
            <input type="email" name="email" id="email" placeholder="Email">
        </div>
        <div>
            <input type="password" name="password" id="pwd" placeholder="Mot de passe">
        </div>
        <div >
            <input class="button" type="submit" value="Connexion">
        </div>
    </form>
    <div>
        <a href="{{route('accueil')}}">Retour à la page principale</a>
    </div>
</div>
@endsection
