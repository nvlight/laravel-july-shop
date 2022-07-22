@if(isset($id))
    <div class="">
        <a href="{{route('admin.gallery.show', $id)}}" class="@if(isset($class)) {{$class}} @endif btn btn-success">show</a>
    </div>
@endif
