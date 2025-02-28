@extends('template')

@section('title', 'Cours du Professeur')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4" style="color: #190482;">Cours enseignés par {{ $professeur->nom }} {{ $professeur->prenom }}</h2>

    <div class="card mb-4">
        <div class="card-body">
            <h4 class="card-title" style="color: #7752FE;">Informations sur le professeur</h4>
            <p><strong>Nom : </strong>{{ $professeur->nom }}</p>
            <p><strong>Prénom : </strong>{{ $professeur->prenom }}</p>
            <p><strong>Module enseigné : </strong>{{ $professeur->module_enseigne }}</p>
        </div>
    </div>

    @if ($cours->count() > 0)
        <div class="row">
            @foreach ($cours as $item)
            <div class="col-md-4 mb-4">
                <div class="card" style="min-height: 350px;">
                    <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->titre }}" style="max-height: 150px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title" style="color: #190482;">{{ $item->titre }}</h5>
                        <p class="card-text">{{$item->description}}</p>
                        <a href="{{ route('cours.show', $item->id) }}" class="btn btn-primary mt-auto" style="background-color: #7752FE; border-color: #7752FE;">Voir le cours</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-12">
                {{ $cours->links() }}
            </div>
        </div>
    @else
        <div class="alert alert-info mt-4">
            Ce professeur n'enseigne aucun cours pour le moment.
        </div>
    @endif
</div>
@endsection
