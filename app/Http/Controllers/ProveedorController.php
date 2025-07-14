<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{

    public function index()
    {
        $item = Proveedor::all();
        return view('modules.proveedores.index', compact('item'));
    }


    public function create()
    {
        return view('modules.proveedores.create');
    }


    public function store(Request $request)
    {
        
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
