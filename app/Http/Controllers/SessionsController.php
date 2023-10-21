<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function store() {
        if(auth()->attempt(request(['username', 'password'])) == false){
            return back()->withErrors([
                'message' => 'Credenciales incorrectas',
            ]);
        }

        if(auth()->check()){
            if(auth()->user()->id_rol == 2){
                return redirect()->route('catedratico.index');
            }
        }
        return redirect()->to('/');
    }

    public function destroy(){
        auth()->logout();

        return redirect()->to('/');
    }
}
