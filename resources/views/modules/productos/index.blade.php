@extends('layouts.main')

@section('titulo', $titulo)

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Detalle de Producto</h1>
    </div>  

    <section class="section dashboard">
      <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Administrar los Productos</h5>
                <p>Administrar los productos de nuestro sistema.</p>
                
                <a href="{{ route('producto.create') }}" class="btn btn-primary">Agregar nuevo producto</a>
                <hr>
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Nombre Producto</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Categoria</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->nombre }}</td>
                                <td>{{ $item->descripcion }}</td>
                                <td>{{ $item->precio }}</td>
                                <td>{{ $item->cantidad }}</td>
                                <td>{{ $item->categoria->nombre }}</td>
                                <td>
                                    <a href="{{ route('producto.edit', $item->id) }}" class="btn btn-warning"><i
                                            class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{ route('producto.show', $item->id) }}" class="btn btn-danger"><i
                                            class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

              </div>
            </div>
          </div>
      </div>
    </section>
  </main>
@endsection