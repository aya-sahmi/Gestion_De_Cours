@extends('template')

@section('title', 'Liste des cours')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4" style="color: #190482;">Liste des cours avec leurs professeurs</h2>

    <div class="row mb-4">
        <div class="col-md-4 offset-md-4">
            <form action="{{ route('cours.index') }}" method="GET">
                <div class="form-group">
                    <label for="categorie" class="form-label">Filtrer par catégorie</label>
                    <select name="categorie" class="form-control">
                        <option value="">Toutes les catégories</option>
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie }}" {{ request('categorie') == $categorie ? 'selected' : '' }}>{{ $categorie }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Filtrer</button>
            </form>
        </div>
    </div>

    <div class="row">
        @foreach ($cours as $item)
        <div class="col-md-4 mb-4">
            <div class="card" style="width: 100%; height: 100%;">
                <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->titre }}">
                <div class="card-body">
                    <h5 class="card-title" style="color: #190482;">{{ $item->titre }}</h5>
                    <p class="card-text">{{$item->description}}</p>
                    <p><strong>Professeur : </strong>{{ $item->professeur->nom }} {{ $item->professeur->prenom }}</p>
                    <a href="{{ route('cours.show', $item->id) }}" class="btn btn-primary" style="background-color: #7752FE; border-color: #7752FE;">Voir le cours</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                {{ $cours->links('pagination::bootstrap-4', ['class' => 'pagination-sm']) }}
            </div>
        </div>
    </div>
</div>
@endsection
