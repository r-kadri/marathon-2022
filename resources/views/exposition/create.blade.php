@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{route('exposition.store')}}" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <div class="text-center" style="margin-top: 2rem">
        <h3>Création d'une oeuvre</h3>
        <hr class="mt-2 mb-2">
    </div>

    <div>
        {{-- Salle id  --}}
        <label for="salle_id"><strong>Salle_id : </strong></label>
        <input type="number" class="form-control" name="salle_id" id="salle_ic">

    </div>
    <div>
        {{-- Nom  --}}
        <label for="nom"><strong>Nom : </strong></label>
        <input type="text" class="form-control" name="nom" id="nom">

    </div>
    <div>
        {{-- Media_url --}}
        <label for="media_url"><strong>Media_url : </strong></label>
        <input type="url" class="form-control" id="media_url" name="media_url">

    </div>
    <div>
        {{-- Thumbnail_url --}}
        <label for="thumbnail_url"><strong>Thumbnail_url : </strong></label>
        <input type="url" class="form-control" id="thumbnail_url" name="thumbnail_url">

    </div>

    <div>
        {{-- Auteur --}}
        <label for="auteur"><strong>Auteur : </strong></label>
        <input type="text" class="form-control" id="auteur" name="auteur">

    </div>

    <div>
        {{-- Date de création --}}
        <label for="date_creation"><strong>Date De Création : </strong></label>
        <input type="date" class="form-control" id="date_creation" name="date_creation">

    </div>

    <div>
        {{-- Description --}}
        <label for="description"><strong>Description : </strong></label>
        <input type="text" class="form-control" id="description" name="description">

    </div>


    <div>
        <button class="btn btn-success" type="submit">Valider</button>
    </div>
</form>
<h2><a href="{{ route('exposition.index') }}">retour</a></h2>
