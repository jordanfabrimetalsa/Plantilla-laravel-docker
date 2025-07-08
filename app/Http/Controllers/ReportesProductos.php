<?php

namespace App\Http\Controllers;

use App\Models\Reportes_productos;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ReportesProductos extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titulo = 'Reportes Productos';
        $items = Producto::all();
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();
        return view('modules.reportes_productos.index', compact('titulo', 'items', 'categorias', 'proveedores'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reportes_productos $reportes_productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reportes_productos $reportes_productos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reportes_productos $reportes_productos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reportes_productos $reportes_productos)
    {
        //
    }
}
