<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionCurso extends Model
{
    use HasFactory;

    protected $table = 'asignacion_curso';

    protected $fillable = [
        'id_pago',
        'id_curso',
        'id_user',
    ];
}
