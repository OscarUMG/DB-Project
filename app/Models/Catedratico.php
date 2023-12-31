<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catedratico extends Model
{
    use HasFactory;

    protected $table = 'catedratico';

    protected $fillable = [
        'nombre',
        'direccion',
        'id_user',
    ];
}
