<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Professeur extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'professeurs';
    protected $fillable = ['nom', 'prenom', 'email', 'password', 'module_enseigne'];

    public function cours()
    {
        return $this->hasMany(Cours::class);
    }
}
