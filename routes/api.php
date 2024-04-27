<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
});

// Endpoint para registrar usuarios. El metodo register en el controlador UserController tiene las validaciones.
// Este endpoint es publico y no necesita token para invicarse.
Route::post('/register', [UserController::class, 'register']);

// Endpoint para iniciar sesion de usuarios. El metodo login en el controlador AuthController tiene las validaciones.
// Este endpoint es publico y no necesita token para invicarse.
Route::post('/login', [AuthController::class, 'login']);