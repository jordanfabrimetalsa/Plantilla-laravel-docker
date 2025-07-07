<?php


namespace App\Http\Controllers;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class proveedores extends Controller
{
    public function index()
    {
        try{
            $titulo = 'proveedores';
            $items = Proveedor::all();
            return view('modules.proveedores.index', compact('titulo', 'items'));
        }catch(Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    public function create()
    {
        try{
            $titulo = 'Agregar Proveedor';
            return view('modules.proveedores.create', compact('titulo'));
        }catch(Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    public function store(Request $request)
    {

        try{
            $item = new Proveedor();

            $request->validate([
                'nombre' => 'required',
                'apellido' => 'required',
                'email' => 'required',
                'telefono' => 'required',
                'direccion' => 'required',
                'activo' => 'required',
                'rol' => 'required',
            ]);

            $item->user_id = Auth::user()->id;
            $item->nombre = $request->nombre;
            $item->apellido = $request->apellido;
            $item->email = $request->email;
            $item->telefono = $request->telefono;
            $item->direccion = $request->direccion;
            $item->activo = $request->activo;
            $item->rol = $request->rol;
            $item->save();
            
            return redirect()->route('proveedor')->with('success', 'Proveedor agregado correctamente');
        }catch(Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    public function show(string $id)
    {
        try{
            $titulo = 'Eliminar Proveedor';
            $item = Proveedor::findOrFail($id);
            return view('modules.proveedores.show', compact('item', 'titulo'));
        }catch(Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit(string $id)
    {
        try{
            $item = Proveedor::findOrFail($id);
            $titulo = 'Editar Proveedor';
            return view('modules.proveedores.edit', compact('item', 'titulo'));
        }catch(Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, string $id)
    {
        try{
            $item = Cliente::findOrFail($id);

            $request->validate([
                'nombre' => 'required',
                'apellido' => 'required',
                'email' => 'required',
                'telefono' => 'required',
                'direccion' => 'required',
                'activo' => 'required',
                'rol' => 'required',
            ]);

            $item->nombre = $request->nombre;
            $item->apellido = $request->apellido;
            $item->email = $request->email;
            $item->telefono = $request->telefono;
            $item->direccion = $request->direccion;
            $item->activo = $request->activo;
            $item->rol = $request->rol;
            $item->update();

            return to_route('proveedor')->with('success', 'Proveedor actualizado correctamente');
        }catch(Exception $e){
            return back()->with('error', $e->getMessage());
        }   
    }

    public function destroy(string $id)
    {
        try{
            $item = Cliente::findOrFail($id);
            $item->delete();    
            return to_route('proveedor')->with('success', 'Proveedor eliminado correctamente');
        }catch(Exception $e){
            return back()->with('error', $e->getMessage());
        }   
    }

    public function estado(string $id, string $estado)
    {
        try{
            $item = Proveedor::findOrFail($id);
            $item->activo = $estado;
            $item->save();
            return to_route('proveedor')->with('success', 'Proveedor actualizado correctamente');
        }catch(Exception $e){
            return back()->with('error', $e->getMessage());
        }   
    }   


}
