<?php

namespace App\Models;
use App\Models\Classe;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'fname',
        'tel',
        'date',
        'classe_id',
    ];
    
    public function get_classe()
    { 
        return $this->belongsTo(Classe::class, 'classe_id'); 
    }
}
