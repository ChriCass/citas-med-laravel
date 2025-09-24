<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController,SuperAdminController,CajeroController,MedicoController,PacienteController};

Route::get('/', function () { return view('welcome'); });

// Autenticación
Route::get('/login', [AuthController::class, 'mostrarLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// SuperAdmin
Route::middleware(['auth','role:superadmin'])->prefix('superadmin')->group(function(){
    Route::get('/', [SuperAdminController::class, 'index']);
    Route::get('/usuarios', [SuperAdminController::class, 'usuarios']);
    Route::post('/usuarios', [SuperAdminController::class, 'crearUsuario']);
});

// Cajero
Route::middleware(['auth','role:cajero'])->prefix('cajero')->group(function(){
    Route::get('/', [CajeroController::class, 'index']);
    Route::get('/pagos', [CajeroController::class, 'pagos']);
});

// Medico
Route::middleware(['auth','role:medico'])->prefix('medico')->group(function(){
    Route::get('/', [MedicoController::class, 'index']);
});

// Paciente
Route::middleware(['auth','role:paciente'])->prefix('paciente')->group(function(){
    Route::get('/', [PacienteController::class, 'index']);
});
