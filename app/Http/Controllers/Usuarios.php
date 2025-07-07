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
        try{
            $usuario = New User();

            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'activo' => 'required',
                'rol' => 'required',
            ]);

            $usuario->name = $request->name;
            $usuario->email = $request->email;
            $usuario->password = Hash::make($request->password);
            $usuario->rol = $request->rol == 'admin' ? 'admin' : 'user';
            $usuario->activo = $request->activo == '1' ? true : false;
            $usuario->save();
            return redirect()->route('usuario')->with('success', 'Usuario creado correctamente');
        }catch(Exception $e){
            return redirect()->route('usuario')->with('error', $e->getMessage());
        }
    }
    public function show(string $id)
    {
        $item = User::findOrFail($id);
        $titulo = 'Eliminar Usuario';
        return view('modules.usuarios.show', compact('item', 'titulo'));
    }

    public function edit(string $id)
    {
        $item = User::findOrFail($id);
        $titulo = 'Editar Usuario';
        return view('modules.usuarios.edit', compact('item', 'titulo'));
    }

    public function update(Request $request, string $id)
    {
        try{
            $usuario = User::findOrFail($id);
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'activo' => 'required',
                'rol' => 'required',
            ]);

            $usuario->name = $request->name;
            $usuario->email = $request->email;
            $usuario->password = Hash::make($request->password);
            $usuario->rol = $request->rol == 'admin' ? 'admin' : 'user';
            $usuario->activo = $request->activo == '1' ? true : false;
            $usuario->save();
            return redirect()->route('usuario')->with('success', 'Usuario actualizado correctamente');
        }catch(Exception $e){
            return redirect()->route('usuario')->with('error', $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try{
            $usuario = User::findOrFail($id);
            $usuario->delete();
            return redirect()->route('usuario')->with('success', 'Usuario eliminado correctamente');
        }catch(Exception $e){
            return redirect()->route('usuario')->with('error', $e->getMessage());
        }
    }

    public function tbody(){
        $item = User::all();
        return view('modules.usuarios.tbody', compact('item'));
    }

    public function estado($id, $estado){
        try{
            $usuario = User::findOrFail($id);
            $usuario->activo = $estado;
            return $usuario->save();
        }catch(Exception $e){
            return redirect()->route('usuario')->with('error', $e->getMessage());
        }
    }

    public function cambio_password($id, $password){
        try{
            $usuario = User::findOrFail($id);
            $usuario->password = Hash::make($password);
            return $usuario->save();
        }catch(Exception $e){
            return redirect()->route('usuario')->with('error', $e->getMessage());
        }
    }
}
