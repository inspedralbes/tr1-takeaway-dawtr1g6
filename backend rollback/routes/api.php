<?php

use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\LiniaPedidoController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/




Route::post("/register", [UserController::class, "register"]);
Route::post("/login", [UserController::class, "login"]);


Route::post("/getProductos", [ProductoController::class, "getProductos"]);

Route::post("/getPedidos", [PedidoController::class, "getPedidos"]);

Route::post("/getUsers", [UserController::class, "getUsers"]);

Route::post("/getLiniaPedidos", [LiniaPedidoController::class, "getLiniaPedidos"]);

Route::group(['middleware' => ['auth:sanctum']], function () {
    
    Route::post("/logout", [UserController::class, "logout"]);


});




// retorna un json de todos los productos de la bd en phpmyadmin
Route::get('/getJsonProductos', [ProductoController::class, 'giveJsonProductosData']);
// retorna un json de todos los pedidos de la bd en phpmyadmin
Route::get('/getJsonPedidos', [PedidoController::class, 'giveJsonPedidosData']);
// retorna u njson de todos los usuaris de la bd en phpmyadmin
Route::post("/getJsonUsers", [UserController::class, "giveJsonUsersData"]);
// retorna un json de todos los linia de pedidos de la bd en phpmyadmin
Route::post("/getJsonLiniaPedidos", [LiniaPedidoController::class, "giveJsonLiniaPedidoData"]);
