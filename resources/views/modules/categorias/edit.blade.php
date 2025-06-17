@extends('layouts.main')

@section('titulo', $titulo)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Editar Categoria</h1>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Editar Categoria</h5>

                            <form action="{{ route('categoria.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <label for="">Nombre de la Categoria</label>
                                <input type="text" class="form-control" required name="nombre" id="nombre" value="{{ $item->nombre }}">

                                <button class="btn btn-primary mt-3">Guardar</button>
                                <a href="{{ route('categoria') }}" class="btn btn-danger mt-3">Cancelar</a>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
