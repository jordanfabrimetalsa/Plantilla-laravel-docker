@extends('layouts.login')
@section('titulo', $titulo )
@section('contenido')
<main>
    <div class="container">
      <section class="py-4 section register min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="py-4 d-flex justify-content-center">
                <a href="#" class="w-auto logo d-flex align-items-center">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Ventas y Almacén</span>
                </a>
              </div>

              <div class="mb-3 card">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="pb-0 text-center card-title fs-4">Login de Usuarios</h5>
                    <p class="text-center small">Ingresa tu email y password para acceder.</p>
                  </div>

                  <form class="row g-3 needs-validation" method="POST" action="{{ route('logear') }}" novalidate>
                    @csrf
                    @method('POST')
                    <div class="col-12">
                      <label for="email" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" id="email" required>
                        <div class="invalid-feedback">Ingresa su Email.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                      <div class="invalid-feedback">Ingrese su Contraseña!</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                  </form>
                  <!-- validacion que viene de logear -->
                  @if ($errors->any())
                    <p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </p>
                  @endif
                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

@endsection
