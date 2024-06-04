<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;
    protected $fillable = [
        'ID_depart', 'name', 'hod', 'started_year', 'no_etudiant','sexe','etat','file_path','file_name'
    ];
}
