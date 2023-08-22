<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\EspecieController;
use App\Http\Controllers\VacunaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', [HomeController::class, 'inicio'])->name('inicio');
Route::get('/ingresar', [AuthController::class, 'ingresar'])->name('ingresar');
Route::post('/iniciar_sesion', [AuthController::class, 'iniciar_sesion'])->name('iniciar_sesion');

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::middleware('auth')->group(function () {


        Route::get('/vacunas', [VacunaController::class, 'index'])->name('vacunas');
        Route::post('/crear_vacuna', [VacunaController::class, 'crear_vacuna'])->name('crear_vacuna');

        Route::post('/cerrar_sesion', [AuthController::class, 'cerrar_sesion'])->name('cerrar_sesion');

        Route::get('/roles', [RolesController::class, 'index'])->name('roles');
        Route::post('/crear_rol', [RolesController::class, 'crear_rol'])->name('crear_rol');
        Route::delete('/eliminar_rol/{id}', [RolesController::class, 'eliminar_rol'])->name('eliminar_rol');
        Route::post('/editar_rol/{id}', [RolesController::class, 'editar_rol'])->name('editar_rol');

        Route::get('/especies', [EspecieController::class, 'index'])->name('especies');
        Route::post('/crear_especie', [EspecieController::class, 'crear_especie'])->name('crear_especie');
        Route::post('/editar_especie/{id}', [EspecieController::class, 'editar_especie'])->name('editar_especie');
        Route::delete('/eliminar_especie/{id}', [EspecieController::class, 'eliminar_especie'])->name('eliminar_especie');

        Route::get('/usuarios', [UserController::class, 'usuarios'])->name('usuarios');
        Route::post('/crear_usuario', [UserController::class, 'crear_usuario'])->name('crear_usuario');
        Route::post('/editar_usuario/{id}', [UserController::class, 'editar_usuario'])->name('editar_usuario');
        Route::delete('/eliminar_usuario/{id}', [UserController::class, 'eliminar_usuario'])->name('eliminar_usuario');
        Route::post('/cambiar_contraseña/{id}', [UserController::class, 'cambiar_contraseña'])->name('cambiar_contraseña');
        Route::post('/cambiar_foto/{id}', [UserController::class, 'cambiar_foto'])->name('cambiar_foto');


        Route::get('/registros', 'RegistroController@index')->name('registros');

        
        ;
        Route::post('/editar_vacuna/{id}', [EspecieController::class, 'editar_especie'])->name('editar_vacuna');
        Route::delete('/eliminar_vacuna/{id}', [EspecieController::class, 'eliminar_especie'])->name('eliminar_vacuna');
        
    });
});
