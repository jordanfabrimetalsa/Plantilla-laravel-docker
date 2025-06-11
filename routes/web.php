<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Categorias;
use App\Http\Controllers\Clientes;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetalleVentas;
use App\Http\Controllers\Productos;
use App\Http\Controllers\Usuarios;
use App\Http\Controllers\Ventas;
use Illuminate\Support\Facades\Route;

Route::get('/crear-admin', [AuthController::class, 'crearAdmin'])->name('crear-admin');

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/logear', [AuthController::class, 'logear'])->name('logear');

Route::middleware('auth')->group(function(){
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('ventas')->group(function(){
        Route::get('/nueva-venta', [Ventas::class, 'index'])->name('nueva-venta');
    });

    Route::prefix('detalle')->group(function(){
        Route::get('/detalle-venta', [DetalleVentas::class, 'index'])->name('detalle-venta');
    });

    Route::prefix('categoria')->group(function(){
        Route::get('/', [Categorias::class, 'index'])->name('categoria');
    });

    Route::prefix('producto')->group(function(){
        Route::get('/', [Productos::class, 'index'])->name('producto');
    });

    Route::prefix('cliente')->group(function(){
        Route::get('/', [Clientes::class, 'index'])->name('cliente');
    });

    Route::prefix('usuario')->group(function(){
        Route::get('/', [Usuarios::class, 'index'])->name('usuario');
    });

});





