@extends('template')

@section('title', 'À propos - Gestion de Cours en Ligne')

@section('content')
<div style="background-color: #190482; color: #C2D9FF;" class="text-center py-5">
    <div class="container">
        <h1 class="display-4">À propos de notre plateforme</h1>
        <p class="lead">Nous révolutionnons l'éducation en ligne avec des cours de qualité, accessibles à tous.</p>
    </div>
</div>
<div class="container py-5">
    <h2 class="text-center mb-4" style="color: #190482;">Notre Mission</h2>
    <p class="lead text-center" style="color: #190482;">Notre objectif est de rendre l'apprentissage accessible à tous, partout, et à tout moment. Nous proposons une plateforme où enseignants et étudiants peuvent interagir, créer et suivre des cours en toute simplicité.</p>
</div>
<div class="container py-5" style="background-color: #F8F9FA;">
    <h2 class="text-center mb-4" style="color: #190482;">Notre Vision</h2>
    <p class="lead text-center" style="color: #190482;">Nous croyons en un futur où l'éducation est démocratisée grâce aux outils numériques. En offrant une plateforme intuitive et flexible, nous visons à inspirer et soutenir les apprenants dans leur parcours éducatif.</p>
</div>
<div class="container py-5">
    <h2 class="text-center mb-4" style="color: #190482;">Notre Équipe</h2>
    <div class="row text-center">
        <div class="col-md-4">
            <img src="{{ url('images/profil.jpg') }}" class="img-fluid rounded-circle mb-3" alt="Membre de l'équipe" style="width: 150px;">
            <h4 style="color: #190482;">Sahmi Lamrani Aya</h4>
            <p>Développeur Backend, <br> Expert Laravel</p>
        </div>
        <div class="col-md-4">
            <img src="{{ url('images/profil.jpg') }}" class="img-fluid rounded-circle mb-3" alt="Membre de l'équipe" style="width: 150px;">
            <h4 style="color: #190482;">Ouadoss Wissal</h4>
            <p>Développeur Frontend, <br> Expert React</p>
        </div>
        <div class="col-md-4">
            <img src="{{ url('images/profil.jpg') }}" class="img-fluid rounded-circle mb-3" alt="Membre de l'équipe" style="width: 150px;">
            <h4 style="color: #190482;">Autre Membre</h4>
            <p>Designer UI/UX, Responsable de l'interface utilisateur</p>
        </div>
    </div>
</div>
<div class="container py-5" style="background-color: #F8F9FA;">
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
