@extends('layouts.main')

@section('titulo', $titulo)

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Clientes</h1>
    </div>

    <section class="section dashboard">
      <div class="row">
          <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Activo</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->apellido }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->telefono }}</td>
                        <td>{{ $item->direccion }}</td>
                        <td>{{ $item->activo }}</td>
                        <td>{{ $item->rol }}</td>
                        <td>
                            <a href="{{ route('cliente.edit', $item->id) }}" class="btn btn-primary">Editar</a>
                            <a href="{{ route('cliente.show', $item->id) }}" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
      </div>
    </section>
  </main>
@endsection