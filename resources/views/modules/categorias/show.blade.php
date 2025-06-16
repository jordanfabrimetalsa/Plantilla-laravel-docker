@extends('layouts.main')

@section('titulo', $titulo)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Eliminar Categoria</h1>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">¿Estas seguro de eliminar esta categoria?</h5>

                            <form action="{{ route('categoria.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <label for="">Nombre de la Categoria</label>
                                <input type="text" class="form-control" readonly name="nombre" id="nombre" value="{{ $item->nombre }}">

                                <button class="btn btn-danger mt-3">Eliminar</button>
                                <a href="{{ route('categoria') }}" class="btn btn-danger mt-3">Cancelar</a>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
