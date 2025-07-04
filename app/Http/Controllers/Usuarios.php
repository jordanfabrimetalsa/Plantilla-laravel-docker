<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Usuarios extends Controller
{
    public function index()
    {
        $item = User::all();
        return view('modules.usuarios.index', compact('item'));
    }

    public function create()
    {
        $titulo = 'Agregar Usuario';
        return view('modules.usuarios.create', compact('titulo'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'activo' => 'required',
            'rol' => 'required',
        ]);

        $request->password = Hash::make($request->password);
        $request->rol = $request->rol == 'admin' ? 'admin' : 'user';
        $request->activo = $request->activo == '1' ? true : false;
        $request->user_id = Auth::user()->id;
        User::create($request->all());
        return redirect()->route('usuario')->with('success', 'Se ha creado exitosamente.');
    }
    public function show(string $id)
    {
        $item = User::find($id);
        $titulo = 'Eliminar Usuario';
        return view('modules.usuarios.show', compact('item', 'titulo'));
    }

    public function edit(string $id)
    {
        $item = User::find($id);
        $titulo = 'Editar Usuario';
        return view('modules.usuarios.edit', compact('item', 'titulo'));
    }

    public function update(Request $request, string $id)
    {
        $item = User::find($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'activo' => 'required',
            'rol' => 'required',
        ]);
        $item->name = $request->name;
        $item->email = $request->email;
        $item->activo = $request->activo == '1' ? true : false;
        $item->rol = $request->rol == 'admin' ? 'admin' : 'cajero';
        $item->update();
        return redirect()->route('usuario');
    }

    public function destroy(string $id)
    {
        $item = User::find($id);
        $item->delete();
        return redirect()->route('usuario');
    }

    public function tbody(){
        $item = User::all();
        return view('modules.usuarios.tbody', compact('item'));
    }

    public function estado($id, $estado){
        $item = User::find($id);
        $item->activo = $estado;
        return $item->save();
    }
}
