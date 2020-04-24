<?php

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

Route::middleware('auth:api')->
    get('/usuario', 'UsuarioApiController@usuario');

Route::apiResource('ordenes', 'API\OrdenesApiController');

Route::middleware('auth:api', 'capturador.api')->
    get('/servicio',
    function (Request $request) {
        return ['message' => 'prueba para limitar a usuarios, usando como ejemplo al usuario 2-capturador'];
    });

Route::get('/solocapturadores',
    function() {
        return ['message' => 'Funcion exclusiva para CAPTURADOR'];
    })->name('api.solocapturadores');

