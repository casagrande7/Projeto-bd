<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('store', [UsuarioController::class, 'store']);

Route::get('find/{id}',[UsuarioController::class, 'pesquisarPorId'] );

Route::get('find/cpf/{cpf}', [UsuarioController::class, 'pesquisarPorCpf']);

Route::get('all', [UsuarioController::class, 'retornarTodos']);

Route::post('nome', [UsuarioController::class, 'pesquisaPorNome']);

Route::delete('delete/{id}', [UsuarioController::class, 'excluir']);