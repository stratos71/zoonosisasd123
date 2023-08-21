<?php

namespace App\Http\Controllers;

use App\Models\User;

class HomeController extends Controller
{

    public function inicio()
    {
        $usuarios = User::count();
        return view('inicio', compact('usuarios'));
    }
}
