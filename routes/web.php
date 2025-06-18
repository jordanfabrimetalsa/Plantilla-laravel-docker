<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Categorias;
use App\Http\Controllers\Clientes;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetalleVentas;
use App\Http\Controllers\Productos;
use App\Http\Controllers\Usuarios;
use App\Http\Controllers\Ventas;
use App\Models\Categoria;
use Illuminate\Support\Facades\Route;

Route::get('/crear-admin', [AuthController::class, 'crearAdmin'])->name('crear-admin');

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/logear', [AuthController::class, 'logear'])->name('logear');

Route::middleware('auth')->group(function(){
    Route::get('/home', [DashboardController::class, 'index'])->name('home');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('ventas')->middleware('auth')->group(function(){
        Route::get('/nueva-venta', [Ventas::class, 'index'])->name('nueva-venta');
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
    });
    
    Route::prefix('cliente')->middleware('auth')->group(function(){
        Route::get('/', [Clientes::class, 'index'])->name('cliente');
        Route::get('/create', [Clientes::class, 'create'])->name('cliente.create');
        Route::post('/store', [Clientes::class, 'store'])->name('cliente.store');
        Route::get('/show/{id}', [Clientes::class, 'show'])->name('cliente.show');
        Route::get('/edit/{id}', [Clientes::class, 'edit'])->name('cliente.edit');
        Route::put('/update/{id}', [Clientes::class, 'update'])->name('cliente.update');
        Route::delete('/destroy/{id}', [Clientes::class, 'destroy'])->name('cliente.destroy');
    });

    Route::prefix('usuario')->middleware('auth')->group(function(){
        Route::get('/', [Usuarios::class, 'index'])->name('usuario');
    });
});





