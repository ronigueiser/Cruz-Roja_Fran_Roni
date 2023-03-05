<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    //

    public function create()
    {
        return view('auth/create');
    }


    public function store(Request $request)
    {
        $request->validate(Usuario::VALIDATE_RULES_REGISTER, Usuario::VALIDATE_MESSAGES);

        $user = Usuario::create(request(['email', 'password']));

        auth()->login($user);

        return redirect()->to('/');
    }
}
