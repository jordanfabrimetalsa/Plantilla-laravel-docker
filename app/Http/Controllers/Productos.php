<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Productos extends Controller
{
    public function index()
    {
        $titulo = 'Productos';
        $items = Producto::all();
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();
        return view('modules.productos.index', compact('titulo', 'items', 'categorias', 'proveedores'));
    }

    public function create()
    {
        $titulo = 'Agregar Producto';
        $categorias = Categoria::all();
        $proveedor = Proveedor::all();
        return view('modules.productos.create', compact('titulo', 'categorias', 'proveedor'));
    }

    public function store(Request $request)
    {
        try{
            $item = new Producto();
            $item->user_id = Auth::user()->id;
            $item->categoria_id = $request->categoria_id;
            $item->proveedor_id = $request->proveedor_id;
            $item->nombre = $request->nombre;
            $item->descripcion = $request->descripcion;
            $item->save();
            return to_route('producto')->with('success', 'Ha sido creado con exito.');
        }catch(Exception $e){
            return to_route('producto')->with('error', 'No ha podido ser llevado a cabo.');
        }

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
        $item = Producto::with('categoria')->find($id);
        $titulo = 'Editar Producto';
        $categorias = Categoria::all();
        return view('modules.productos.edit', compact('item', 'titulo', 'categorias'));
    }

    public function update(Request $request, string $id)
    {
        try{
            $item = Producto::find($id);
            $item->nombre = $request->nombre;
            $item->descripcion = $request->descripcion;
            $item->precio = $request->precio;
            $item->cantidad = $request->cantidad;
            $item->categoria_id = $request->categoria_id;
            $item->update();
            return to_route('producto')->with('success', 'Ha podido ser llevado a cabo con exito!');
        }catch(Exception $e){
            return to_route('producto')->with('error', 'No ha podido ser llevado a cabo');
        }

    }

    public function destroy(string $id)
    {
        try{
            $item = Producto::find($id);
            $item->delete();
            return to_route('producto')->with('success', 'Se ha eliminado exitosamente.');
        }catch(Exception $e){
            return to_route('error')->with('error', 'No se ha podido eliminar correctamente');
        }
    }
}
