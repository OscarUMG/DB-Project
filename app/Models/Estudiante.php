<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'estudiante';

    protected $fillable = [
        'nombre',
        'direccion',
        'anio',
        'id_carrera',
        'id_user',
    ];
}
