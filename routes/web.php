<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MesaController;
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

Route::resource('mesa', MesaController::class);
Route::resource('platillo', App\Http\Controllers\PlatilloController::class);
Route::resource('bebida', App\Http\Controllers\BebidaController::class);
Route::resource('complemento', App\Http\Controllers\ComplementoController::class);
Route::resource('pedido', App\Http\Controllers\PedidoController::class);


Route::get('mesascajero',[App\Http\Controllers\MesaController::class, 'mostrarmesas'])->name('mesascajero');
Route::get('platillosjson',[App\Http\Controllers\PlatilloController::class, 'platillosjson'])->name('platillosjson');
Route::get('complementosjson',[App\Http\Controllers\ComplementoController::class, 'complementosjson'])->name('complementosjson');
Route::get('bebidasjson',[App\Http\Controllers\BebidaController::class, 'bebidasjson'])->name('bebidasjson');
Route::get('pedidojson/{idmesa}',[App\Http\Controllers\PedidoController::class, 'pedidojson'])->name('pedidojason');
Route::delete('pedidodelete/{idpedido}',[App\Http\Controllers\PedidoController::class,'destroy'])->name('pedidodelete'); 
Route::post('pedidostore',[App\Http\Controllers\PedidoController::class, 'store'])->name('pedidostore');
Route::get('/', function () {
    return view('welcome');
})->name('inicio');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
