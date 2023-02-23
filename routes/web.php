<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;





Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])
    ->name('home');


Route::get('nosotros', [\App\Http\Controllers\NosotrosController::class, 'index'])
    ->name('nosotros');

Route::get('blog', [\App\Http\Controllers\NovedadesController::class, 'index'])
    ->name('novedades');

Route::get('cursos', [\App\Http\Controllers\CursosController::class, 'cursos'])
    ->name('ver-cursos')
    ->middleware('taller-completo');


Route::get('contacto', [\App\Http\Controllers\ContactoController::class, 'index'])
    ->name('contacto');


Route::get('perfil', [\App\Http\Controllers\UsuariosController::class, 'verPerfil'])
    ->name('perfil')
    ->middleware(['auth']);

Route::get('perfil/{id}/editar', [\App\Http\Controllers\UsuariosController::class, 'editarForm'])
    ->name('perfil.editar.form')
    ->middleware(['auth']);

Route::post('perfil/{id}/editar', [\App\Http\Controllers\UsuariosController::class, 'editarEjecutar'])
    ->name('perfil.editar.ejecutar')
    ->whereNumber('id');

Route::get('carrito', [\App\Http\Controllers\CarritoController::class, 'carritoLista'])
    ->name('carrito')
    ->middleware(['auth']);

Route::post('carritoAgregar', [\App\Http\Controllers\CarritoController::class, 'nuevoGrabar'])
    ->name('carrito.agregar')
    ->middleware(['auth']);

Route::post('carrito/{id}/eliminar', [\App\Http\Controllers\CarritoController::class, 'eliminarEjecutar'])->name('carrito.eliminar.ejecutar')->whereNumber('id');


Route::get('registrarse', [\App\Http\Controllers\AuthController::class, 'registerForm'])
    ->name('auth.register.form')
    ->middleware(['guest']);

Route::post('registrarse', [\App\Http\Controllers\AuthController::class, 'registerEjecutar'])
    ->name('auth.register.ejecutar')
    ->middleware(['guest']);

Route::post('cerrar-sesion', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->name('auth.logout')
    ->middleware(['auth']);


Route::get('/register', [\App\Http\Controllers\RegistrationController::class, 'create'])
    ->name('registrar.usuario');
Route::post('register', [\App\Http\Controllers\RegistrationController::class, 'store'])
    ->name('register');




Route::prefix('admin/cursos')
    ->middleware(['auth', 'esAdmin'])
    ->controller(\App\Http\Controllers\AdminCursosController::class)->group(function () {
        Route::get('/', 'index')->name('admin.cursos.listado');

        Route::get('/{id}', 'ver')->name('admin.cursos.ver')->whereNumber('id');

        Route::get('/{id}/eliminar', 'eliminarConfirmar')->name('admin.cursos.eliminar.confirmar')->whereNumber('id');

        Route::post('/{id}/eliminar', 'eliminarEjecutar')->name('admin.cursos.eliminar.ejecutar')->whereNumber('id');

        Route::get('/{id}/editar', 'editarForm')->name('admin.cursos.editar.form')->whereNumber('id');

        Route::post('/{id}/editar', 'editarEjecutar')->name('admin.cursos.editar.ejecutar')->whereNumber('id');

        Route::get('/nuevo', 'nuevoForm')->name('admin.cursos.nuevo.form');

        Route::post('/nuevo', 'nuevoGrabar')->name('admin.cursos.nuevo.grabar');
    });

Route::prefix('admin/novedades')
    ->middleware(['auth', 'esAdmin'])
    ->controller(\App\Http\Controllers\AdminNovedadesController::class)->group(function () {
        Route::get('/', 'index')->name('admin.novedades.listado');

        Route::get('/{id}', 'ver')->name('admin.novedades.ver')->whereNumber('id');

        Route::get('/{id}/eliminar', 'eliminarConfirmar')->name('admin.novedades.eliminar.confirmar')->whereNumber('id');

        Route::post('/{id}/eliminar', 'eliminarEjecutar')->name('admin.novedades.eliminar.ejecutar')->whereNumber('id');

        Route::get('/{id}/editar', 'editarForm')->name('admin.novedades.editar.form')->whereNumber('id');

        Route::post('/{id}/editar', 'editarEjecutar')->name('admin.novedades.editar.ejecutar')->whereNumber('id');

        Route::get('/nuevo', 'nuevoForm')->name('admin.novedades.nuevo.form');

        Route::post('/nuevo', 'nuevoGrabar')->name('admin.novedades.nuevo.grabar');
    });

Route::prefix('admin/usuarios')
    ->middleware(['auth', 'esAdmin'])
    ->controller(\App\Http\Controllers\AdminUsuariosController::class)->group(function () {
        Route::get('/', 'index')->name('admin.usuarios.listado');

        Route::get('/{id}', 'ver')->name('admin.usuarios.ver')->whereNumber('id');

        Route::get('/{id}/eliminar', 'eliminarConfirmar')->name('admin.usuarios.eliminar.confirmar')->whereNumber('id');

        Route::post('/{id}/eliminar', 'eliminarEjecutar')->name('admin.usuarios.eliminar.ejecutar')->whereNumber('id');

        Route::get('/{id}/editar', 'editarForm')->name('admin.usuarios.editar.form')->whereNumber('id');

        Route::post('/{id}/editar', 'editarEjecutar')->name('admin.usuarios.editar.ejecutar')->whereNumber('id');

        Route::get('/nuevo', 'nuevoForm')->name('admin.usuarios.nuevo.form');

        Route::post('/nuevo', 'nuevoGrabar')->name('admin.usuarios.nuevo.grabar');
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

Route::get('cursos/confirmar-taller-completo', [\App\Http\Controllers\ConfirmarTallerCompletoController::class, 'confirmarForm'])
    ->name('confirmar-taller-completo.form');

Route::post('cursos/confirmar-taller-completo', [\App\Http\Controllers\ConfirmarTallerCompletoController::class, 'confirmarEjecutar'])
    ->name('confirmar-taller-completo.ejecutar');
