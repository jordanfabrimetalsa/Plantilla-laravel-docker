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
                            <br>
                            <form action="{{ route('producto.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <label for="categoria_id">Categoria</label>
                                <select name="categoria_id" id="categoria_id" class="form-control">
                                    <option value="">Seleccionar Categoria</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" {{ $categoria->id == $item->categoria_id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                                <label for="proveedor_id">Proveedor</label>
                                <select name="proveedor_id" id="proveedor_id" class="form-control">
                                    <option value="">Seleccionar Proveedor</option> 
                                    @foreach ($proveedor as $proveedor)
                                        <option value="{{ $proveedor->id }}" {{ $proveedor->id == $item->proveedor_id ? 'selected' : '' }}>{{ $proveedor->nombre }}</option>
                                    @endforeach
                                </select>
                                <label for="">Nombre de la Producto</label>
                                <input type="text" class="form-control" required name="nombre" id="nombre" value="{{ $item->nombre }}">

                                <label for="">Descripción</label>
                                <textarea class="form-control" required rows="3" name="descripcion" id="descripcion">{{ $item->descripcion }}</textarea>

                                <label for="">Precio de Venta</label>
                                <input type="number" class="form-control" required name="precio_venta" id="precio_venta" value="{{ $item->precio_venta }}">

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
