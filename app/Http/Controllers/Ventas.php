<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Session;

class Ventas extends Controller
{
    public function index(){
        $titulo = 'Nueva Venta';
        $item = Producto::all();
        return view('modules.ventas.index', compact('titulo', 'item'));
    }

    public function agregar_carrito($id_producto){
        $titulo = 'Nueva Venta';
        $item = Producto::findOrFail($id_producto);

        $items_carrito = Session::get('items_carrito', []);

        $items_carrito[] = [
            'id' => $item->id,
            'nombre' => $item->nombre
        ];

        Session::put('items_carrito', $items_carrito);
        $item = Producto::all();
        return view('modules.ventas.index', compact('titulo', 'item'));
    }

    public function quitar_carrito($id_producto){
        $titulo = 'Nueva Venta';
        $items_carrito = Session::get('items_carrito', []);
        unset($items_carrito[$id_producto]);
        Session::put('items_carrito', $items_carrito);
        $item = Producto::all();
        return view('modules.ventas.index', compact('titulo', 'item'));
    }

    public function borrar_carrito()
    {
        Session::forget('items_carrito');
        return to_route('ventas')->with('success', 'Carrito eliminado correctamente');
    }
}
