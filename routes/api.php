<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

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



//Rutas para proyectos
// TODO
Route::apiResource('projects', ProjectController::class);

// Rutas para tareas
// TODO
Route::apiResource('tasks', TaskController::class);



// NO MODIFICAR: Ruta adicional para actualizar el estado de una tarea
Route::patch('tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');