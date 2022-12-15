@extends('layouts.app')

@section('content')

<div class="register-form">
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
            <input type="text" name="name" id="name" placeholder="Nom">
        </div>

        <!-- Email Address -->
        <div>
            <input type="email" name="email" id="email" placeholder="Email">
        </div>


        <!-- Password -->
        <div>
            <input type="password" name="password" id="pwd" placeholder="Mot de passe">
        </div>

        <!-- Confirm Password -->
        <div>
            <input type="password" name="password_confirmation" id="conf_pwd" placeholder="Confirmer Mot de passe">
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
