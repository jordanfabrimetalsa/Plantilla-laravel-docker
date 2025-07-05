<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        $usuario = New User();
        $request->validate([
            'name' => 'required',
            'apellido' => 'required',
            'password' => 'required',
            'activo' => 'required',
            'rol' => 'required',
        ]);

        $usuario->password = Hash::make($request->password);
        $usuario->rol = $request->rol == 'admin' ? 'admin' : 'user';
        $usuario->activo = $request->activo == '1' ? true : false;
        $usuario->user_id = Auth::user()->id;
        $usuario->save();
        return redirect()->route('usuario')->with('success', 'Usuario creado exitosamente');
    }
    public function show(string $id)
    {
        $item = User::find($id);
        $titulo = 'Eliminar Usuario';
        return view('modules.usuarios.show', compact('item', 'titulo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = User::find($id);
        $titulo = 'Editar Usuario';
        return view('modules.usuarios.edit', compact('item', 'titulo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $item = User::find($id);
            $item->name = $request->name;
            $item->apellido = $request->apellido;
            $item->password = bcrypt($request->password);
            $item->activo = $request->activo == '1' ? true : false;
            $item->rol = $request->rol == 'admin' ? 'admin' : 'user';
            $item->user_id = Auth::user()->id;
            $item->update();
            return redirect()->route('usuario')->with('success', 'Usuario actualizado exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('usuario')->with('error', 'Error al actualizar el usuario');
        }
    }

    public function destroy(string $id)
    {
        try {
            $item = User::find($id);
            $item->delete();
            return redirect()->route('usuario')->with('success', 'Usuario eliminado exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('usuario')->with('error', 'Error al eliminar el usuario');
        }
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
