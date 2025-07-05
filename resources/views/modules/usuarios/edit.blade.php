@extends('layouts.main')

@section('titulo', $titulo)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Editar Usuario</h1>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Editar Usuario</h5>

                            <form action="{{ route('usuario.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" required name="name" id="name" value="{{ $item->name }}">
                                <label for="">Email</label>
                                <input type="email" class="form-control" required name="email" id="email" value="{{ $item->email }}">
                                <label for="">Activo</label>
                                <select name="activo" id="activo" class="form-control" value="{{ $item->activo }}">
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                                <label for="">Rol</label>
                                <select name="rol" id="rol" class="form-control" value="{{ $item->rol }}">
                                    <option value="admin">Admin</option>
                                    <option value="cajero">Cajero</option>
                                </select>
                                <button class="btn btn-primary mt-3">Guardar</button>
                                <a href="{{ route('usuario') }}" class="btn btn-danger mt-3">Cancelar</a>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
