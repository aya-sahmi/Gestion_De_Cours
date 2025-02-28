@extends('template')

@section('title', 'Liste des Professeurs')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4" style="color: #190482;">Liste des Professeurs</h2>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead style="background-color: #7752FE; color: white;">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Module enseigné</th>
                    <th>Voir les cours</th>
                </tr>
            </thead>
            <tbody>
                @forelse($professeurs as $professeur)
                    <tr>
                        <td>{{ $professeur->nom }}</td>
                        <td>{{ $professeur->prenom }}</td>
                        <td>{{ $professeur->email }}</td>
                        <td>{{ $professeur->module_enseigne }}</td>
                        <td>
                            <a href="{{ route('cours.professeur', $professeur->id) }}" class="btn btn-info" style="background-color: #7752FE; border-color: #7752FE;">Voir les cours</a>
                        </td>
                    </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Aucun professeur trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
