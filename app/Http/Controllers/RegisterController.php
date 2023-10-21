<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index() {
        $rol = DB::select('SELECT id, nombre_rol FROM rol');

        return view('auth.register')->with('rol',$rol);
    }

    public function store() {
        $this->validate(request(), [
            'username' => 'required',
            'id_rol' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);
        
        User::create(request(['username', 'id_rol', 'email', 'password']));
        return redirect()->route('login.index');
    }
}