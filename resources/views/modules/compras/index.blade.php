@extends('layouts.main')

@section('titulo', $titulo)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Compras de productos</h1>
        </div>

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <br>
                            <p>Administrar la compra de productos.</p>

                            <hr>
                            <table id="productoTable" class="table table-responsive datatable table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Producto</th>
                                        <th>Proveedor</th>
                                        <th>Cantidad</th>
                                        <th>Precio de Compra</th>
                                        <th>Precio Total</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            @foreach($usuario as $user)
                                                @if($user->id == $item->user_id)
                                                    <td>{{ $user->name }}</td>
                                                @endif
                                            @endforeach
                                            @foreach($producto as $prod)
                                                @if($prod->id == $item->producto_id)
                                                    <td>{{ $prod->nombre }}</td>
                                                @endif
                                            @endforeach
                                            @foreach($proveedor as $prov)
                                                @if($prov->id == $item->proveedor_id)
                                                    <td>{{ $prov->nombre }}</td>
                                                @endif
                                            @endforeach
                                            <td>{{ $item->cantidad }}</td>
                                            <td>${{ $item->precio_compra }}</td>
                                            <td>${{ $item->cantidad * $item->precio_compra }}</td>
                                            <td>{{ $item->created_at }}</td>
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

        function cambiar_estado(producto_id, estado) {
            console.log(producto_id, estado);
            $.ajax({
                type: "GET",
                url: "producto/cambiar-estado/" + producto_id + "/" + estado,
                success: function(response) {
                    if (response == 1) {
                        swal.fire({
                            icon: 'success',
                            title: 'Estado cambiado correctamente',
                            showConfirmButton: true,
                            timer: 1500
                          })
                        recargar_tbody();
                    }
                },
                error: function(error) {
                    console.log(error);
                    swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error al cambiar el estado',
                      })
                }
            });
        }

        $(document).ready(function(){
            $('.form-check-input').on('change', function(){
                let id = $(this).attr('id');
                let estado = $(this).is(':checked') ? 1 : 0;
                cambiar_estado(id, estado);
            });
        });
    </script>
@endpush
