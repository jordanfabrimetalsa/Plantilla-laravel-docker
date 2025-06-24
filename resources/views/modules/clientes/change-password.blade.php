@extends('layouts.main')

@section('titulo', $titulo)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Cambio de Contraseña</h1>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Cambio de Contraseña</h5>

                            <form action="{{ route('cliente.change-password-post') }}" method="POST">
                                @csrf
                                <label for="">Contraseña Actual</label>
                                <input type="password" class="form-control" required name="password" id="password">

                                <label for="">Contraseña Nueva</label>
                                <input type="password" class="form-control" required name="password_new" id="password_new">

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
