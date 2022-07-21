<tr>
    <td></td>
    <td></td>
    <td>
        <img src="{{ asset(env('PRODUCT_IMAGES_SHOW_PATH') . $gallery->parent_id . '/' .
            config('product.gallery.paths.c516x688') . $gallery->image) }}"
             alt="" width="300px" height="300px">
        <br>
        {{ $gallery->image }}
    </td>
    <td>{{ $gallery->is_main }}</td>
    <td>
        @include('admin.gallery.parts.buttons.actions_buttons', ['gallery' => $gallery])
    </td>
</tr>
