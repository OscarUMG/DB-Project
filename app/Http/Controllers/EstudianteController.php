<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstudianteController extends Controller
{
    public function index() {
        $user_id = auth()->user()->id;
        $curso = DB::select(
            "SELECT C.ID CURSO_ID ,C.NOMBRE CURSO, EST.ID ID_ESTUDIANTE FROM ASIGNACION_CURSO AG
            INNER JOIN PAGO PG ON AG.ID_PAGO = PG.ID
            INNER JOIN ESTUDIANTE EST ON PG.ID_ESTUDIANTE = EST.ID
            INNER JOIN CURSO C ON AG.ID_CURSO = C.ID
            WHERE EST.ID_USER = ?", [$user_id]
        );
        return view('estudiante.index')->with('curso', $curso);
    }

    public function notas($curso_id, $id_estudiante) {
        $notas = DB::select('SELECT N.ID_CURSO, C.NOMBRE CURSO, E.NOMBRE ESTUDIANTE, TN.NOMBRE TIPO_DE_NOTA, N.PUNTOS FROM NOTA N
            INNER JOIN CURSO C ON N.ID_CURSO = C.ID
            INNER JOIN ESTUDIANTE E ON N.ID_ESTUDIANTE = E.ID
            INNER JOIN TIPO_NOTA TN ON N.ID_TIPO_NOTA = TN.ID
            WHERE N.ID_CURSO = :curso_id AND N.ID_ESTUDIANTE = :id_estudiante', [
            'curso_id' => $curso_id,
            'id_estudiante' => $id_estudiante
        ]);

        return view('estudiante.view')->with('notas', $notas);
    }
}
