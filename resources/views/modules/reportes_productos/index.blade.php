@extends('layouts.main')

@section('titulo', $titulo)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Productos</h1>
        </div>

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <br>
                            <p>Administrar los productos de nuestro sistema.</p>
                            <hr>
                            <div class="row mb-2">
                                <div class="col text-end">
                                    <a href="{{ route('productos_reporte.falta_stock') }}" class="btn btn-primary btn-sm">
                                       <i class="fa-solid fa-filter"></i> Productos con cantidad 1 o 0
                                    </a>
                                </div>
                            </div>

                            <table id="productoTable" class="table table-responsive datatable table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Categoria</th>
                                        <th>Proveedor</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Cantidad</th>
                                        <th>Venta</th>
                                        <th>Compra</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            @foreach($categorias as $categoria)
                                                @if($categoria->id == $item->categoria_id)
                                                    <td>{{ $categoria->nombre }}</td>
                                                @endif
                                            @endforeach
                                            @foreach($proveedores as $proveedor)
                                                @if($proveedor->id == $item->proveedor_id)
                                                    <td>{{ $proveedor->nombre }}</td>
                                                @endif
                                            @endforeach
                                            <td>{{ $item->nombre }}</td>
                                            <td>{{ $item->descripcion }}</td>
                                            <td>{{ $item->cantidad }}</td>
                                            <td>{{ $item->precio_compra }}</td>
                                            <td>{{ $item->precio_venta }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
