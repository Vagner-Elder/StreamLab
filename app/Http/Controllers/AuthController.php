<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('Peliculas.index', ['showLoginForm' => true]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('CORREO', 'CONTRASENA');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            return redirect()->intended('/'); // Cambiar a la ruta que desees después de iniciar sesión
        } else {
            // Autenticación fallida
            return redirect()->route('login.form')->with('error', 'Credenciales incorrectas');
        }
    }
}