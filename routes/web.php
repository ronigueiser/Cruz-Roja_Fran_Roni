<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;



Route::get('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'loginForm'])->name('auth.login.form');
Route::post('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'loginEjecutar'])->name('auth.login.ejecutar');


Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])->name('home');


Route::get('nosotros', [\App\Http\Controllers\NosotrosController::class, 'index'])->name('nosotros');

Route::get('cursos', [\App\Http\Controllers\CursosController::class, 'cursos'])->name('ver-cursos');


Route::prefix('admin/cursos')
    ->controller(\App\Http\Controllers\AdminCursosController::class)->group(function(){
    Route::get('/', 'index')->name('admin.cursos.listado');
    
    Route::get('/{id}', 'ver')->name('admin.cursos.ver')->whereNumber('id');
    
    Route::get('/{id}/eliminar', 'eliminarConfirmar')->name('admin.cursos.eliminar.confirmar')->whereNumber('id');
    
    Route::post('/{id}/eliminar', 'eliminarEjecutar')->name('admin.cursos.eliminar.ejecutar')->whereNumber('id');
    
    Route::get('/{id}/editar', 'editarForm')->name('admin.cursos.editar.form')->whereNumber('id');
    
    Route::post('/{id}/editar', 'editarEjecutar')->name('admin.cursos.editar.ejecutar')->whereNumber('id');
    
    Route::get('/nuevo', 'nuevoForm')->name('admin.cursos.nuevo.form');
    
    Route::post('/nuevo', 'nuevoGrabar')->name('admin.cursos.nuevo.grabar');


});


/*
AUTENTICACION
*/

Route::get('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'loginForm'])
->name('auth.login.form');

Route::post('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'loginEjecutar'])
->name('auth.login.ejecutar');
