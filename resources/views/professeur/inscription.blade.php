@extends('template')

@section('title', 'Inscription Professeur')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4" style="color: #190482;">Inscription Professeur</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('professeur.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Confirm Password</label>
                    <input type="text" id="password" name="password_confirmation" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="module_enseigne" class="form-label">Module enseigné</label>
                    <input type="text" class="form-control" id="module_enseigne" name="module_enseigne" required>
                </div>
                <button type="submit" class="btn btn-primary w-100" style="background-color: #7752FE;">S'inscrire</button>
            </form>
        </div>
    </div>
</div>
@endsection
