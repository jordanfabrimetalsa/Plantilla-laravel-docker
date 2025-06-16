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
        $item = new Categoria();
        $item->user_id = Auth::user()->id;
        $item->nombre = $request->nombre;
        $item->save();
        return to_route('categoria');
    }


    public function show(string $id)
    {
        $titulo = 'Eliminar Categoria';
        $item = Categoria::find($id);
        return view('modules.categorias.show', compact('item', 'titulo'));
    }


    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Categoria::find($id);
        $item->delete();
        return to_route('categoria');
    }
}
