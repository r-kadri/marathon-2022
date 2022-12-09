@extends('layouts.app')

@section('content')

<div>
    @include("_errors")
    <form action="{{route('register')}}" method="post">
        @csrf
        <div>
            <h1>Création accès musée</h1>
            <div>
                Si vous avez déjà un compte, <a href="{{route('login')}}">connectez-vous</a>.
            </div>
        </div>
        <div>
            <label for="name">Nom</label>
            <input type="text" name="name" id="name">
        </div>

        <!-- Email Address -->
        <div>
            <label for="email">Adresse mail</label>
            <input type="email" name="email" id="email">
        </div>


        <!-- Password -->
        <div>
            <label for="pwd">Mot de passe</label>
            <input type="password" name="password" id="pwd">
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="conf_pwd">Confirmation mot de passe</label>
            <input type="password" name="password_confirmation" id="conf_pwd">
        </div>
        <div>
            <input type="submit" value="Enregistrement">
        </div>
    </form>
    <div>
        <a href="{{route('accueil')}}">Retour à la page principale</a>
    </div>
</div>

@endsection
