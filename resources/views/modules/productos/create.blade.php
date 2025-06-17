@extends('layouts.main')

@section('titulo', $titulo)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Agregar Producto</h1>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Agregar Nuevo Producto</h5>

                            <form action="{{ route('producto.store') }}" method="POST">
                                @csrf
                                <label for="">Nombre de la Producto</label>
                                <input type="text" class="form-control" required name="nombre" id="nombre">

                                <label for="">Descripción</label>
                                <input type="text" class="form-control" required name="descripcion" id="descripcion">

                                <label for="">Precio</label>
                                <input type="number" class="form-control" required name="precio" id="precio">

                                <label for="">Cantidad</label>
                                <input type="number" class="form-control" required name="cantidad" id="cantidad">

                                <label for="">Categoria</label>
                                <select name="categoria_id" id="categoria_id" class="form-control">
                                    <option value="">Seleccionar Categoria</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>

                                <button class="btn btn-primary mt-3">Guardar</button>
                                <a href="{{ route('producto') }}" class="btn btn-danger mt-3">Cancelar</a>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
