<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="<?php echo asset('css/style.css') ?>" type="text/css">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chau+Philomene+One&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/scss/app.scss','resources/css/app.css','resources/js/app.js'])
</head>

<body>
    <nav class="nav-menu">
        <ul>
            @guest
            <li class="rose"><a href="#">Les salles</a></li>
            <li class="jaune"><a href="#">Les Oeuvres</a></li>
            <li class="bleu-clair"><a href="#">à propos</a></li>
            <li class="bleu-fonce"><a href="{{route ('login')}}">Se connecter</a></li>
            @else
            <li class="bjr"> Bonjour {{ Auth::user()->name }}</li> @if (Auth::user())
            <li class="rose"><a href="#">Les salles</a></li>
            <li class="jaune"><a href="#">Les Oeuvres</a></li>
            <li class="bleu-clair"><a href="#">à propos</a></li>
            <li class="bleu-fonce"><a href="#">Mon profil</a></li>
            @endif
            <li class="vert"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.
          getElementById('logout-form').submit();">
                    Logout
                </a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> {{ csrf_field() }}
            </form>
            @endguest
        </ul>
    </nav>



    @yield('content')

</body>

</html>