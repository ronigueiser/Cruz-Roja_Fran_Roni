<?php

use Illuminate\Support\Facades\App;
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

/*
 * Route Nos permite definir las rutas de nuestra aplicacion
 * Al definir la ruta, se nos va a pedir que le indiquemos como debe procesarse esa ruta. Es decir, que hay que hacer cuando el usuario acceda a dicha ruta.
 *
 * Tenemos 2 opciones:
 * 1. Usar un Closure (funcion anonima) con el codigo que se debe ejecutar. Es muestra el primer ejemplo Laravel
 * 2. Usar un array para indicar que "controller" debe encargarse, y con que metodo del mismo
 *
 * Este codigo esta definiendo una ruta que se accede por get, a la URL "/", que es la raiz de la carpeta "public".
 * Luego, le pasa un Closure donde le indica como debe procesar esa peticion. En este caso, renderizando la vista "welcome"
 *
 * Route::get('/', function () {
 *   return view('welcome');
 * });
 *
 *Aunque Laravel muestre este ejemplo, es mejor usar controllers para asociar las rutas.
 *
 *
 * Para definir el controller, pasamos el array que debe tener 2 valores:
 * 1. String. El FQN de la clase del controller.
 * 2. String. Nombre del metodo del controller que va a procesar la ruta
 *
 * Para que esto funcione, vamos a necesitar crear el controller.
 * Por defecto, los controllers se ubican en la carpeta App/http/controllers
 */


Route::get('/', [\App\Http\Controllers\HomeController::class, 'home']);


Route::get('nosotros', [\App\Http\Controllers\NosotrosController::class, 'index']);

Route::get('cursos', [\App\Http\Controllers\CursosController::class, 'cursos']);

Route::get('admin/cursos', [\App\Http\Controllers\AdminCursosController::class, 'index']);

/*
AUTENTICACION
*/

Route::get('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'loginForm'])
->name('auth.login.form');

Route::post('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'loginEjecutar'])
->name('auth.login.ejecutar');
