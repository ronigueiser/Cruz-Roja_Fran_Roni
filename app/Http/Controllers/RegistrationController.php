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


    public function store()
    {
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = Usuario::create(request(['email', 'password']));

        auth()->login($user);

        return redirect()->to('/');
    }

}
