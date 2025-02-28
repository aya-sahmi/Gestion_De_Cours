<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->enum('categorie', [
                'Mathématiques', 'Physique', 'Informatique', 'Chimie', 'Biologie',
                'Économie', 'Philosophie', 'Histoire', 'Géographie', 'Français',
                'Anglais', 'Espagnol', 'Arabe', 'Gestion', 'Marketing',
                'Finance', 'Science Politique', 'Droit', 'Programmation',
                'Bases de Données', 'Réseaux', 'Sécurité Informatique',
                'Algorithmes', 'Statistiques', 'Gestion de Projet',
                'Analyse des Données', 'Systèmes Distribués', 'Cloud Computing',
                'Intelligence Artificielle', 'Machine Learning',
                'Développement Web', 'Développement Mobile',
                'Sécurité des Systèmes'
            ]);
            $table->string('image')->nullable();
            $table->foreignId('professeur_id')->constrained('professeurs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cours');
    }
};
