@if(isset($id))
    <div class="">
        <a href="{{route('admin.gallery.show', $id)}}" class="d-flex btn btn-success">show</a>
    </div>
@endif
