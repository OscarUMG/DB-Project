<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class InscripcionController extends Controller
{
    public function index() {
        $estudiante = DB::select(
            "
            SELECT (EST.ANIO || '-' || EST.ID) CARNE, EST.NOMBRE NOMBRE_ESTUDIANTE, EST.DIRECCION, EST.ANIO, CR.NOMBRE CARRERA, U.USERNAME, U.EMAIL FROM ESTUDIANTE EST
            INNER JOIN CARRERA CR ON EST.ID_CARRERA = CR.ID
            INNER JOIN USERS U ON EST.ID_USER = U.ID
            "
        );

        return view('secretaria.inscripciones.index')->with('estudiante', $estudiante);
    }

    public function inscripcion(){
        $carrera = DB::select('SELECT ID, NOMBRE CARRERA FROM CARRERA');
        $rol = DB::select('SELECT ID, NOMBRE_ROL ROL FROM ROL WHERE ID = 4');
        $user = DB::select('SELECT MAX(ID) ID FROM USERS');

        $user = !empty($user) ? $user[0] : null;

        return view('secretaria.inscripciones.create')->with([
            'carrera' => $carrera,
            'rol' => $rol,
            'user' => $user,
        ]);
    }

    public function store(Request $request){
        try {
            $request->validate([
                // Usuario
                'username' => 'required|unique:users,username',
                'email' => 'required|unique:users,email',
                'password' => 'required',
                'id_rol' => 'required',
                //Estudiante
                'nombre' => 'required',
                'direccion' => 'required',
                'anio' => 'required',
                'id_carrera' => 'required',
                'id_user' => 'required',
            ]);

            User::create($request->only('username', 'email', 'password', 'id_rol'));
            Estudiante::create($request->only('nombre', 'direccion', 'anio', 'id_carrera', 'id_user'));

            Session::flash('mensaje', 'Registro creado con éxito!');
            return redirect()->route('inscripcion.index');

        } catch (\Exception $e) {
            Session::flash('mensaje', 'Error al crear el registro: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
