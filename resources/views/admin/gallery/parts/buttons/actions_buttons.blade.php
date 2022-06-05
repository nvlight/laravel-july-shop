<div class="d-flex justify-content-around">
    @include('admin.gallery.parts.buttons.show',   ['id' => $gallery->id])
    @include('admin.gallery.parts.buttons.edit',   ['id' => $gallery->id, 'class' => 'd-flex'])
    @include('admin.gallery.parts.buttons.delete', ['id' => $gallery->id])
</div>
