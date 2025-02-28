@extends('template')

@section('content')
<div class="container">
    <h1>Détails du cours</h1>
    <div class="card">
        <div class="card-header">
            <h2>{{ $cours->titre }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Description :</strong> {{ $cours->description }}</p>
            <p><strong>Catégorie :</strong> {{ $cours->categorie }}</p>
            <p><strong>Professeur :</strong> {{ $cours->professeur->nom }} {{ $cours->professeur->prenom }}</p>
            <img src="{{ asset('storage/' . $cours->image) }}" alt="Image du cours" class="img-fluid">
        </div>
        <div class="card-footer">
            <a href="{{ route('cours.index') }}" class="btn btn-primary">Retour à la liste des cours</a>
        </div>
    </div>
</div>
@endsection
