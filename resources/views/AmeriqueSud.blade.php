@extends('layouts.app')

@section('content')
<h1 class="title-salle">Amérique du Sud</h1>

<div class="trie">
    <form>
        <input type="searchbar" value="rechercher">
        <input type="submit" value="Recherche">
    </form>
    <form action="{{route('exposition.index',["n_salle"=>$salle])}}" method="get">
        <select name="auteur">
            <option value="" selected>-- Tous nom d'auteur --</option>
            @foreach($auteurs as $auteur)
                <option value="{{$auteur}}" @if($param_auteur==$auteur) selected @endif>{{$auteur}}</option>
            @endforeach
        </select>
        <input type="submit" value="Recherche">
    </form>
    @foreach($liste_salle_adjacentes as $page)
        <a class="switch" href="{{ route('exposition.index',["deplacement"=>'true',"n_salle"=>$page])}}">Vers page n°{{$page}}</a></br>
    @endforeach
</div>

<section id="slider">
  <input type="radio" name="slider" id="s1" checked>
  <input type="radio" name="slider" id="s2">
  <input type="radio" name="slider" id="s3">
  <input type="radio" name="slider" id="s4">
  <input type="radio" name="slider" id="s5">

  <label for="s1" class="slide" id="slide1">
    <div class="image"><img src="images/d74774ce15db8411c5dd0e30155a02f4.jpg" alt=""></div>
    <div class="descr">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus nobis fuga, vitae numquam quidem ut deserunt id expedita maiores temporibus hic deleniti porro quas aut et quia perferendis alias? Eveniet.</p>
    </div>
  </label>
  <label for="s2" class="slide" id="slide2">
  <div class="image"><img src="images/d74774ce15db8411c5dd0e30155a02f4.jpg" alt=""></div>
    <div class="descr">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus nobis fuga, vitae numquam quidem ut deserunt id expedita maiores temporibus hic deleniti porro quas aut et quia perferendis alias? Eveniet.</p>
    </div>
  </label>
  <label for="s3" class="slide" id="slide3">
  <div class="image"><img src="images/d74774ce15db8411c5dd0e30155a02f4.jpg" alt=""></div>
    <div class="descr">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus nobis fuga, vitae numquam quidem ut deserunt id expedita maiores temporibus hic deleniti porro quas aut et quia perferendis alias? Eveniet.</p>
    </div>
  </label>
  <label for="s4" class="slide" id="slide4">
  <div class="image"><img src="images/d74774ce15db8411c5dd0e30155a02f4.jpg" alt=""></div>
    <div class="descr">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus nobis fuga, vitae numquam quidem ut deserunt id expedita maiores temporibus hic deleniti porro quas aut et quia perferendis alias? Eveniet.</p>
    </div>
  </label>
  <label for="s5" class="slide" id="slide5">
  <div class="image"><img src="images/d74774ce15db8411c5dd0e30155a02f4.jpg" alt=""></div>
    <div class="descr">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus nobis fuga, vitae numquam quidem ut deserunt id expedita maiores temporibus hic deleniti porro quas aut et quia perferendis alias? Eveniet.</p>
    </div>
  </label>
</section>




@endsection
