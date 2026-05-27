<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // 1. LEER (Listar todos los usuarios en el Panel)
    public function index() {
        $users = User::all();
        return view('admin.dashboard', compact('users'));
    }

    // 2. CREAR (Guardar un nuevo usuario desde la interfaz del Administrador)
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users', // Recuerda que usamos la columna email como "username"
            'password' => 'required|string|min:4',
            'role' => 'required|in:admin,user',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Encriptación automática nativa
            'role' => $request->role,
        ]);

        return back()->with('success', 'Usuario registrado con éxito.');
    }

    // 3. ELIMINAR (Baja del usuario)
    public function destroy(User $user) {
        // Evitar que te elimines a ti mismo por accidente
        if ($user->id === Auth::id()) {
            return back()->withErrors(['error' => 'No puedes eliminar tu propia cuenta de administrador.']);
        }

        $user->delete();
        return back()->with('success', 'Usuario eliminado correctamente.');
    }
}