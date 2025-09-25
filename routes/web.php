<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    SuperAdminController,
    CajeroController,
    MedicoController,
    PacienteController
};
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
});

// Autenticación
Route::get('/login', [AuthController::class, 'mostrarLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// SuperAdmin
Route::prefix('superadmin')->middleware(['auth', RoleMiddleware::class . ':superadmin'])->group(function () {
    Route::get('/', [SuperAdminController::class, 'index']);
    Route::get('/usuarios', [SuperAdminController::class, 'usuarios']);
    Route::post('/usuarios', [SuperAdminController::class, 'crearUsuario']);
});

// Cajero
Route::prefix('cajero')->middleware(['auth', RoleMiddleware::class . ':cajero'])->group(function () {
    Route::get('/', [CajeroController::class, 'index']);
    Route::get('/pagos', [CajeroController::class, 'pagos']);
});

// Medico
Route::prefix('medico')->middleware(['auth', RoleMiddleware::class . ':medico'])->group(function () {
    Route::get('/', [MedicoController::class, 'index']);
});

// Paciente
Route::prefix('paciente')->middleware(['auth', RoleMiddleware::class . ':paciente'])->group(function () {
    Route::get('/', [PacienteController::class, 'index']);
});
