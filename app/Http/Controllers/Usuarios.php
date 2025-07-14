<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;
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
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'activo' => 'required',
                'rol' => 'required',
            ]);

            $usuario = New User();
            $usuario->name = $request->name;
            $usuario->email = $request->email;
            $usuario->password = Hash::make($request->password);
            $usuario->rol = $request->rol == 'admin' ? 'admin' : 'user';
            $usuario->activo = $request->activo == '1' ? true : false;
            $usuario->user_id = Auth::user()->id;
            $usuario->save();
            return redirect()->route('usuario')->with('success', 'Se ha creado exitosamente.');
            
        }catch(Exception $e){
            return redirect()->route('usuario')->with('error', 'Error al crear el usuario.');
        }
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

    public function cambio_password($id, $password){
        $item = User::findOrFail($id);
        $item->password = Hash::make($password);
        return $item->save();
    }
}
