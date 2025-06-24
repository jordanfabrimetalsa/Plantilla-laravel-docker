@extends('layouts.main')

@section('titulo', $titulo)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Agregar Usuario</h1>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Agregar Nueva Usuario</h5>

                            <form action="{{ route('usuario.store') }}" method="POST">
                                @csrf
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" required name="name" id="name">
                                <label for="">Apellido</label>
                                <input type="text" class="form-control" required name="apellido" id="apellido">
                                <label for="">Contraseña</label>
                                <input type="password" class="form-control" required name="password" id="password">
                                <label for="">Activo</label>
                                <select name="activo" id="activo" class="form-control">
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                                <label for="">Rol</label>
                                <select name="rol" id="rol" class="form-control">
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
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
