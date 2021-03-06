<?php
use App\Http\Middleware\checkcaja;
use App\Http\Middleware\checkmesa;
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
Route::get('registrartrabajador', function(){
    return view('auth.register');
})->name('registrartrabajador')->middleware(checkmesa::class, checkcaja::class);
//Route::get('register',[App\Http\Controllers\Auth\RegisterController::class , 'showRegistrationForm'])->name('register')->middleware(checkmesa::class, checkcaja::class);
Route::get('pedidoscobrados', [App\Http\Controllers\PedidoController::class ,'pedidoscobrados'])->name('pedidoscobrados');

Route::post('createuser',[App\Http\Controllers\UserController::class , 'store'])->name('createuser');
Route::get('mesasmesero',[App\Http\Controllers\MesaController::class, 'mostrarmesas'])->name('mesasmesero')->middleware(checkcaja::class);
Route::post('mesaupdate/{idmesa}',[App\Http\Controllers\MesaController::class, 'mesaupdate'])->name('mesaupdate');
Route::get('platillosjson',[App\Http\Controllers\PlatilloController::class, 'platillosjson'])->name('platillosjson');
Route::get('complementosjson',[App\Http\Controllers\ComplementoController::class, 'complementosjson'])->name('complementosjson');
Route::get('bebidasjson',[App\Http\Controllers\BebidaController::class, 'bebidasjson'])->name('bebidasjson');
Route::get('pedidojson/{idmesa}',[App\Http\Controllers\PedidoController::class, 'pedidojson'])->name('pedidojson');
Route::delete('pedidodelete/{idpedido}',[App\Http\Controllers\PedidoController::class,'destroy'])->name('pedidodelete'); 
Route::post('pedidostore',[App\Http\Controllers\PedidoController::class, 'store'])->name('pedidostore');
Route::put('pedidoupdate/{idpedido}',[App\Http\Controllers\PedidoController::class, 'update'])->name('pedidoupdate');
Route::post('detallestore',[App\Http\Controllers\DetallePedidoController::class, 'store'])->name('detallestore');


Route::get('mesascajero',[App\Http\Controllers\MesaController::class, 'mostrarmesascaja'])->name('mesascajero')->middleware(checkmesa::class);
Route::get('pedidoscajero/{idmesa}',[App\Http\Controllers\MesaController::class, 'mostrarmesacaja'])->name('pedidoscajero')->middleware(checkmesa::class);
Route::post('boletastore', [App\Http\Controllers\BoletaController::class, 'store'])->name('boletastore')->middleware(checkmesa::class);                   

Route::get('/', function () {
    return view('auth.login');
})->name('inicio');

//Auth::routes();
//desactivo la ruta /register que viene dentro de AUTH::ROUTES
Auth::routes(["register" => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(checkmesa::class, checkcaja::class);
Route::get('pedidosporfecha/{fecha}',[App\Http\Controllers\PedidoController::class, 'pedidosporfecha'])->name('pedidosporfecha')->middleware(checkmesa::class, checkcaja::class);;
Route::get('mostrarmesas', [App\Http\Controllers\MesaController::class, 'mostrarmesasjson'])->name('mostrarmesas')->middleware(checkmesa::class, checkcaja::class);
Route::get('mostrarmeseros', [App\Http\Controllers\UserController::class, 'listarmeserosjson'])->name('mostrarmeseros')->middleware(checkmesa::class, checkcaja::class);;
Route::get('pedidosporuser/{iduser}', [App\Http\Controllers\PedidoController::class, 'pedidosporuser'])->name('pedidosporuser')->middleware(checkmesa::class, checkcaja::class);
Route::get('pedidospormesa/{idmesa}',[App\Http\Controllers\PedidoController::class, 'pedidospormesa'])->middleware(checkmesa::class, checkcaja::class);
Route::get('listarboletas', [App\Http\Controllers\BoletaController::class, 'index'])->name('listarboletas')->middleware(checkmesa::class, checkcaja::class);
Route::get('mostrarcajeros', [App\Http\Controllers\UserController::class, 'listarcajerosjson'])->name('mostrarcajerosjson')->middleware(checkmesa::class, checkcaja::class);
Route::get('boletasporuser/{iduser}',[App\Http\Controllers\BoletaController::class, 'boletasporuser'])->name('boletasporuser')->middleware(checkmesa::class, checkcaja::class);
Route::get('boletasporfecha/{fecha}', [App\Http\Controllers\BoletaController::class, 'boletasporfecha'])->name('boletasporfecha')->middleware(checkmesa::class, checkcaja::class);