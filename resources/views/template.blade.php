<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion de Cours en Ligne')</title>
    <link href="{{url('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{url('css/fontawesome.css')}}" rel="stylesheet">
    <link href="{{url('css/brands.css')}}" rel="stylesheet">
    <link href="{{url('css/solid.css')}}" rel="stylesheet">
    <style>
        :root {
            --primary-dark: #190482;
            --primary-medium: #7752FE;
            --primary-light: #8E8FFA;
            --accent-light: #C2D9FF;
        }
        .navbar {
            background-color: var(--primary-dark);
        }
        .navbar .navbar-brand {
            color: var(--accent-light);
        }
        .navbar .navbar-brand:hover {
            color: var(--primary-light);
        }
        .navbar .nav-link {
            color: var(--accent-light);
        }
        .navbar .nav-link:hover {
            color: var(--primary-light);
        }
        .navbar .nav-item.active .nav-link {
            color: var(--primary-medium);
            font-weight: bold;
        }
        .footer {
            background-color: var(--primary-dark);
            color: var(--accent-light);
            padding: 20px 0;
        }
        .footer a {
            color: var(--accent-light);
            text-decoration: none;
        }
        .footer a:hover {
            color: var(--primary-light);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Gestion de Cours</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/cours">Cours</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/professeurs">Professeurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">À propos</a>
                    </li>
                    <li class="nav-item">
                        @if (session('authentification'))
                        <form action="{{ route('professeur.logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger">Déconnexion</button>
                        </form>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        @yield('content')
    </div>

    <footer class="footer mt-auto">
        <div class="container text-center">
            <p>&copy; 2024 Gestion de Cours en Ligne. Tous droits réservés.</p>
            <p>
                <a href="#">Politique de confidentialité</a> |
                <a href="#">Conditions d'utilisation</a>
            </p>
        </div>
    </footer>

    <script src="{{url('js/jquery-3.7.1.min.js')}}"></script>
    <script src="{{url('js/bootstrap.bundle.js')}}"></script>
</body>
</html>
