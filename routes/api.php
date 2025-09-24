<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController,SuperAdminController,CajeroController,MedicoController,PacienteController};

/*
|--------------------------------------------------------------------------
| Rutas API
|--------------------------------------------------------------------------
|
| Estas rutas estarán disponibles para la aplicación móvil. Se protegen con
| Sanctum (`auth:sanctum`) y middleware de rol para simular permisos.
|
*/

// Autenticación API
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Rutas SuperAdmin (solo app interna)
Route::middleware(['auth:sanctum', 'role:superadmin'])->prefix('superadmin')->group(function () {
    Route::get('/usuarios', [SuperAdminController::class, 'usuarios']);
    Route::post('/usuarios', [SuperAdminController::class, 'crearUsuario']);
    Route::put('/usuarios/{id}', [SuperAdminController::class, 'actualizarUsuario']);
    Route::delete('/usuarios/{id}', [SuperAdminController::class, 'eliminarUsuario']);
    Route::get('/reportes', [SuperAdminController::class, 'reportes']);
});

// Rutas Cajero
Route::middleware(['auth:sanctum', 'role:cajero'])->prefix('cajero')->group(function () {
    Route::get('/pagos', [CajeroController::class, 'pagos']);
    Route::post('/pagos/{id}', [CajeroController::class, 'registrarPago']);
});

// Rutas Médico
Route::middleware(['auth:sanctum', 'role:medico'])->prefix('medico')->group(function () {
    Route::get('/turnos', [MedicoController::class, 'turnos']);
    Route::post('/turnos', [MedicoController::class, 'crearTurno']);
    Route::put('/turnos/{id}', [MedicoController::class, 'actualizarTurno']);
    Route::delete('/turnos/{id}', [MedicoController::class, 'eliminarTurno']);
    Route::post('/consulta/{id}/terminar', [MedicoController::class, 'terminarConsulta']);
});

// Rutas Paciente
Route::middleware(['auth:sanctum', 'role:paciente'])->prefix('paciente')->group(function () {
    Route::get('/citas', [PacienteController::class, 'citas']);
    Route::post('/citas', [PacienteController::class, 'reservarCita']);
    Route::put('/citas/{id}', [PacienteController::class, 'modificarCita']);
    Route::delete('/citas/{id}', [PacienteController::class, 'cancelarCita']);
    Route::get('/historial', [PacienteController::class, 'historial']);
});
