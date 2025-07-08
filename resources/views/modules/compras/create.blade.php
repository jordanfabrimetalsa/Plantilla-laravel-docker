@extends('layouts.main')

@section('titulo', $titulo)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Hacer una Compra</h1>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                        <br>

                            <h5 class="card-title">Compra nueva de {{ $item->nombre }}</h5>
                            <form action="{{ route('compras.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="producto_id" value="{{ $id }}">

                                <label for="cantidad">Cantidad del Producto</label>
                                <input type="number" class="form-control" required name="cantidad" id="cantidad">

                                <label for="precio_compra">Precio de Compra del Producto</label>
                                <input type="number" class="form-control" required name="precio_compra" id="precio_compra">

                                <button class="btn btn-primary mt-3">Comprar</button>
                                <a href="{{ route('producto') }}" class="btn btn-danger mt-3">Cancelar</a>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
