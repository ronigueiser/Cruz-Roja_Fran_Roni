<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class AuthController extends Controller
{
    public function loginForm(){
        return view('auth/login');
    }

    public function loginEjecutar (Request $request){

        //definimos las credenciales para la auth
        $credenciales = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        $request->validate(Usuario::VALIDATE_RULES, Usuario::VALIDATE_MESSAGES);

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

    public function registerForm(){
        return view('auth/register');
    }

    public function registerEjecutar (Request $request){

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
            ->route('auth.register.form')
            ->with('status.message', 'Los datos ingresados son incorrectos')
            ->with('status.type', 'danger')
            ->withInput();
    }

    public function logout (Request $request){

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('auth.login.form')
            ->with('status.message', 'Sesion cerrada exitosamente')
            ->with('status.type', 'success');
    }


}
