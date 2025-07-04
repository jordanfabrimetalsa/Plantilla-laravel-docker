@foreach ($item as $items)
    <tr>
        <td>{{ $items->name }}</td>
        <td>
            <a href="#" onclick="agregar_id_usuario({{ $items->id }})" 
                class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#cambiar_password">
                <i class="fa-solid fa-user-lock"></i>
            </a>
        </td>
        <td><div class="form-check form-switch">
            <input  class="form-check-input" type="checkbox" id="{{ $items->id }}" 
            {{ $items->activo ? 'checked' : '' }}>
        </div></td>

        <td>
            @if ($items->rol == 'admin')
                <span class="badge bg-success">Admin</span>
            @else
                <span class="badge bg-danger">Cajero</span>
            @endif
        </td>
        <td>
            <a href="{{ route('usuario.edit', $items->id) }}" class="btn btn-warning"><i
                    class="fa-solid fa-pen-to-square"></i></a>
        </td>
    </tr>
@endforeach
@include('modules.usuarios.modal_cambiar_password')
