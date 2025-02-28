@extends('template')

@section('title', 'Mes Cours')

@section('content')
<div class="container mt-5">
    <h2 class="text-center" style="color: #190482;">Mes Cours</h2>
    @if (session('authentification'))
    <div class="row mb-3">
        <a href="{{route('cours.create')}}" class="btn btn-primary mb-3">Ajouter un Cours</a>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <p class="text-center">Voici la liste des cours que vous enseignez.</p>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-primary" style="background-color: #7752FE; color: #FFFFFF;">
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Catégorie</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cours as $cour)
                    <tr >
                        <td>{{ $cour->titre}}</td>
                        <td>{{ $cour->description }}</td>
                        <td>{{ $cour->categorie }}</td>
                        <td>
                            <a  href="{{ route('cours.edit', $cour->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                            <br>
                            <form action="{{ route('cours.destroy', $cour->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cours ?');">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Vous n'enseignez actuellement aucun cours.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $cours->links() }}
    </div>
@else
    <div class="alert alert-danger text-center">
        Vous devez être connecté en tant que professeur pour voir vos cours.
    </div>
    <div class="text-center">
        <a href="{{ route('professeur.login') }}" class="btn btn-primary" style="background-color: #7752FE;">Se connecter</a>
    </div>
@endif

</div>
@endsection
