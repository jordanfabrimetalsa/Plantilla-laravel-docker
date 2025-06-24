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
                      <tbody>
                        @foreach ($item as $items)
                            <tr>
                                <td>{{ $items->name }}</td>
                                <td>********</td>
                                @if ($items->activo)
                                    <td><div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Activo</label>
                                    </div></td>
                                @else
                                    <td><div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Inactivo</label>
                                    </div></td>
                                @endif

                                <td>
                                    @if ($items->rol == 'admin')
                                        <span class="badge bg-success">Admin</span>
                                    @else
                                        <span class="badge bg-danger">User</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('usuario.edit', $items->id) }}" class="btn btn-warning"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
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
