@extends('layouts.main')

@section('titulo', $titulo)

@section('contenido')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Dashboard</h1>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Bienvenido, {{ Auth::user()->name }}!</h5>

            <div class="row text-center mb-4">
              <div class="col-md-4 mb-3">
                <div class="bg-primary text-white rounded p-3 shadow-sm">
                  <h6 class="mb-1">Total de ventas</h6>
                  <h4 class="mb-0">${{ number_format($totalVentas, 2) }}</h4>
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <div class="bg-success text-white rounded p-3 shadow-sm">
                  <h6 class="mb-1">Cantidad de ventas</h6>
                  <h4 class="mb-0">{{ $cantidadVentas }}</h4>
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <div class="bg-danger text-white rounded p-3 shadow-sm">
                  <h6 class="mb-1">Productos con bajo stock</h6>
                  <h4 class="mb-0">{{ count($productosBajosStock) }}</h4>
                </div>
              </div>
            </div>

            <h5 class="mb-3">Últimas Ventas</h5>
            <ul class="list-group">
              @forelse ($ventasRecientes as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Venta #{{ $item->id }}
                  <span class="badge bg-secondary">${{ number_format($item->total_venta, 2) }}</span>
                </li>
              @empty
                <li class="list-group-item text-muted">No hay ventas recientes</li>
              @endforelse
            </ul>

            <div class="chat">
              <div class="top">
                <img src="https://assets.edlin.app/images/rossedlin/03/rossedlin-03-100.jpg" alt="Avatar">
                <div>
                  <p>Ross Edlin</p>
                  <small>Online</small>
                </div>
              </div>
              <!-- End Header -->

              <!-- Chat -->
              <div class="messages">
                <div class="left message">
                  <img src="https://assets.edlin.app/images/rossedlin/03/rossedlin-03-100.jpg" alt="Avatar">
                  <p>Start chatting with Chat GPT AI below!!</p>
                </div>
              </div>
              <!-- End Chat -->

              <!-- Footer -->
              <div class="bottom">
                <form>
                  <input type="text" id="message" name="message" placeholder="Enter message..." autocomplete="off">
                  <button type="submit"></button>
                </form>
              </div>
              <!-- End Footer -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection

@push('styles')
  <style>
    .chat {
      display: flex;
      flex-direction: column;
      height: 500px;
      background-color: #F5F5F5;
      border-radius: 10px;
      padding: 20px;
    }

    .top {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .messages {
      display: flex;
      flex-direction: column;
      overflow-y: scroll;
      flex: 1;
    }

    .message {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .left {
      justify-content: flex-start;
    }

    .right {
      justify-content: flex-end;
    }

    .left img {
      margin-right: 10px;
    }

    .right img {
      margin-left: 10px;
    }

    .bottom {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .bottom form {
      flex: 1;
    }

    .bottom input {
      width: 100%;
      border: none;
      border-radius: 10px;
      padding: 10px;
    }

    .bottom button {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
    }

    .bottom button:hover {
      background-color: #45a049;
    }
  </style>
@endpush

@push('scripts')
  <script>
    //Broadcast messages
    $("form").submit(function (event) {
      event.preventDefault();

      //Stop empty messages
      if ($("form #message").val().trim() === '') {
        return;
      }

      //Disable form
      $("form #message").prop('disabled', true);
      $("form button").prop('disabled', true);

      $.ajax({
        url: "/chat",
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': "{{csrf_token()}}"
        },
        data: {
          "model": "gpt-3.5-turbo",
          "content": $("form #message").val()
        }
      }).done(function (res) {
        //Append message to chat
        $(".messages").append('<div class="right message">' +
          '<p>' + $("form #message").val() + '</p>' +
          '<img src="https://assets.edlin.app/images/rossedlin/03/rossedlin-03-100.jpg" alt="Avatar">' +
          '</div><div class="left message">' +
          '<img src="https://assets.edlin.app/images/rossedlin/03/rossedlin-03-100.jpg" alt="Avatar">' +
          '<p>' + res + '</p>' +
          '</div>');

        //Cleanup
        $("form #message").val('');
        $(document).scrollTop($(document).height());

        //Enable form
        $("form #message").prop('disabled', false);
        $("form button").prop('disabled', false);
      });
    });

    //Focus on message input when document is ready
    $(document).ready(function () {
      $("form #message").focus();
    });

  </script>
@endpush
