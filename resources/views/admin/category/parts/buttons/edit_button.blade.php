@if(isset($id))
    <a href="{{route('admin.category.edit', $id)}}" class="{{$class}} btn btn-primary">edit</a>
@endif
