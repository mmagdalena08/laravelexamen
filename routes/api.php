<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tiposController;
use App\Http\Controllers\animalesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->group( function () { 

    Route::get('/v1/usuario', [UserController::class,'index']);
    Route::post('/v1/usuario/registrartipos', [EquiposController::class,'registrartipos']);
    Route::get('/v1/usuario/mostrartipos', [EquiposController::class,'mostrartipos']);
    Route::post('/v1/usuario/actualizartipos/{id}', [EquiposController::class,'actualizartipos']);
    Route::post('/v1/usuario/eliminartipos/{id}', [EquiposController::class,'eliminartipos']);
    Route::post('/v1/usuario/registraranimales', [JugadoresController::class,'registraranimales']);
    Route::get('/v1/usuario/mostraranimales', [JugadoresController::class,'mostraranimales']);
    Route::post('/v1/usuario/actualizaranimales/{id}', [JugadoresController::class,'actualizaranimales']);
    Route::post('/v1/usuario/eliminaranimales/{id}', [JugadoresController::class,'eliminaranimales']);
});
    