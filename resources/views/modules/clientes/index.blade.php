@extends('layouts.main')

@section('titulo', $titulo)

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Clientes</h1>
    </div>

    <section class="section dashboard">
      <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Administrar los Clientes</h5>
                <p>Administrar los clientes de nuestro sistema.</p>
                <a href="{{ route('cliente.create') }}" class="btn btn-primary">Agregar nuevo cliente</a>
                <hr>
                <table id="clientesTable" class="table table-bordered datatable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Activo</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nombre . ' ' . $item->apellido }}</td>
                        <td>{{ $item->telefono }}</td>
                        <td>{{ $item->direccion }}</td>
                        @if ($item->activo)
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
                            @if ($item->rol == 'admin')
                                <span class="badge bg-success">Admin</span>
                            @else
                                <span class="badge bg-danger">User</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('cliente.edit', $item->id) }}" class="btn btn-primary">Editar</a>
                            <a href="{{ route('cliente.show', $item->id) }}" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </main>
  @push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            // Inicializar DataTable con configuración personalizada
            $('#clientesTable').DataTable({
                responsive: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
                    decimal: ',',
                    thousands: '.',
                    search: 'Buscar:',
                    searchPlaceholder: 'Buscar clientes...'
                },
                order: [[0, 'asc']],
                columnDefs: [
                    { orderable: false, targets: [0] } // Deshabilitar ordenamiento en columna de acciones
                ],
                dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                     "<'row'<'col-sm-12'tr>>" +
                     "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                initComplete: function() {
                    // Mover el buscador y el paginador a la derecha
                    $('.dataTables_filter').addClass('text-end');
                    $('.dataTables_paginate').addClass('text-end');
                    // Asegurar que el paginador ocupe todo el ancho disponible
                    $('.dataTables_paginate').parent().addClass('text-end');
                },
                drawCallback: function() {
                    // Asegurar que el paginador se mantenga alineado a la derecha después de cada dibujado
                    $('.dataTables_paginate').addClass('text-end');
                    $('.dataTables_paginate').parent().addClass('text-end');
                }
            });

            // Inicializar tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>

    <script>

    </script>
@endpush
@endsection