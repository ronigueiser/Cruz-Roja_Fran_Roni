<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function comentarios()
    {
        $comentarios = Blog::all();

        return view('blog', [
            'comentarios' => $comentarios,
        ]);
    }
}
