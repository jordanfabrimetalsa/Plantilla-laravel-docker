@extends('layouts.main')

@section('titulo', $titulo)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Eliminar Producto</h1>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">¿Estas seguro de eliminar esta producto?</h5>

                            <form action="{{ route('producto.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <label for="">Nombre de la Producto</label>
                                <input type="text" class="form-control" readonly name="nombre" id="nombre" value="{{ $item->nombre }}">

                                <label for="">Descripción</label>
                                <input type="text" class="form-control" readonly name="descripcion" id="descripcion" value="{{ $item->descripcion }}">

                                <label for="">Precio</label>
                                <input type="number" class="form-control" readonly name="precio" id="precio" value="{{ $item->precio }}">

                                <label for="">Cantidad</label>
                                <input type="number" class="form-control" readonly name="cantidad" id="cantidad" value="{{ $item->cantidad }}">

                                <label for="">Categoria</label>
                                <select name="categoria_id" id="categoria_id" class="form-control" readonly>
                                    <option value="">Seleccionar Categoria</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" {{ $categoria->id == $item->categoria_id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-danger mt-3">Eliminar</button>
                                <a href="{{ route('producto') }}" class="btn btn-danger mt-3">Cancelar</a>
                            </form>
                        </div>          
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
