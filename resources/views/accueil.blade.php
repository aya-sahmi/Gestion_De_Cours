@extends('template')
<style>
    .uniform-img {
    height: 200px;
    object-fit: cover;
}

.card-body {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 150px;
}

.card-footer {
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #F8F9FA;
}

</style>

@section('title', 'Accueil - Gestion de Cours en Ligne')

@section('content')

<div style="background-color: #C2D9FF; color: #190482;" class="text-center py-5">
    <div class="container">
        <h1 class="display-4">Bienvenue sur Gestion de Cours en Ligne</h1>
        <p class="lead">Apprenez, enseignez et explorez des contenus éducatifs enrichissants.</p>
        <a href="/cours" class="btn btn-lg mt-3" style="background-color: #7752FE; color: #C2D9FF;">Voir les cours</a>
    </div>
</div>

<div class="container py-5">
    <h2 class="text-center mb-4" style="color: #190482;">Pourquoi utiliser notre plateforme ?</h2>
    <div class="row text-center">
        <div class="col-md-4">
            <i class="fas fa-chalkboard-teacher fa-3x mb-3" style="color: #7752FE;"></i>
            <h4 style="color: #190482;">Accès aux cours</h4>
            <p>Consultez une vaste bibliothèque de cours vidéo préparés par des experts.</p>
        </div>
        <div class="col-md-4">
            <i class="fas fa-user-graduate fa-3x mb-3" style="color: #8E8FFA;"></i>
            <h4 style="color: #190482;">Facilité d'utilisation</h4>
            <p>Inscrivez-vous facilement et commencez à apprendre en quelques clics.</p>
        </div>
        <div class="col-md-4">
            <i class="fas fa-video fa-3x mb-3" style="color: #C2D9FF;"></i>
            <h4 style="color: #190482;">Enseignement interactif</h4>
            <p>Créez et gérez vos cours en ligne avec des outils simples et efficaces.</p>
        </div>
    </div>
</div>

<div style="background-color: #F8F9FA;" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4" style="color: #190482;">Nos cours populaires</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($cours as $item)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top uniform-img" alt="{{ $item->titre }}">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #190482;">{{ $item->titre }}</h5>
                            <p class="card-text">{{ $item->description }}</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('cours.show', $item->id) }}" class="btn btn-primary" style="background-color: #7752FE; border-color: #7752FE;">Voir le cours</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div style="background-color: #C2D9FF;" class="py-5">
    <div class="container text-center">
        <h2 class="mb-4" style="color: #190482;">Êtes-vous un professeur ?</h2>
        <p class="mb-4" style="color: #7752FE; font-size: 1.2em;">
            Rejoignez-nous dès aujourd'hui et partagez vos connaissances avec des étudiants du monde entier.
        </p>
        <a href="{{ route('professeur.inscription') }}" class="btn btn-primary" style="background-color: #7752FE; border-color: #7752FE; padding: 10px 30px; font-size: 1.2em;">
            Inscrivez-vous comme professeur
        </a>
    </div>
</div>


<div class="container py-5">
    <h2 class="text-center mb-4" style="color: #190482;">Contactez-nous</h2>
    <form>
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="name" placeholder="Votre nom">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Votre email">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" rows="5" placeholder="Votre message"></textarea>
        </div>
        <button type="submit" class="btn btn-lg" style="background-color: #190482; color: #C2D9FF;">Envoyer</button>
    </form>
</div>
@endsection
