<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// RUTA: LOGIN
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- RUTAS DE USUARIOS LOGEADOS
Route::middleware(['auth'])->group(function () {
    
    // Vista del Administrador
    Route::get('/admin/dashboard', [AdminController::class, 'index'])
        ->middleware(\App\Http\Middleware\AdminMiddleware::class)
        ->name('admin.dashboard');
        
    Route::post('/admin/users', [AdminController::class, 'store'])
        ->middleware(\App\Http\Middleware\AdminMiddleware::class)
        ->name('admin.users.store');
        
    Route::delete('/admin/users/{user}', [AdminController::class, 'destroy'])
        ->middleware(\App\Http\Middleware\AdminMiddleware::class)
        ->name('admin.users.destroy');

    // Vista de Rol Usuario Regular (Solo ver perfil)
    Route::get('/profile', [UserController::class, 'index'])->name('user.profile');
});
