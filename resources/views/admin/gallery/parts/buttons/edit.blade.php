@if(isset($id))
    <div class="">
        <a href="{{route('gallery.edit', $id)}}" class="{{$class}} btn btn-primary">edit</a>
    </div>
@endif
