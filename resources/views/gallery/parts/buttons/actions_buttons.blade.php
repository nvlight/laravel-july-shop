<div class="d-flex justify-content-around">
    @include('gallery.parts.buttons.show',   ['id' => $gallery->id])
    @include('gallery.parts.buttons.edit',   ['id' => $gallery->id, 'class' => 'd-flex'])
    @include('gallery.parts.buttons.delete', ['id' => $gallery->id])
</div>
