<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin() {
        if (Auth::check()) {
            return Auth::user()->role === 'admin' 
                ? redirect()->route('admin.dashboard') 
                : redirect()->route('user.profile');
        }
        return view('auth.login');
    }
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
           
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('user.profile');
        }
        // Si las credenciales fallan, regresa al login con un mensaje de error
        return back()->withErrors(['error' => 'Usuario o contraseña incorrectos.']);
    }
    // Cerrar sesión de manera segura
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
