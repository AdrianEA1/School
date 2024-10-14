<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Obtener el usuario por correo electrónico
        $user = User::where('email', $request->email)->first();

        // Verificar si el usuario existe y la contraseña coincide
        if ($user && $user->clave === $request->password) {
            // Si es exitoso, redirigir a la página deseada
            return redirect()->intended('welcome');
        }

        // Si la autenticación falla, redirigir de vuelta con un mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }
}
