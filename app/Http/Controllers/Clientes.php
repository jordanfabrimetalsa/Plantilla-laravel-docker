<?php


namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Clientes extends Controller
{
    public function index()
    {
        $titulo = 'Clientes';
        $items = Cliente::all();
        return view('modules.clientes.index', compact('titulo', 'items'));
    }

    public function create()
    {
        $titulo = 'Agregar Cliente';
        return view('modules.clientes.create', compact('titulo'));
    }

    public function store(Request $request)
    {
        $item = new Cliente();
        $item->user_id = Auth::user()->id;
        $item->nombre = $request->nombre;
        $item->apellido = $request->apellido;
        $item->email = $request->email;
        $item->telefono = $request->telefono;
        $item->direccion = $request->direccion;
        $item->activo = $request->activo;
        $item->rol = $request->rol;
        $item->save();
        return to_route('cliente');
    }

    public function show(string $id)
    {
        $titulo = 'Eliminar Cliente';
        $item = Cliente::find($id);
        return view('modules.clientes.show', compact('item', 'titulo'));
    }

    public function edit(string $id)
    {
        $item = Cliente::find($id);
        $titulo = 'Editar Cliente';
        return view('modules.clientes.edit', compact('item', 'titulo'));
    }

    public function update(Request $request, string $id)
    {
        $item = Cliente::find($id);
        $item->nombre = $request->nombre;
        $item->apellido = $request->apellido;
        $item->email = $request->email;
        $item->telefono = $request->telefono;
        $item->direccion = $request->direccion;
        $item->activo = $request->activo;
        $item->rol = $request->rol;
        $item->update();
        return to_route('cliente');
    }   

    public function destroy(string $id)
    {
        $item = Cliente::find($id);
        $item->delete();
        return to_route('cliente');
    }
}
