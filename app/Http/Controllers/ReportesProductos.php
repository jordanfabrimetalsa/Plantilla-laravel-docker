<?php

namespace App\Http\Controllers;

use App\Models\Reportes_productos;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ReportesProductos extends Controller
{

    public function index()
    {
        $titulo = 'Reportes Productos';
        $items = Producto::all();
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();
        return view('modules.reportes_productos.index', compact('titulo', 'items', 'categorias', 'proveedores'));
    }
 
    public function falta_stock()
    {
        $titulo = 'Falta Stock';
        $items = Producto::select(
            'productos.*',
            'categorias.nombre as categoria',
            'proveedores.nombre as proveedor',
            'imagenes.ruta as imagen_producto',
            'imagenes.nombre as nombre_producto'
        )
        ->join('categorias', 'productos.categoria_id', '=', 'categorias.id')
        ->join('proveedores', 'productos.proveedor_id', '=', 'proveedores.id')
        ->join('imagenes', 'productos.id', '=', 'imagenes.producto_id')
        ->whereBetween('productos.cantidad', [0, 1])
        ->get();
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();
        return view('modules.reportes_productos.index', compact('titulo', 'items', 'categorias', 'proveedores'));
    }

 
}
