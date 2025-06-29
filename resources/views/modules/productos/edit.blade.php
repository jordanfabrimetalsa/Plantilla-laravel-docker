@extends('layouts.main')

@section('titulo', $titulo)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Editar Producto</h1>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Editar Producto</h5>

                            <form action="{{ route('producto.update',  $item->id)  }}" method="POST">
                                @csrf
                                @method('PUT')

                                <label for="">Nombre de la Producto</label>
                                <input type="text" class="form-control" required name="nombre" id="nombre" value="{{ $item->nombre }}">

                                <label for="">Descripción</label>
                                <input type="text" class="form-control" required name="descripcion" id="descripcion" value="{{ $item->descripcion}}">

                                <label for="">Precio</label>
                                <input type="number" class="form-control" required name="precio" id="precio" value="{{ $item->precio }}">

                                <label for="">Cantidad</label>
                                <input type="number" class="form-control" required name="cantidad" id="cantidad" value="{{ $item->cantidad }}">

                                <label for="">Categoria</label>
                                <select name="categoria_id" id="categoria_id" class="form-control">
                                    <option value="{{ $item->categoria_id }}">{{ $item->categoria->nombre }}</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>

                                <button class="btn btn-primary mt-3">Editar</button>
                                <a href="{{ route('producto') }}" class="btn btn-danger mt-3">Cancelar</a>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
