<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Productos extends Controller
{
    public function index()
    {
        $titulo = 'Productos';
        $items = Producto::all();
        $categorias = Categoria::all();
        return view('modules.productos.index', compact('titulo', 'items', 'categorias'));
    }

    public function create()
    {
        $titulo = 'Agregar Producto';
        $categorias = Categoria::all();
        return view('modules.productos.create', compact('titulo', 'categorias'));
    }

    public function store(Request $request)
    {
        $item = new Producto();
        $item->user_id = Auth::user()->id;
        $item->nombre = $request->nombre;
        $item->descripcion = $request->descripcion;
        $item->precio = $request->precio;
        $item->cantidad = $request->cantidad;
        $item->categoria_id = $request->categoria_id;
        $item->save();
        return to_route('producto');
    }

    public function show(string $id)
    {
        $titulo = 'Eliminar Producto';
        $item = Producto::find($id);
        $categorias = Categoria::all();
        return view('modules.productos.show', compact('item', 'titulo', 'categorias'));
    }

    public function edit(string $id)
    {
        $item = Producto::find($id);
        $titulo = 'Editar Producto';    
        $categorias = Categoria::all();
        return view('modules.productos.edit', compact('item', 'titulo', 'categorias'));
    }

    public function update(Request $request, string $id)
    {
        $item = Producto::find($id);
        $item->nombre = $request->nombre;
        $item->descripcion = $request->descripcion;
        $item->precio = $request->precio;
        $item->cantidad = $request->cantidad;
        $item->categoria_id = $request->categoria_id;
        $item->update();
        return to_route('producto');
    }   

    public function destroy(string $id)
    {
        $item = Producto::find($id);
        $item->delete();
        return to_route('producto');
    }
}
