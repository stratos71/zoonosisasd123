<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Vacuna;

class HomeController extends Controller
{
    //Redirección a la vista de inicio (usuarios logueados)
    public function inicio()
    {
        $vacunas = Vacuna::count();
        $usuarios = User::count();
        return view('inicio', compact('usuarios','vacunas'));
    }
}
