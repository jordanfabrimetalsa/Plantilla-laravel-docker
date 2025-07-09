@extends('layouts.main')

@section('titulo', $titulo)

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Editar Imagen de Producto</h1>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">¿Estas seguro de actualizar esta imagen?</h5>

                            <form action="{{ route('producto.update-image', $item->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for="">Nombre de la Imagen</label>
                                <input type="file" class="form-control" name="imagen" id="imagen">
                                <br>
                                <img src="{{ asset('storage/' . $item->ruta) }}" alt="" width="100px" height="100px">
                                <hr>
                                <button class="btn btn-primary mt-3">Actualizar</button>
                                <a href="{{ route('producto') }}" class="btn btn-danger mt-3">Cancelar</a>
                            </form>
                        </div>          
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
