<?php

namespace App\Http\Controllers;

use App\Models\Catedratico;
use App\Models\Nota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CatedraticoController extends Controller
{
    public function catedratico(){
        $rol = DB::select('SELECT ID, NOMBRE_ROL ROL FROM ROL WHERE ID = 2');
        $user = DB::select('SELECT MAX(ID) ID FROM USERS');

        $user = !empty($user) ? $user[0] : null;

        return view('secretaria.asignacion-curso-catedratico.create')->with([
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
                // Catedratico
                'nombre' => 'required',
                'direccion' => 'required',
                'id_user' => 'required',
            ]);

            User::create($request->only('username', 'email', 'password', 'id_rol'));
            Catedratico::create($request->only('nombre', 'direccion','id_user'));

            Session::flash('mensaje', 'Registro creado con éxito!');
            return redirect()->route('asignacion-catedratico.index');

        } catch (\Exception $e) {
            Session::flash('mensaje', 'Error al crear el registro: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
