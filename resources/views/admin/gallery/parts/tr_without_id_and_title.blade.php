<tr>
    <td></td>
    <td></td>
    <td>
        <img src="{{asset('storage/product_images/'.$gallery->image)}}" alt="" width="100px" height="100px">
        <br>
        {{ $gallery->image }}
    </td>
    <td>{{ $gallery->is_main }}</td>
    <td>
        @include('admin.gallery.parts.buttons.actions_buttons', ['gallery' => $gallery])
    </td>
</tr>
