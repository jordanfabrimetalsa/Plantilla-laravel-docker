@foreach ($item as $items)
    <tr>
        <td>{{ $items->name }}</td>
        <td>
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal_cambiar_password">
                Cambiar Contraseña
            </button>
        </td>
        <td>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="{{ $items->id }}"
                    {{ $items->activo ? 'checked' : '' }}>
            </div>
        </td>

        <td>
            @if ($items->rol == 'admin')
                <span class="badge bg-success">Admin</span>
            @else
                <span class="badge bg-danger">User</span>
            @endif
        </td>
        <td>
            <a href="{{ route('usuario.edit', $items->id) }}" class="btn btn-warning btn-sm rounded"><i
                    class="fa-solid fa-pen-to-square"></i></a>
        </td>
    </tr>
@endforeach
