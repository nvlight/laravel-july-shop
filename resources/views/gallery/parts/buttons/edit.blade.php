@if(isset($id))
    <div class="">
        <a href="{{route('gallery.edit', $id)}}" class="d-flex btn btn-primary">edit</a>
    </div>
@endif
