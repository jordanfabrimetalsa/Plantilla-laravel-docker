<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;
use App\Models\Imagen;
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
        $imagenes = Imagen::all();
        return view('modules.productos.index', compact('titulo', 'items', 'categorias', 'proveedores', 'imagenes'));
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
            $id_producto = $item->id;

            if($id_producto > 0){
                if($this->subir_imagen($request, $id_producto)){
                    return to_route('producto')->with('success', 'Ha sido creado con exito.');
                }else{
                    return to_route('producto')->with('error', 'No ha subido la imagen.');
                }
            }
        }catch(Exception $e){
            return to_route('producto')->with('error', 'No ha podido ser llevado a cabo.');
        }
    }

    public function subir_imagen(Request $request, $id_producto)
    {
        try{
            $rutaImagen = $request->file('imagen')->store('imagenes', 'public');
            $nombreImagen = basename($rutaImagen);
            $imagen = new Imagen();
            $imagen->producto_id = $id_producto;
            $imagen->nombre = $nombreImagen;
            $imagen->ruta = $rutaImagen;
            $imagen->save();

            return true;
        }catch(Exception $e){
            return false;
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
        $proveedor = Proveedor::all();
        return view('modules.productos.edit', compact('item', 'titulo', 'categorias', 'proveedor'));
    }

    public function update(Request $request, string $id)
    {
        try{
            $item = Producto::find($id);
            $item->nombre = $request->nombre;
            $item->descripcion = $request->descripcion;
            $item->precio_venta = $request->precio_venta;
            $item->categoria_id = $request->categoria_id;
            $item->proveedor_id = $request->proveedor_id;
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

    public function estado(string $id, string $estado)
    {
        try{
            $item = Producto::findOrFail($id);
            $item->activo = $estado;
            $item->save();
            return to_route('producto')->with('success', 'Producto actualizado correctamente');
        }catch(Exception $e){
            return back()->with('error', $e->getMessage());
        }   
    }   

    public function update_image(string $id)
    {
        $item = Imagen::find($id);
        $titulo = 'Editar Imagen';
        return view('modules.productos.update-image', compact('item', 'titulo'));
    }

    public function show_image(string $id)
    {
        $item = Imagen::find($id);
        $titulo = 'Ver Imagen';
        return view('modules.productos.show-images', compact('item', 'titulo'));
    }

}
