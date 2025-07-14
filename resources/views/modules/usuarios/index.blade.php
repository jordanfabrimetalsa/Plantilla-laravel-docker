@extends('layouts.main')

@section('titulo', $titulo)

@section('contenido')
<main id="main" class="main">
<<<<<<< HEAD
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
=======
  <div class="pagetitle">
    <h1>Usuarios</h1>
    
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Administrar Usuarios</h5>
            <p>
              Admnistrar las cuentas y roles de usuarios.
            </p>
            <!-- Table with stripped rows -->
            <a href="{{ route("usuarios.create") }}" class="btn btn-primary">
              <i class="fa-solid fa-user-plus"></i> Agregar nuevo usuario
            </a>
            <hr>
            <table class="table datatable">
              <thead>
                <tr>
                  <th class="text-center">Email</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Rol</th>
                  <th class="text-center">Cambio password</th>
                  <th class="text-center">Activo</th>
                  <th class="text-center">
                    Editar
                  </th>
                </tr>
              </thead>
              <tbody id="tbody-usuarios">
                 @include('modules.usuarios.tbody')
              </tbody>
            </table>
            <!-- End Table with stripped rows -->
          </div>
>>>>>>> 5f4769cae9fa751a7edb7fe3e5ebfb7c25fb566b
        </div>
      </div>
    </div>
  </section>

</main>
@include('modules.usuarios.modal_cambiar_password')
@endsection

@push('scripts')
    <script>

      function recargar_tbody(){
        $.ajax({
          type : "GET",
          url : "{{ route('usuarios.tbody') }}",
          success : function(respuesta){
            console.log(respuesta);
          } 
        });
      }

<<<<<<< HEAD
        function cambio_password(){
                console.log(2);
                let id = $('#id_usuario').val();
                let password = $('#password').val();

                if (!password) {
                    swal.fire({
                        icon: 'error',
                        title: 'Por favor ingrese una contraseña',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    return;
                }

                $.ajax({
                  type: "GET",
                  url: "usuario/cambiar-password/" + id + "/" + password,
                  success: function(response) {
                    if(response == 1){
                      swal.fire({
                        icon: 'success',
                        title: 'Contraseña cambiada correctamente',
                        showConfirmButton: false,
                        timer: 1500
                      });
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
                    swal.fire({
                        icon: 'error',
                        title: 'Error al cambiar la contraseña',
                        showConfirmButton: false,
                        timer: 1500
                    });
                  }
                })

                return;
=======
      function cambiar_estado(id, estado) {
        $.ajax({
          type: "GET",
          url : "usuarios/cambiar-estado/" + id + "/" + estado,
          success: function(respuesta){
            if(respuesta == 1){
              Swal.fire({
                title: 'Exito!',
                text: 'Cambio de estado exitoso!',
                icon: 'success',
                confirmButtonText:'Aceptar'
              });
              recargar_tbody();
            } else {
              Swal.fire({
                title: 'Fallo!',
                text: 'No se llevo a cabo el cambio!',
                icon: 'error',
                confirmButtonText:'Aceptar'
              });
>>>>>>> 5f4769cae9fa751a7edb7fe3e5ebfb7c25fb566b
            }
          }
        });
      }

      function agregar_id_usuario(id) {
        $('#id_usuario').val(id);
      }

<<<<<<< HEAD
        function cambiar_estado(usuario_id, estado) {
            $.ajax({
                type: "GET",
                url: "usuario/cambiar-estado/" + usuario_id + "/" + estado,
                success: function(response) {
                    if (response == 1) {
                        swal.fire({
                            icon: 'success',
                            title: 'Estado cambiado correctamente',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        recargar_tbody();
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
=======
      function cambio_password(){
        let id = $('#id_usuario').val();
        let password = $('#password').val();
>>>>>>> 5f4769cae9fa751a7edb7fe3e5ebfb7c25fb566b

        $.ajax({
          type: "GET",
          url: "usuarios/cambiar-password/" + id + "/" + password,
          success :function(respuesta){
            if(respuesta == 1){
               Swal.fire({
                title: 'Exito!',
                text: 'Cambio de password exitoso!',
                icon: 'success',
                confirmButtonText:'Aceptar'
              });
              $('#frmPassword')[0].reset();
            } else {
              Swal.fire({
                title: 'Fallo!',
                text: 'Cambio de password no exitoso!',
                icon: 'error',
                confirmButtonText:'Aceptar'
              });
            }
          }
        });

        return false;
      }

      $(document).ready(function(){
        $('.form-check-input').on("change", function(){
          let id = $(this).attr("id");
          let estado = $(this).is(":checked") ? 1 : 0;
          cambiar_estado(id, estado);
        });
      });
    </script>
@endpush

