<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\EmprendimientoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\InversionistaController;
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
    return view('auth.login');
});

/***----------------------------------------- PAGINA ---------------------------------------------------------- */
Route::get('/pagina', [App\Http\Controllers\paginaController::class,'inicio']);
Route::get('/canasta-agricola', [App\Http\Controllers\paginaController::class,'obtenerProducto']);
Route::get('/agro-oferta', [App\Http\Controllers\paginaController::class,'obtenerProdSale']);
Route::get('/inversionistas', [App\Http\Controllers\paginaController::class,'obtenerInversionista']);
Route::get('/eventos', [App\Http\Controllers\paginaController::class,'obtenerEvento']);
Route::get('/inicio', [App\Http\Controllers\paginaController::class,'inicio']);
Route::get('productos/{id}', [App\Http\Controllers\paginaController::class,'showProducto']);
Route::get('/emprendimientos', [App\Http\Controllers\paginaController::class,'obtenerEmprendimiento']);
Route::get('/contacto', [App\Http\Controllers\paginaController::class,'contacto']);


/***----------------------------------------- CRUD ---------------------------------------------------------- */
Route::get('/home', [ProductoController::class, 'index'])->name('home');
Route::resource('producto', ProductoController::class)->middleware('auth');
Route::resource('emprendimiento', EmprendimientoController::class)->middleware('auth');
Route::resource('evento', EventoController::class)->middleware('auth');
Route::resource('inversionista', InversionistaController::class)->middleware('auth');
Auth::routes(['register'=>false,'reset'=>false]);


/***--------------------------------------- CARRITO COMPRAS ------------------------------------------------ */
Route::get('/carrito',[App\Http\Controllers\CarritoCompraController::class, 'index']);
Route::delete('/carrito/{id}',[App\Http\Controllers\CarritoCompraController::class, 'destroy']);
Route::delete('/carrito',[App\Http\Controllers\CarritoCompraController::class, 'vaciar']);
Route::patch('/carrito/{id}/{operacion}',[App\Http\Controllers\CarritoCompraController::class, 'update']);
Route::post('/carrito/create/{id}',[App\Http\Controllers\CarritoCompraController::class, 'create']);
Route::get('/carrito/agregar/{id}',[App\Http\Controllers\CarritoCompraController::class, 'existe']);