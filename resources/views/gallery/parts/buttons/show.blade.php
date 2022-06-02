@if(isset($id))
    <div class="">
        <a href="{{route('gallery.show', $id)}}" class="d-flex btn btn-success">show</a>
    </div>
@endif
