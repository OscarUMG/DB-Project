<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionCatCurso extends Model
{
    use HasFactory;

    protected $table = 'asig_cat_curso';

    protected $fillable = [
        'id_catedratico',
        'id_curso',
        'id_user',
    ];
}
