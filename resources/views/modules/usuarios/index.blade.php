@extends('layouts.main')

@section('titulo', 'Usuarios')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Usuarios</h1>
        </div>

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                Usuarios
                            </div>
                            <p>Administrar los usuarios de nuestro sistema.</p>
                            <a href="{{ route('usuario.create') }}" class="btn btn-primary btn-sm rounded"><i
                                    class="fa-solid fa-plus"></i></a>
                            <hr>

                            <table class="table table-bordered table-responsive datatable" id="usuariosTable">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Contraseña</th>
                                        <th>Activo</th>
                                        <th>Rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-usuarios">
                                    @include('modules.usuarios.tbody')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('modules.usuarios.modal_cambiar_password')
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        var usuariosTable;

        function recargar_tbody(){
            $.ajax({
                type: "GET",
                url: "{{ route('usuario.tbody')}}",
                success: function(respuesta){
                    $('#tbody-usuarios').html(respuesta);
                    // Reinicializar DataTables
                    if (usuariosTable) {
                        usuariosTable.destroy();
                    }
                    usuariosTable = $('#usuariosTable').DataTable({
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
                        },
                    });
                    // Reinicializar evento del checkbox después de recargar
                    $('.form-check-input').on('change', function(){
                        let id = $(this).attr("id");
                        let estado = $(this).is(":checked") ? 1 : 0;
                        cambiar_estado(id, estado);
                    });
                }
            })
        }

        function cambiar_estado(id, estado){
            console.log(id, estado);
            $.ajax({
                type: "GET",
                url: "usuario/cambiar-estado/" + id + '/' + estado,
                success: function(respuesta) {
                    recargar_tbody();
                },
                error: function(xhr, status, error) {
                    alert('Error al cambiar el estado: ' + error);
                }
            })
        }

        $(document).ready(function(){
            usuariosTable = $('#usuariosTable').DataTable({
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
                },
            });
            // Inicializar evento del checkbox al cargar la página
            $('.form-check-input').on('change', function(){
                let id = $(this).attr("id");
                let estado = $(this).is(":checked") ? 1 : 0;
                cambiar_estado(id, estado);
            });
        })
    </script>

@endpush
