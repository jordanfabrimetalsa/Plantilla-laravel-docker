@extends('layouts.main')

@section('titulo', 'Usuarios')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                <a href="{{ route('usuario.create') }}" class="btn btn-primary mb-3">
                    <i class="fa-solid fa-plus me-1"></i> Nuevo Usuario
                </a>


                @if (session('success'))
                    <div class="alert alert-success mb-3 mt-3">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered datatable" id="usuariosTable">
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
      </div>
    </section>
</main>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inicializar DataTable
            $('#usuariosTable').DataTable({
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
        });

        function cambio_password(){
                console.log(2);
                let id = $('#id_usuario').val();
                let password = $('#password').val();

                if (!password) {
                    swal.fire({
                      icon: 'error',
                      title: 'Error',
                      text: 'Por favor ingrese una contraseña',
                    })
                    return;
                }

                $.ajax({
                  type: "GET",
                  url: "usuario/cambiar-password/" + id + "/" + password,
                  success: function(response) {
                    if(response == 1){
                      alert('Contraseña cambiada correctamente');
                      // Cerrar el modal
                      $('#cambiar_password').modal('hide');
                        // Limpiar el formulario
                      if ($('#frmPassword').length) {
                          $('#frmPassword')[0].reset();
                      } else {
                          console.warn('No se encontró el formulario con ID frmPassword');
                      }
                    }
                  },
                  error: function(xhr) {
                    console.error('Error:', xhr.responseText);
                    alert('Error al cambiar la contraseña');
                  }
                })

                return;
            }

        function recargar_tbody() {
            $.ajax({
                type: "GET",
                url: "{{ route('usuario.tbody') }}",
                success: function(response) {
                    $('#tbody-usuarios').html(response);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function cambiar_estado(usuario_id, estado) {
            $.ajax({
                type: "GET",
                url: "usuario/cambiar-estado/" + usuario_id + "/" + estado,
                success: function(response) {
                    if (response == 1) {
                        alert('Estado cambiado correctamente');
                        recargar_tbody();
                    }
                },
                error: function(error) {
                    console.log(error);
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

        function agregar_id_usuario(id){
            $('#id_usuario').val(id);
        }
    </script>
@endpush
