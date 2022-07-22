<tr>
    <td></td>
    <td></td>
    <td>
        <div>
            <img src="{{ asset('storage/' . $gallery->image) }}"
                 alt="" width="300px" height="300px">
        </div>
        <div>
            {{ $gallery->image }}
        </div>
    </td>
    <td>{{ $gallery->is_main }}</td>
    <td>
        @include('admin.gallery.parts.buttons.actions_buttons', ['gallery' => $gallery])
    </td>
</tr>
