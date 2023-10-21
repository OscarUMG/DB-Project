<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'pago';

    protected $fillable = [
        'id_estudiante',
        'id_semestre',
        'id_tipo_pago',
        'id_metodo_pago',
        'mes',
        'anio',
        'monto',
        'id_user',
    ];
}
