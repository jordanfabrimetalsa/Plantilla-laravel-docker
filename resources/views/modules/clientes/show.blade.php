@extends('layouts.main')

@section('titulo', $titulo)

@section('content')
    <main>
        <div class="pagetitle">
            Eliminar Cliente
        </div>


        <div class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Detalle de Cliente</h5>
                            <form action="{{ route('cliente.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
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

                                <label for="">Activo</label>
                                <input type="number" class="form-control" required name="activo" id="activo">

                                <label for="">Rol</label>
                                <input type="text" class="form-control" required name="rol" id="rol">
                            </form>
                            <button class="btn btn-danger">Eliminar</button>
                            <a href="{{ route('cliente') }}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
