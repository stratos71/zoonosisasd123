<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function iniciar_sesion(Request $request)
    {
        $credentials = $request->only('nombre_usuario', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/inicio')->with('success', '¡Bienvenido!');
        }
        return back()->with('error', 'Correo o contraseña incorrecta');
    }
    public function ingresar()
    {
        return view('auth.login');
    }

    public function cerrar_sesion()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Has cerrado sesión correctamente.');
    }
}
