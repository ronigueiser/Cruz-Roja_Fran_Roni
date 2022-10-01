<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminCursosController extends Controller
{
    public function admin_cursos()
    {
        return view('admin-cursos');
    }
}
