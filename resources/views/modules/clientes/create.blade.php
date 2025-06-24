@extends('layouts.main')

@section('titulo', $titulo)

@section('content')
<main id="main" class="main">
        <div class="pagetitle">
            <h1>Agregar Cliente</h1>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Agregar Nuevo Cliente</h5>

                            <form action="{{ route('cliente.store') }}" method="POST">
                                @csrf
                                <label for="">Nombre de la Cliente</label>
                                <input type="text" class="form-control" required name="nombre" id="nombre">

                                <label for="">Apellido</label>
                                <input type="text" class="form-control" required name="apellido" id="apellido">

                                <label for="">Email</label>
                                <input type="email" class="form-control" required name="email" id="email">

                                <label for="">Telefono</label>
                                <input type="number" class="form-control" required name="telefono" id="telefono">

                                <label for="">Direccion</label>
                                <input type="text" class="form-control" required name="direccion" id="direccion">


                                <label for="">Rol</label>
                                <input type="text" class="form-control" required name="rol" id="rol">

                                <div class="form-check form-switch mt-2">
                                    <input type="hidden" name="activo" id="activo" value="1">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                    <label class="form-check-label" id="text-activo" for="flexSwitchCheckChecked">Activo</label>
                                </div>

                                <button class="btn btn-primary mt-3">Guardar</button>
                                <a href="{{ route('cliente') }}" class="btn btn-danger mt-3">Cancelar</a>
                            </form>
                        </div>
                    </div>  
                </div>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function() {
        $('#flexSwitchCheckChecked').on('change', function() {
            if ($(this).is(':checked')) {
                $('#activo').val('1');
                $('#text-activo').text('Activo');
            } else {
                $('#activo').val('0');
                $('#text-activo').text('Inactivo');
            }
        }).trigger('change');
    });
</script>
@endpush
