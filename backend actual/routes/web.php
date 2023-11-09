<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\LiniaPedidoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\QrController;
use App\Http\Controllers\UserController;
use App\Mail\autoplanetMail;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});




// rutas de pedidos
Route::get("/showPedidos", [PedidoController::class, "showPedidos"]);
Route::get("/showPedido-item/{id}", [PedidoController::class, "showPedido_item"]);
Route::get("/showPedido-itemNA/{id}", [PedidoController::class, "showPedido_itemNA"]);
Route::get('/showPedidosAdmin', [PedidoController::class, 'showPedidosAdmin']);

// rutas de productos
Route::get("/showProductos", [ProductoController::class, "showProductos"]);
Route::get("/showProducto-item/{id}", [ProductoController::class, "showProducto_item"]);
Route::get("/showProducto-itemNA/{id}", [ProductoController::class, "showProducto_itemNA"]);
Route::get('/showProductosAdmin', [ProductoController::class, 'showProductosAdmin']);



// CRUD PRODUCTO (ADMIN)
Route::post("/update_producto/{id}", [ProductoController::class, "update_producto"]);
Route::post("/destroy_producto/{id}", [ProductoController::class, "destroy_producto"]);
Route::get("/create-producto", [ProductoController::class, "show_create_producto"]);
Route::post("/save-producto", [ProductoController::class, "save_producto"]);

// CRUD USERS (ADMIN)
Route::get("/showUsersAdmin", [UserController::class,"showUsersAdmin"]);
Route::get("/showUser-item/{id}", [UserController::class, "showUser_item"]);

Route::post("/update_user/{id}", [UserController::class,"update_user"]);
Route::post("/destroy_user/{id}", [UserController::class,"destroy_user"]);
Route::get("/create-user/{id}", [UserController::class,"create_user"]);
Route::post("/save-user/{id}", [UserController::class,"save_user"]);


// CRUD PEDIDO (ADMIN)
Route::post("/update_pedido/{id}", [PedidoController::class, "update_pedido"]);
Route::post("/destroy_pedido/{id}", [PedidoController::class, "destroy_pedido"]);
Route::get("/create-pedido", [PedidoController::class, "show_create_pedido"]);
Route::post("/save-pedido", [PedidoController::class, "save_pedido"]);



