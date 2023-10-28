<?php

namespace App\Http\Controllers;

use App\Models\AsignacionCatCurso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AsignacionCatCursoController extends Controller
{
    public function index() {
        $asignaciones = DB::select("SELECT CAT.NOMBRE CATEDRATICO, CS.NOMBRE CURSO FROM ASIG_CAT_CURSO AG
        INNER JOIN CATEDRATICO CAT ON AG.ID_CATEDRATICO = CAT.ID
        INNER JOIN CURSO CS ON AG.ID_CURSO = CS.ID");

        $catedratico = DB::select(
            "
            SELECT CAT.NOMBRE NOMBRE_CATEDRATICO, CAT.DIRECCION, U.USERNAME, U.EMAIL FROM CATEDRATICO CAT
            INNER JOIN USERS U ON CAT.ID_USER = U.ID
            "
        );

        return view('secretaria.asignacion-curso-catedratico.index')->with([
            'asignaciones' => $asignaciones,
            'catedratico' => $catedratico,
        ]);
    }

    public function asignacion(){
        $catedratico = DB::select('SELECT ID, NOMBRE NOMBRE_CATEDRATICO FROM CATEDRATICO');

        return view('secretaria.asignacion-curso-catedratico.create-asignacion')->with('catedratico', $catedratico);
    }

    public function buscar(Request $request){
        $term = $request->input('term');
        $resultados = DB::select(
            'SELECT ID, NOMBRE CURSO FROM CURSO
            WHERE ID = ?', [$term]
        );

        return response()->json($resultados);
    }

    public function store(Request $request){
        try {
            $request->validate([
                'id_catedratico' => 'required',
                'id_curso' => 'required',
                'id_user' => 'required',
            ]);

            AsignacionCatCurso::create($request->only('id_catedratico', 'id_curso', 'id_user'));

            Session::flash('mensaje', 'Registro creado con éxito!');
            return redirect()->route('asignacion-catedratico.index');

        } catch (\Exception $e) {
            Session::flash('mensaje', 'Error al crear el registro: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
