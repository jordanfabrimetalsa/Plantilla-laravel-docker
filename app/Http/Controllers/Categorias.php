<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Categorias extends Controller
{
    public function index()
    {
        $titulo = 'Categorias';
        $items = Categoria::all();
        return view('modules.categorias.index', compact('titulo', 'items'));
    }

    public function create()
    {
        $titulo = 'Crear Categoria';
        return view('modules.categorias.create', compact('titulo'));
    }

    public function store(Request $request)
    {
        try {
            $item = new Categoria();
            $item->user_id = Auth::user()->id;
            $item->nombre = $request->nombre;
            $item->save();
            return to_route('categoria')->with('success', 'Categoria creada exitosamente');
        } catch (\Exception $e) {
            return to_route('categoria')->with('error', 'Error al crear la categoria');
        }
    }

    public function show(string $id)
    {
        $titulo = 'Eliminar Categoria';
        $item = Categoria::find($id);
        return view('modules.categorias.show', compact('item', 'titulo'));
    }

    public function edit(string $id)
    {
        $item = Categoria::find($id);
        $titulo = 'Editar Categoria';
        return view('modules.categorias.edit', compact('item', 'titulo'));
    }

    public function update(Request $request, string $id)
    {
        try {
            $item = Categoria::find($id);
            $item->nombre = $request->nombre;
            $item->update();
            return to_route('categoria')->with('success', 'Categoria actualizada exitosamente');
        } catch (\Exception $e) {
            return to_route('categoria')->with('error', 'Error al actualizar la categoria');
        }
    }

    public function destroy(string $id)
    {
        try {
            $item = Categoria::find($id);
            $item->delete();
            return to_route('categoria')->with('success', 'Categoria eliminada exitosamente');
        } catch (\Exception $e) {
            return to_route('categoria')->with('error', 'Error al eliminar la categoria');
        }
    }
}
