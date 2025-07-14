<?php

namespace App\Http\Controllers;

use App\Models\User;
<<<<<<< HEAD
use Illuminate\Support\Facades\Hash;
use Exception;
=======
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Hash;

>>>>>>> 5f4769cae9fa751a7edb7fe3e5ebfb7c25fb566b
class Usuarios extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titulo = "Usuarios";
        $items = User::all();
        return view('modules.usuarios.index', compact('items','titulo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titulo = 'Usuario nuevo';
        return view('modules.usuarios.create', compact('titulo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
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
=======
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'activo' => true,
                'rol' => $request->rol
            ]);
    
            return to_route('usuarios')->with('success', 'Usuario guardado con exito!');
            
        } catch (Exception $e) {
            return to_route('usuarios')->with('error', 'Error al guardar usuario!' . $e->getMessage());
>>>>>>> 5f4769cae9fa751a7edb7fe3e5ebfb7c25fb566b
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = User::find($id);
        $titulo = "Editar usuario";
        return view('modules.usuarios.edit', compact('item', 'titulo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
<<<<<<< HEAD
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
=======
        try {
            $item = User::find($id);
            $item->name = $request->name;
            $item->email = $request->email;
            $item->rol = $request->rol;
            $item->save();
            return to_route('usuarios')->with('success', 'Usuario actualizado con exito!');
        }  catch (Exception $e) {
            return to_route('usuarios')->with('error', 'Error al actualizar usuario!' . $e->getMessage());
        }
>>>>>>> 5f4769cae9fa751a7edb7fe3e5ebfb7c25fb566b
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

    public function tbody(){
        $items = User::all();
        return view('modules.usuarios.tbody', compact('items'));
    }

    public function estado($id, $estado) {
        $item = User::find($id);
        $item->activo = $estado;
        return $item->save();
    }

    public function cambio_password($id, $password){
        $item = User::find($id);
        $item->password = Hash::make($password);
        return $item->save();
    }

}
