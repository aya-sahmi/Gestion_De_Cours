<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\ProfesseurController;

Route::get('/', [CoursController::class, 'accueil'])->name('accueil');

Route::get('/about', function () {
    return view('about');
});


// Routes d'authentification et inscription professeurs
Route::get('professeur/login', [ProfesseurController::class, 'login'])->name('professeur.login');
Route::post('professeur/login', [ProfesseurController::class, 'veriflogin'])->name('professeur.veriflogin');
Route::post('/logout', [ProfesseurController::class, 'logout'])->name('professeur.logout');
Route::get('professeur/register', [ProfesseurController::class, 'create'])->name('professeur.inscription');
Route::post('professeur/register', [ProfesseurController::class, 'store'])->name('professeur.store');

// Routes pour professeurs
Route::get('professeurs', [ProfesseurController::class, 'index'])->name('professeur.index');
Route::get('professeur/cours', [ProfesseurController::class, 'mesCours'])->name('professeur.cours');

// Routes pour cours
Route::resource('cours', CoursController::class);
Route::get('professeur/{professeur_id}/cours', [CoursController::class, 'coursParProf'])->name('cours.professeur');

