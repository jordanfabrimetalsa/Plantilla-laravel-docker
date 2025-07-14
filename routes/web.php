<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Categorias;
use App\Http\Controllers\Clientes;
use App\Http\Controllers\Compras;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DetalleVentas;
use App\Http\Controllers\Productos;
use App\Http\Controllers\Proveedores;
use App\Http\Controllers\Reportes_productos;
use App\Http\Controllers\Usuarios;
use App\Http\Controllers\Ventas;
use App\Http\Controllers\ProveedorController;
use Illuminate\Support\Facades\Route;

//crear un usuario admin, solo usar una vez
Route::get('/crear-admin', [AuthController::class, 'crearAdmin']);

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/logear', [AuthController::class, 'logear'])->name('logear');


Route::middleware("auth")->group(function(){
    Route::get('/home', [Dashboard::class, 'index'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('ventas')->group(function(){
    Route::get('/nueva-venta', [Ventas::class, 'index'])->name('ventas-nueva');
    Route::get('/agregar-carrito/{id_producto}', [Ventas::class, 'agregar_carrito'])->name('ventas.agregar.carrito');
    Route::get('/borrar-carrito', [Ventas::class, 'borrar_carrito'])->name('ventas.borrar.carrito');
    Route::get('/quitar-carrito/{id_producto}', [Ventas::class, 'quitar_carrito'])->name('ventas.quitar.carrito');
    Route::post('/vender', [Ventas::class, 'vender'])->name('ventas.vender');
});

Route::prefix('detalle')->middleware('auth')->group(function(){
    Route::get('/detalle-venta', [DetalleVentas::class, 'index'])->name('detalle-venta');
    Route::get('/vista-detalle/{id_venta}', [DetalleVentas::class, 'vista_detalle'])->name('detalle.vista.detalle');
    Route::delete('/revocar/{id_venta}', [DetalleVentas::class, 'revocar'])->name('detalle.revocar');
    Route::get('/ticket/{id_venta}', [DetalleVentas::class, 'generarTicket'])->name('detalle.ticket');
});

Route::prefix('categorias')->middleware('auth', 'Checkrol:admin')->group(function(){
    Route::get('/', [Categorias::class, 'index'])->name('categorias');
    Route::get('/create', [Categorias::class, 'create'])->name('categorias.create');
    Route::post('/store', [Categorias::class, 'store'])->name('categorias.store');
    Route::get('/show/{id}', [Categorias::class, 'show'])->name('categorias.show');
    Route::delete('/destroy/{id}', [Categorias::class, 'destroy'])->name('categorias.destroy');
    Route::get('/edit/{id}', [Categorias::class, 'edit'])->name('categorias.edit');
    Route::put('/update/{id}', [Categorias::class, 'update'])->name('categorias.update');
});

Route::prefix('productos')->middleware('auth', 'Checkrol:admin')->group(function(){
    Route::get('/', [Productos::class, 'index'])->name('productos');
    Route::get('/create', [Productos::class, 'create'])->name('productos.create');
    Route::post('/store', [Productos::class, 'store'])->name('productos.store');
    Route::get('/edit/{id}', [Productos::class, 'edit'])->name('productos.edit');
    Route::put('/update/{id}', [Productos::class, 'update'])->name('productos.update');

    Route::get('/show-image/{id}', [Productos::class, 'show_image'])->name('productos.show.image');
    Route::put('/update-image/{id}', [Productos::class, 'update_image'])->name('productos.update.image');

    Route::get('/show/{id}', [Productos::class, 'show'])->name('productos.show');
    Route::delete('/destroy/{id}', [Productos::class, 'destroy'])->name('productos.destroy');
    Route::get('/cambiar-estado/{id}/{estado}', [Productos::class, 'estado'])->name('productos.estado');
});

    Route::prefix('cliente')->middleware('auth')->group(function(){
        Route::get('/', [Clientes::class, 'index'])->name('cliente');
        Route::get('/create', [Clientes::class, 'create'])->name('cliente.create');
        Route::post('/store', [Clientes::class, 'store'])->name('cliente.store');
        Route::get('/show/{id}', [Clientes::class, 'show'])->name('cliente.show');
        Route::get('/edit/{id}', [Clientes::class, 'edit'])->name('cliente.edit');
        Route::put('/update/{id}', [Clientes::class, 'update'])->name('cliente.update');
        Route::delete('/destroy/{id}', [Clientes::class, 'destroy'])->name('cliente.destroy');
        Route::put('/change-activo/{id}', [Clientes::class, 'changeActivo'])->name('cliente.changeActivo');
    });

    Route::prefix('usuario')->middleware('auth')->group(function(){
        Route::get('/', [Usuarios::class, 'index'])->name('usuario');
        Route::get('/create', [Usuarios::class, 'create'])->name('usuario.create');
        Route::get('/tbody', [Usuarios::class, 'tbody'])->name('usuario.tbody');
        Route::get('/cambiar-estado/{id}/{estado}', [Usuarios::class, 'estado'])->name('usuario.estado');
        Route::post('/store', [Usuarios::class, 'store'])->name('usuario.store');
        Route::get('/show/{id}', [Usuarios::class, 'show'])->name('usuario.show');
        Route::get('/edit/{id}', [Usuarios::class, 'edit'])->name('usuario.edit');
        Route::put('/update/{id}', [Usuarios::class, 'update'])->name('usuario.update');
        Route::get('/tbody', [Usuarios::class, 'tbody'])->name('usuario.tbody');
        Route::get('/cambiar-estado/{id}/{estado}', [Usuarios::class, 'estado'])->name('usuario.estado');
        Route::get('/cambiar-password/{id}/{password}', [Usuarios::class, 'cambio_password'])->name('usuario.password');
    });

    Route::prefix('proveedor')->middleware('auth')->group(function(){
        Route::get('/', [ProveedorController::class, 'index'])->name('proveedor');
        Route::get('/create', [ProveedorController::class, 'create'])->name('proveedor.create');
        Route::post('/store', [ProveedorController::class, 'store'])->name('proveedor.store');
        Route::get('/show/{id}', [ProveedorController::class, 'show'])->name('proveedor.show');
        Route::get('/edit/{id}', [ProveedorController::class, 'edit'])->name('proveedor.edit');
        Route::put('/update/{id}', [ProveedorController::class, 'update'])->name('proveedor.update');
        Route::delete('/destroy/{id}', [ProveedorController::class, 'destroy'])->name('proveedor.destroy');
    });

Route::prefix('proveedores')->middleware('auth', 'Checkrol:admin')->group(function(){
    Route::get('/', [Proveedores::class, 'index'])->name('proveedores');
    Route::get('/create', [Proveedores::class, 'create'])->name('proveedores.create');
    Route::post('/store', [Proveedores::class, 'store'])->name('proveedores.store');
    Route::get('/edit/{id}', [Proveedores::class, 'edit'])->name('proveedores.edit');
    Route::put('/update/{id}', [Proveedores::class, 'update'])->name('proveedores.update');
    Route::get('/show/{id}', [Proveedores::class, 'show'])->name('proveedores.show');
    Route::delete('/destroy/{id}', [Proveedores::class, 'destroy'])->name('proveedores.destroy');
});

Route::prefix('usuarios')->middleware('auth', 'Checkrol:admin')->group(function(){
    Route::get('/', [Usuarios::class, 'index'])->name('usuarios');
    Route::get('/create', [Usuarios::class, 'create'])->name('usuarios.create');
    Route::post('/store', [Usuarios::class, 'store'])->name('usuarios.store');
    Route::get('/edit/{id}', [Usuarios::class, 'edit'])->name('usuarios.edit');
    Route::put('/update/{id}', [Usuarios::class, 'update'])->name('usuarios.update');
    Route::get('/tbody', [Usuarios::class, 'tbody'])->name('usuarios.tbody');
    Route::get('/cambiar-estado/{id}/{estado}', [Usuarios::class, 'estado'])->name('usuarios.estado');
    Route::get('/cambiar-password/{id}/{password}', [Usuarios::class, 'cambio_password'])->name('usuarios.password');
});

Route::prefix('compras')->middleware('auth', 'Checkrol:admin')->group(function(){
    Route::get('/', [Compras::class, 'index'])->name('compras');
    Route::get('/create/{id_producto}', [Compras::class, 'create'])->name('compras.create');
    Route::post('/store', [Compras::class, 'store'])->name('compras.store');
    Route::get('/edit/{id}', [Compras::class, 'edit'])->name('compras.edit');
    Route::put('/update/{id}', [Compras::class, 'update'])->name('compras.update');
    Route::get('/show/{id}', [Compras::class, 'show'])->name('compras.show');
});
