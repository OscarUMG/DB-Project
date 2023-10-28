<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class NotaController extends Controller
{
    public function index() {
        $user_id = auth()->user()->id;
        $curso = DB::select(
            "SELECT C.ID CURSO_ID ,C.NOMBRE CURSO
            FROM ASIG_CAT_CURSO AG
            INNER JOIN CURSO C
            ON AG.ID_CURSO = C.ID
            INNER JOIN CATEDRATICO CAT
            ON AG.ID_CATEDRATICO = CAT.ID
            WHERE CAT.ID_USER = $user_id"
        );
        return view('catedratico.index')->with('curso', $curso);
    }

    public function notas($curso_id) {
        $curso = DB::select('SELECT NOMBRE, ID ID_CURSO FROM CURSO WHERE id = ?', [$curso_id]);

        $tipo_de_nota = DB::select('SELECT ID, NOMBRE FROM TIPO_NOTA');

        $estudiante = DB::select(
        '
        SELECT EST.ID ID_ESTUDIANTE, EST.NOMBRE ESTUDIANTE FROM ASIGNACION_CURSO AG
        INNER JOIN PAGO PG ON AG.ID_PAGO = PG.ID
        INNER JOIN ESTUDIANTE EST ON PG.ID_ESTUDIANTE = EST.ID
        INNER JOIN CURSO CS ON AG.ID_CURSO = CS.ID
        WHERE AG.ID_CURSO = ?
        '
        , [$curso_id]);

        $curso = !empty($curso) ? $curso[0] : null;

        // Pasamos la información del curso y estudiante a la vista
        return view('catedratico.ingresar-notas')->with([
            'curso' => $curso,
            'tipo_de_nota' => $tipo_de_nota,
            'estudiante' => $estudiante,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'puntos' => 'required',
            'id_user' => 'required',
            'id_tipo_nota' => 'required',
            'id_estudiante' => 'required',
            'id_curso' => 'required',
        ]);

        Nota::create($request->only('puntos', 'id_user', 'id_tipo_nota', 'id_estudiante', 'id_curso'));

        Session::flash('mensaje', 'Registro creado con exito!');

        return redirect()->route('nota.index');
    }
}
