<?php

namespace App\Http\Controllers;

use App\Models\AsignacionCurso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AsignacionCursoController extends Controller
{
    public function index(){
        $asignaciones = DB::select("SELECT (EST.ANIO || '-' || EST.ID) CARNE, EST.NOMBRE ESTUDIANTE, CR.NOMBRE CARRERA , CS.NOMBRE CURSO, SMT.NOMBRE SEMESTRE FROM ASIGNACION_CURSO AG
        INNER JOIN PAGO PG ON AG.ID_PAGO = PG.ID
        INNER JOIN ESTUDIANTE EST ON PG.ID_ESTUDIANTE = EST.ID
        INNER JOIN CARRERA CR ON EST.ID_CARRERA = CR.ID
        INNER JOIN SEMESTRE SMT ON PG.ID_SEMESTRE = SMT.ID
        INNER JOIN CURSO CS ON AG.ID_CURSO = CS.ID");
        
        return view('secretaria.asignacion-curso-estudiante.index')->with('asignaciones', $asignaciones);
    }

    public function asignacion(){
        return view('secretaria.asignacion-curso-estudiante.create');
    }

    public function buscar(Request $request){
        $term = $request->input('term');
        $resultados = DB::select(
            "SELECT ID, NOMBRE CURSO
            FROM CURSO
            WHERE ID_SEMESTRE IN (SELECT ID_SEMESTRE FROM PAGO WHERE ID = $term)
            AND ID_CARRERA IN (SELECT EST.ID_CARRERA FROM PAGO PG
            INNER JOIN ESTUDIANTE EST ON PG.ID_ESTUDIANTE = EST.ID
            WHERE PG.ID = $term)"
        );

        return response()->json($resultados);
    }

    public function store(Request $request){
        try {
            $request->validate([
                'id_pago' => 'required',
                'id_curso' => 'required',
                'id_user' => 'required',
            ]);

            $id_pago = $request->input('id_pago');

            $count = DB::select("SELECT COUNT(*) as count FROM asignacion_curso WHERE id_pago = ?", [$id_pago])[0]->count;

            if ($count >= 5) {
                Session::flash('mensaje', 'Error: Solo se puede asignar a 5 cursos.');
                return redirect()->back()->withInput();
            }else{
                AsignacionCurso::create($request->only('id_pago', 'id_curso', 'id_user'));
    
                Session::flash('mensaje', 'Registro creado con éxito!');
                return redirect()->route('asignacion-estudiante.index');
            }


        } catch (\Exception $e) {
            Session::flash('mensaje', 'Error al crear el registro: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
