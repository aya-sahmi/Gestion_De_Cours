@extends('template')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center" style="background-color: #190482; color: #FFFFFF;">
                    <h4>Connexion Professeur</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('professeur.veriflogin') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="email" class="form-label" style="color: #190482;">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Entrez votre email" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="password" class="form-label" style="color: #190482;">Mot de passe</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Entrez votre mot de passe" required>
                        </div>
                        <button type="submit" class="btn w-100" style="background-color: #7752FE; color: #FFFFFF; border-color: #7752FE;">Se connecter</button>
                    </form>
                </div>
                @if(session('error_login'))
                <div class="alert alert-danger mt-3 text-center">
                    {{ session('error_login') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
