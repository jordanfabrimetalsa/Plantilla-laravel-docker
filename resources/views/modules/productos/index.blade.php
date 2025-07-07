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

                            <a href="{{ route('producto.create') }}" class="btn btn-primary"><i class="fa-solid fa-circle-plus"></i> Crear Producto</a>
                            <a href="" class="btn btn-primary">Productos con stock minimo</a>
                            <hr>

                            <table id="productoTable" class="table datatable table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Categoria</th>
                                        <th>Proveedor</th>
                                        <th>Nombre</th>
                                        <th>Imagen</th>
                                        <th>Descripcion</th>
                                        <th>Cantidad</th>
                                        <th>Venta</th>
                                        <th>Compra</th>
                                        <th>Activo</th>
                                        <th>Comprar</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $item->nombre }}</td>
                                            <td>{{ $item->descripcion }}</td>
                                            <td>{{ $item->precio }}</td>
                                            <td>{{ $item->cantidad }}</td>
                                            <td>{{ $item->categoria->nombre }}</td>
                                            <td>{{ $item->categoria->nombre }}</td>
                                            <td>{{ $item->categoria->nombre }}</td>
                                            <td>{{ $item->categoria->nombre }}</td>
                                            <td>{{ $item->categoria->nombre }}</td>
                                            <td>{{ $item->categoria->nombre }}</td>
                                            <td>
                                                <a href="{{ route('producto.edit', $item->id) }}" class="btn btn-warning"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{ route('producto.show', $item->id) }}" class="btn btn-danger"><i
                                                        class="fa-solid fa-trash-can"></i></a>
                                            </td>
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

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $('#productoTable').DataTable({
            responsive: true,
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    </script>
@endpush
