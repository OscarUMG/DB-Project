<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstudianteController extends Controller
{
    public function index(){
        // $user_id = auth()->user()->id;

        // $estudiante = DB::select(
        //     '
        //     SELECT EST.NOMBRE NOMBRE_ESTUDIANTE, EST.DIRECCION, EST.ANIO, CR.NOMBRE CARRERA, U.USERNAME, U.EMAIL FROM ESTUDIANTE EST
        //     INNER JOIN CARRERA CR ON EST.ID_CARRERA = CR.ID
        //     INNER JOIN USERS U ON EST.ID_USER = U.ID
        //     ', 
        // );

        // return view('secretaria.inscripciones.index')->with('estudiante', $estudiante);
    }
}
