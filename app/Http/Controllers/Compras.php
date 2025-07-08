<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Compra;
use App\Models\User;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Compras extends Controller
{
    public function index()
    {
        $titulo = 'Compras';
        $items = Compra::all();
        $producto = Producto::all();
        $usuario = User::all();
        $proveedor = Proveedor::all();
        return view('modules.compras.index', compact('titulo', 'items', 'producto', 'usuario', 'proveedor'));
    }


    public function create($id)
    {
        $titulo = 'Comprar Producto';
        $item = Producto::find($id);
        return view('modules.compras.create', compact('titulo', 'id', 'item'));
    }


    public function store(Request $request)
    {
        try{
            $request->validate([
                'cantidad' => 'required|numeric',
                'precio_compra' => 'required|numeric',
            ]);

            $id = $request->producto_id;
            $proveedor = Producto::find($id);
            $idproveedor = $proveedor->proveedor_id;

            $item = new Compra();
            $item->proveedor_id = $idproveedor;
            $item->user_id = Auth::user()->id;
            $item->producto_id = $id;
            $item->cantidad = $request->cantidad;
            $item->precio_compra = $request->precio_compra;
            if($item->save()){
                $item = Producto::find($id);
                $item->cantidad = $item->cantidad + $request->cantidad;
                $item->precio_compra = $request->precio_compra;
                $item->save();
            }
            return redirect()->route('producto')->with('success', 'Producto comprado correctamente');
        }catch(Exception $e){
            return redirect()->back()->with('error', 'Error al comprar el producto'.$e->getMessage());
        }
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
