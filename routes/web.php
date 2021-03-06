<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', 'AdminController@dashboard')->name('admin.dashboard');

// atajo para establecer las 7 rutas básicas de un recurso.
// index, create, store, show, edit, update, destroy.
Route::resource('admin/ordenes','Admin\AdminOrdenController');
Route::resource('admin/usuarios','Admin\AdminUsuarioController');

Auth::routes(['register' => false]);