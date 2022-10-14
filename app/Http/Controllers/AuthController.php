<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm(){
        return view('auth/login');
    }

    public function loginEjecutar(Request $request){

        //definimos las credenciales para la auth
        $credenciales = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if(Auth::attempt($credenciales)){
            $request->session()->regenerate();

            return redirect()
                ->route('admin.cursos.listado')
                ->with('status.message', 'Sesion iniciada correctamente')
                ->with('status.type', 'success');
        }

        return redirect()
            ->route('auth.login.form')
            ->with('status.message', 'Los datos ingresados son incorrectos')
            ->with('status.type', 'danger')
            ->withInput();
    }


}
