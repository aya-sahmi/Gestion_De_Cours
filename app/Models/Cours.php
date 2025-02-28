<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;
    protected $table = 'cours';
    protected $fillable = ['titre', 'description', 'categorie','image', 'professeur_id'];
    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }
}
