<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/scss/app.scss','resources/css/app.css','resources/js/app.js'])
</head>

<body>
@if ($errors->any())
    <div class="errors">
        <h3 class="titre-erreurs">Liste des erreurs</h3>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div>
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

</body>
</html>
