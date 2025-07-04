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

                <!-- Botón para abrir el modal -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa-solid fa-play me-1"></i> Mostrar Modal
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Título del Modal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Contenido del modal va aquí...
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar cambios</button>
                      </div>
                    </div>
                  </div>
                </div>

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
                    url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
                    decimal: ',',
                    thousands: '.',
                    search: 'Buscar:',
                    searchPlaceholder: 'Buscar usuarios...'
                }
            });
        });

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
    </script>
@endpush
