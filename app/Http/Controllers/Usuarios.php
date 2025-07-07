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
            'email' => 'required',
            'password' => 'required',
            'activo' => 'required',
            'rol' => 'required',
        ]);

        $request->password = Hash::make($request->password);
        $request->rol = $request->rol == 'admin' ? 'admin' : 'user';
        $request->activo = $request->activo == '1' ? true : false;
        $request->user_id = Auth::user()->id;
        $request->save();
        return redirect()->route('usuario');
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
        $usuario = User::find($id);
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
        $request->save();
        return redirect()->route('usuario');
    }

    public function destroy(string $id)
    {
        $usuario = User::find($id);
        $usuario->delete();
        return redirect()->route('usuario');
    }
}
