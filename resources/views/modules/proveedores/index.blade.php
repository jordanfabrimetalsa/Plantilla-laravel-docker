@extends('layouts.main')

@section('titulo', 'Proveedores')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Proveedores</h1>
    </div>

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="card-title">
                  Proveedores
                </div>
                <p>Administrar los proveedores de nuestro sistema.</p>
                <a href="{{ route('proveedor.create') }}" class="btn btn-primary mb-3">
                    <i class="fa-solid fa-plus me-1"></i> Nuevo Proveedor
                </a>

                <div class="table-responsive">
                    <table class="table table-bordered datatable" id="proveedoresTable">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Direccion</th>
                                <th>Correo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-proveedores">

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
@endpush
