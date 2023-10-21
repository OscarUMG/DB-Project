<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TesoreriaController extends Controller
{
    public function index(){
        //OBTENER TODOS LOS PAGOS QUE A REALIZADO EL USUARIO DE TESORERIA
        $user_id = auth()->user()->id;

        $pagos = DB::select(
            '
                SELECT EST.NOMBRE NOMBRE_ESTUDIANTE, SM.NOMBRE SEMESTRE, PG.MES, PG.ANIO, TP.NOMBRE TIPO_DE_PAGO, MP.NOMBRE METODO_DE_PAGO, PG.MONTO
                FROM PAGO PG
                INNER JOIN ESTUDIANTE EST ON PG.ID_ESTUDIANTE = EST.ID
                INNER JOIN SEMESTRE SM ON PG.ID_SEMESTRE = SM.ID
                INNER JOIN TIPO_PAGO TP ON PG.ID_TIPO_PAGO = TP.ID
                INNER JOIN METODO_PAGO MP ON PG.ID_METODO_PAGO = MP.ID
                WHERE PG.ID_USER = ?
            ', [$user_id]
        );

        return view('tesoreria.index')->with('pagos', $pagos);
    }

    public function pago() {
        $tipo_de_pago = DB::select('SELECT * FROM TIPO_PAGO');
        $metodo_de_pago = DB::select('SELECT * FROM METODO_PAGO');
        $semestre = DB::select('SELECT * FROM SEMESTRE');

        // $curso = !empty($curso) ? $curso[0] : null;

        return view('tesoreria.create')->with([
            'tipo_de_pago' => $tipo_de_pago,
            'metodo_de_pago' => $metodo_de_pago,
            'semestre' => $semestre,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_estudiante' => 'required',
            'id_tipo_pago' => 'required',
            'id_metodo_pago' => 'required',
            'id_semestre' => 'required',
            'id_user' => 'required',
            'mes' => 'required',
            'anio' => 'required',
            'monto' => 'required',
        ]);

        Pago::create($request->only('id_estudiante', 'id_tipo_pago', 'id_metodo_pago', 'id_semestre', 'id_user', 'mes', 'anio', 'monto'));

        Session::flash('mensaje', 'Registro creado con exito!');

        return redirect()->route('tesoreria.index');
    }
}
