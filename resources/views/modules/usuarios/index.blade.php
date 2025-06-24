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
                <a href="{{ route('usuario.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>

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
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        function recargar_tbody(){
            $.ajax({
              type : "GET",
              url : "{{ route('usuario.tbody') }}",
              success : function(response){
                $('#tbody-usuarios').html(response);
              },
              error : function(error){
                console.log(error);
              }
            });
        }

        function cambiar_estado(usuario_id, estado){
            $.ajax({
              type : "GET",
              url : "{{ route('usuario.estado', [':id', ':estado']) }}".replace(':id', usuario_id).replace(':estado', estado),
              success : function(response){
                recargar_tbody();
              },
              error : function(error){
                console.log(error);
              }
            });
        }

        $(document).ready(function(){
            $('form-check-input').on('change', function(){
                let id = $(this).attr('id');
                let estado = $(this).is(':checked') ? 1 : 0;
                cambiar_estado(id, estado);
            });
        });
    </script>

    <script>
        $(function(){
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
        })
    </script>

    <script>
        
    </script>
@endpush
