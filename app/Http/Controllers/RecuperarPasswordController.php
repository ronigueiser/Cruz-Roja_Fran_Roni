<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Password;
use Hash;
use Illuminate\Auth\Events\PasswordReset;
use Str;
use Redirect;

class RecuperarPasswordController extends Controller
{
    public function emailRecuperarForm()
    {
        return view('auth.password-email');
    }

    public function emailRecuperarEnviar(Request $request)
    {
        // TODO: Validar

        $email = $request->input('email');
        $status = Password::sendResetLink(['email' => $email]);


        $route = redirect()->route('password.request');


        return $status === Password::RESET_LINK_SENT
            ? $route->with('status.message', 'Se envió un mail con instrucciones para recuperar la contraseña a <b>' . $email . '</b>.')
            ->with('status.type', 'success')
            : $route->with('status.message', 'Ocurrió un error inesperado.')
            ->with('status.type', 'danger');
    }

    public function restablecerPasswordForm(string $token)
    {
        return view('auth.password-restablecer',['token' => $token]);
    }

    public  function restablecerPasswordEjecutar(Request $request)
    {
        //TODO: Validar

        $credenciales = $request->only(['token', 'password', 'password_confirmation', 'email']);
        $status = Password::reset($credenciales, function($user, $password){
            $user->forceFill([
                'password'=> Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        });

        return $status === Password::PASSWORD_RESET
            ? redirect()
                ->route('auth.login.form')
                ->with('status.message', 'Tu contraseña se restableció con éxito.')
                ->with('status.type', 'success')
            : redirect()
                ->route('password.reset')
                ->withInput()
                ->with('status.message', 'Ocurrió un error al intentar restablecer la contraseña.')
                ->with('status.type', 'danger');
    }
}
