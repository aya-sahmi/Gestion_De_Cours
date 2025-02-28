<?php

namespace App\Http\Controllers;


use App\Models\Cours;
use App\Models\Professeur;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    public function accueil(){
        $cours = Cours::take(3)->get();
        return view('accueil', compact('cours'));
    }

    public function index(Request $request){
        $categories = [
            'Mathématiques', 'Physique', 'Informatique', 'Chimie', 'Biologie', 'Économie', 'Philosophie', 'Histoire', 
            'Géographie', 'Français', 'Anglais', 'Espagnol', 'Arabe', 'Gestion', 'Marketing', 'Finance', 
            'Science Politique', 'Droit', 'Programmation', 'Bases de Données', 'Réseaux', 'Sécurité Informatique', 
            'Algorithmes', 'Statistiques', 'Gestion de Projet', 'Analyse des Données', 'Systèmes Distribués', 
            'Cloud Computing', 'Intelligence Artificielle', 'Machine Learning', 'Développement Web', 
            'Développement Mobile', 'Sécurité des Systèmes'
        ];
        $categorie = $request->input('categorie');
        $cours = Cours::when($categorie, function ($query, $categorie) {
            return $query->where('categorie', $categorie);
        })->paginate(10);
        return view('cours.index', compact('cours', 'categories'));
    }

    public function show($id)
    {
        $cours = Cours::with('professeur')->findOrFail($id);
        return view('cours.show', compact('cours'));
    }
    public function create()
    {
        return view('cours.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'categorie' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $professeurId = session('professeur_id');
        $cours = new Cours();
        $cours->titre = $request->titre;
        $cours->description = $request->description;
        $cours->categorie = $request->categorie;
        $cours->professeur_id = $professeurId;

        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $photoName = 'cours_' . time() . '.' . $photo->getClientOriginalExtension();
            $photoPath = $photo->storeAs('cours_photos', $photoName, 'public');
            $cours->image = $photoPath;
        }

        $cours->save();

        return redirect()->route('professeur.cours')->with('success', 'Cours ajouté avec succès.');
    }
    public function edit($id)
    {
        $cours = Cours::findOrFail($id);
        $categories = [
            'Mathématiques', 'Physique', 'Informatique', 'Chimie', 'Biologie',
            'Économie', 'Philosophie', 'Histoire', 'Géographie', 'Français',
            'Anglais', 'Espagnol', 'Arabe', 'Gestion', 'Marketing', 'Finance',
            'Science Politique', 'Droit', 'Programmation', 'Bases de Données',
            'Réseaux', 'Sécurité Informatique', 'Algorithmes', 'Statistiques',
            'Gestion de Projet', 'Analyse des Données', 'Systèmes Distribués',
            'Cloud Computing', 'Intelligence Artificielle', 'Machine Learning',
            'Développement Web', 'Développement Mobile', 'Sécurité des Systèmes'
        ];
        return view('cours.edit', compact('cours','categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'categorie' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $cours = Cours::findOrFail($id);
        $cours->titre = $request->titre;
        $cours->description = $request->description;
        $cours->categorie = $request->categorie;

        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $photoName = 'cours_' . time() . '.' . $photo->getClientOriginalExtension();
            $photoPath = $photo->storeAs('cours_photos', $photoName, 'public');
            $cours->image = $photoPath;
        }

        $cours->save();

        return redirect()->route('professeur.cours')->with('success', 'Cours mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $cours = Cours::findOrFail($id);
        $cours->delete();
        return redirect()->route('cours.index')->with('success', 'Cours supprimé avec succès.');
    }

    public function coursParProf($professeur_id)
    {
        $professeur = Professeur::findOrFail($professeur_id);
        $cours = $professeur->cours()->paginate(10);

        return view('cours.professeur', compact('cours','professeur'));
    }
}

