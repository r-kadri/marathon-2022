@extends('layouts.app')

@section('content')
    <div class="apropos">
        <h1>Présentation</h1>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Porro, obcaecati dolores sapiente nihil itaque eveniet laboriosam quae sint nobis, reiciendis unde cum fugit vero deserunt aliquam explicabo voluptatem rerum harum!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, reiciendis, doloremque, nesciunt consequatur tempore temporibus quisquam atque libero autem ipsam velit blanditiis nostrum veniam reprehenderit id numquam! Fugit, quod nostrum!
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur fuga voluptas numquam, tempore accusantium sit sequi cum velit distinctio et repellendus provident hic unde esse delectus, accusamus harum commodi quae!
        </p>
        <div class="choix-apropos">
            <a href="{{route('article')}}">Voir les articles</a>
            <a href="{{route('interviews')}}">Voir les interviews</a>
        </div>
    </div>
@endsection
