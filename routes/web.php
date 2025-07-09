<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Categorias;
use App\Http\Controllers\Proveedores;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetalleVentas; 
use App\Http\Controllers\Productos;
use App\Http\Controllers\ReportesProductos;
use App\Http\Controllers\Usuarios;
use App\Http\Controllers\Ventas;
use App\Http\Controllers\Compras;
use Illuminate\Support\Facades\Route;

Route::get('/crear-admin', [AuthController::class, 'crearAdmin'])->name('crear-admin');

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/logear', [AuthController::class, 'logear'])->name('logear');

Route::middleware('auth')->group(function(){
    Route::get('/home', [DashboardController::class, 'index'])->name('home');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('ventas')->middleware('auth')->group(function(){
        Route::get('/', [Ventas::class, 'index'])->name('ventas');
        Route::get('/agregar-carrito/{id}', [Ventas::class, 'agregar_carrito'])->name('ventas.agregar-carrito');
        Route::get('/borrar-carrito', [Ventas::class, 'borrar_carrito'])->name('ventas.borrar-carrito');
    });

    Route::prefix('detalle')->middleware('auth')->group(function(){
        Route::get('/detalle-venta', [DetalleVentas::class, 'index'])->name('detalle-venta');
    });

    Route::prefix('categoria')->middleware('auth')->group(function(){
        Route::get('/', [Categorias::class, 'index'])->name('categoria');
        Route::get('/create', [Categorias::class, 'create'])->name('categoria.create');
        Route::post('/store', [Categorias::class, 'store'])->name('categoria.store');
        Route::get('/show/{id}', [Categorias::class, 'show'])->name('categoria.show');
        Route::get('/edit/{id}', [Categorias::class, 'edit'])->name('categoria.edit');
        Route::put('/update/{id}', [Categorias::class, 'update'])->name('categoria.update');
        Route::delete('/destroy/{id}', [Categorias::class, 'destroy'])->name('categoria.destroy');
    });

    Route::prefix('producto')->middleware('auth')->group(function(){
        Route::get('/', [Productos::class, 'index'])->name('producto');
        Route::get('/create', [Productos::class, 'create'])->name('producto.create');
        Route::post('/store', [Productos::class, 'store'])->name('producto.store');
        Route::get('/show/{id}', [Productos::class, 'show'])->name('producto.show');
        Route::get('/edit/{id}', [Productos::class, 'edit'])->name('producto.edit');
        Route::put('/update/{id}', [Productos::class, 'update'])->name('producto.update');
        
        Route::delete('/destroy/{id}', [Productos::class, 'destroy'])->name('producto.destroy');
        Route::get('/cambiar-estado/{id}/{estado}', [Productos::class, 'estado'])->name('producto.estado');
        
        Route::post('/update-image/{id}', [Productos::class, 'update_image'])->name('producto.update-image');
        Route::get('/show-image/{id}', [Productos::class, 'show_image'])->name('producto.show-image');
    });

    Route::prefix('productos_reporte')->middleware('auth')->group(function(){
        Route::get('/', [ReportesProductos::class, 'index'])->name('productos_reporte');
        Route::get('/falta-stock', [ReportesProductos::class, 'falta_stock'])->name('productos_reporte.falta_stock');
    });

    Route::prefix('proveedor')->middleware('auth')->group(function(){
        Route::get('/', [proveedores::class, 'index'])->name('proveedor');
        Route::get('/create', [proveedores::class, 'create'])->name('proveedor.create');
        Route::post('/store', [proveedores::class, 'store'])->name('proveedor.store');
        Route::get('/show/{id}', [proveedores::class, 'show'])->name('proveedor.show');
        Route::get('/edit/{id}', [proveedores::class, 'edit'])->name('proveedor.edit');
        Route::put('/update/{id}', [proveedores::class, 'update'])->name('proveedor.update');
        Route::delete('/destroy/{id}', [proveedores::class, 'destroy'])->name('proveedor.destroy');
        Route::put('/change-activo/{id}', [proveedores::class, 'changeActivo'])->name('proveedor.changeActivo');
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

    Route::prefix('compras')->middleware('auth')->group(function(){
        Route::get('/', [Compras::class, 'index'])->name('compras');
        Route::get('/create/{id}', [Compras::class, 'create'])->name('compras.create');
        Route::post('/store', [Compras::class, 'store'])->name('compras.store');
    });
});





