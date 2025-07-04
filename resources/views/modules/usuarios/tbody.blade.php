@foreach ($item as $items)
    <tr>
        <td>{{ $items->name }}</td>
        <td><a class="btn btn-secondary" href="{{ route('usuario.show', $items->id) }}"><i class="fa-solid fa-user-lock"></i></a></td>
        <td><div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="{{ $items->id }}" 
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