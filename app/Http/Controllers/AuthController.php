<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Función para iniciar sesión con nombre de usuario y contraseña
    public function iniciar_sesion(Request $request)
    {
        $credentials = $request->only('nombre_usuario', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->estado === 'Activo') {
                return redirect()->intended('/inicio')->with('success', '¡Bienvenido!');
            } else {
                Auth::logout();
                return back()->with('error', 'Tu cuenta no está activa.');
            }
        }
        return back()->with('error', 'Correo o contraseña incorrecta');
    }
    //Redirección a la ruta para iniciar sesión
    public function ingresar()
    {
        return view('auth.login');
    }
    //Funcion para cerrar sesión
    public function cerrar_sesion()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Has cerrado sesión correctamente.');
    }
}
