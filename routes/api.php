<?php

use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ChamadosController;
use App\Http\Controllers\DepartamentosController;
use App\Http\Controllers\TarefasController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('usuarios', UsuariosController::class);
Route::apiResource('categorias', CategoriasController::class);
Route::apiResource('chamados', ChamadosController::class);
Route::apiResource('departamentos', DepartamentosController::class);
Route::apiResource('Tarefas', TarefasController::class);

Route::get('/auth', [UsuariosController::class, 'checkLogin']);

route::get('token', function () {
    return csrf_token();
});
