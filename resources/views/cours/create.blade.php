@extends('template')
@section('content')
<div class="container">
    <h2>Ajouter un Cours</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('cours.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="professeur_id" value="{{ session('professeur_id') }}">
        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" name="titre" id="titre" class="form-control"  required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="categorie" class="form-label">Catégorie</label>
            <select name="categorie" id="categorie" class="form-select" required>
                <option value="" disabled selected>Choisissez une catégorie</option>
                @foreach([
                    'Mathématiques', 'Physique', 'Informatique', 'Chimie', 'Biologie',
                    'Économie', 'Philosophie', 'Histoire', 'Géographie', 'Français',
                    'Anglais', 'Espagnol', 'Arabe', 'Gestion', 'Marketing',
                    'Finance', 'Science Politique', 'Droit', 'Programmation',
                    'Bases de Données', 'Réseaux', 'Sécurité Informatique',
                    'Algorithmes', 'Statistiques', 'Gestion de Projet',
                    'Analyse des Données', 'Systèmes Distribués', 'Cloud Computing',
                    'Intelligence Artificielle', 'Machine Learning',
                    'Développement Web', 'Développement Mobile',
                    'Sécurité des Systèmes'
                ] as $categorie)
                    <option value="{{ $categorie }}">{{ $categorie }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
