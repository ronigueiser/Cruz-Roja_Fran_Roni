<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;





Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])->name('home');


Route::get('nosotros', [\App\Http\Controllers\NosotrosController::class, 'index'])->name('nosotros');

Route::get('blog', [\App\Http\Controllers\BlogController::class, 'comentarios'])->name('blog');

Route::get('cursos', [\App\Http\Controllers\CursosController::class, 'cursos'])->name('ver-cursos');



Route::get('registrarse', [\App\Http\Controllers\AuthController::class, 'registerForm'])
    ->name('auth.register.form')
    ->middleware(['guest']);

Route::post('registrarse', [\App\Http\Controllers\AuthController::class, 'registerEjecutar'])
    ->name('auth.register.ejecutar')
    ->middleware(['guest']);

Route::post('cerrar-sesion', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->name('auth.logout')
    ->middleware(['auth']);

Route::prefix('admin/cursos')
    ->middleware(['auth', 'mayor-edad'])
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

Route::prefix('admin/blog')
    ->middleware(['auth'])
    ->controller(\App\Http\Controllers\AdminBlogController::class)->group(function(){
    Route::get('/', 'index')->name('admin.comentarios.listado');

    Route::get('/{id}', 'ver')->name('admin.comentarios.ver')->whereNumber('id');

    Route::get('/{id}/eliminar', 'eliminarConfirmar')->name('admin.comentarios.eliminar.confirmar')->whereNumber('id');

    Route::post('/{id}/eliminar', 'eliminarEjecutar')->name('admin.comentarios.eliminar.ejecutar')->whereNumber('id');

    Route::get('/{id}/editar', 'editarForm')->name('admin.comentarios.editar.form')->whereNumber('id');

    Route::post('/{id}/editar', 'editarEjecutar')->name('admin.comentarios.editar.ejecutar')->whereNumber('id');

    Route::get('/nuevo', 'nuevoForm')->name('admin.comentarios.nuevo.form');

    Route::post('/nuevo', 'nuevoGrabar')->name('admin.comentarios.nuevo.grabar');
});

/*
AUTENTICACION
*/


Route::get('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'loginForm'])
    ->name('auth.login.form')
    ->middleware(['guest']);

Route::post('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'loginEjecutar'])
    ->name('auth.login.ejecutar')
    ->middleware(['guest']);

Route::get('recuperar-password-email', [\App\Http\Controllers\RecuperarPasswordController::class, 'emailRecuperarForm'])
->name('password.request')
->middleware(['guest']);

Route::post('recuperar-password-email', [\App\Http\Controllers\RecuperarPasswordController::class, 'emailRecuperarEnviar'])
->name('password.email')
->middleware(['guest']);

Route::get('restablecer-password/{token}', [\App\Http\Controllers\RecuperarPasswordController::class, 'restablecerPasswordForm'])
->name('password.reset')
->middleware(['guest']);

Route::post('restablecer-password', [\App\Http\Controllers\RecuperarPasswordController::class, 'restablecerPasswordEjecutar'])
->name('password.update')
->middleware(['guest']);

Route::get('cursos/confirmar-edad', [\App\Http\Controllers\ConfirmarEdadController::class, 'confirmarForm'])
->name('confirmar-mayoria-edad.form');

Route::post('cursos/confirmar-edad', [\App\Http\Controllers\ConfirmarEdadController::class, 'confirmarEjecutar'])
->name('confirmar-mayoria-edad.ejecutar');