@extends('layouts.app')

@section('content')
    <div class="article">
        <h1>Article</h1>
        <a href="{{route('CultureNum')}}">Article de Culture'Num'</a>
        <a href="{{route('LART')}}">Article de L.ART</a>
        <a href="{{route('edito')}}">EDITO Fondateur</a>
    </div>
@endsection
