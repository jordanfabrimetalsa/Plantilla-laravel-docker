@extends('layouts.main')

@section('titulo', $titulo)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Detalle de Ventas</h1>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Crear una nueva venta</h5>

                            <hr>
                            <table id="ventasTable" class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Nombre</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Agregar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($item as $items)
                                        <tr>
                                            <td>{{ $items->codigo }}</td>
                                            <td>{{ $items->nombre }}</td>
                                            <td>
                                                {{ $items->cantidad }}
                                            </td>
                                            <td>{{ $items->precio_venta }}</td>
                                            <td>
                                                <a href="{{ route('ventas.agregar-carrito', $items->id) }}" class="btn btn-success">Agregar</a>
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

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Crear una nueva venta</h5>

                            @if (Session::has('items_carrito'))
                                <table id="carritoTable" class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Session::get('items_carrito') as $item)
                                            <tr>
                                                <td>{{ $item['id'] }}</td>
                                                <td>{{ $item['nombre'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                                <a href="{{ route('ventas.borrar-carrito') }}" class="btn btn-danger">Borrar Carrito</a>
                            @else
                                <p>No hay productos en el carrito</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#ventasTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"
                },
                "pageLength": 2
            });
        });
    </script>
@endpush

