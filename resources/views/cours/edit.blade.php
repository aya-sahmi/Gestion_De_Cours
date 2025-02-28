@extends('template')

@section('content')
<div class="container">
    <h1>Modifier un cours</h1>
    <form action="{{ route('cours.update', $cours->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="titre">Titre</label>
            <input type="text" name="titre" id="titre" class="form-control" value="{{ old('titre', $cours->titre) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description', $cours->description) }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="categorie">Catégorie</label>
            <select name="categorie" class="form-control" required>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie }}"
                        {{ old('categorie', $cours->categorie) === $categorie ? 'selected' : '' }}>
                        {{ $categorie }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($cours->image)
                <p>Image actuelle :</p>
                <img src="{{ asset('storage/' . $cours->image) }}" alt="Image actuelle" class="img-thumbnail">
            @endif
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
    </form>
</div>
@endsection
