@if(isset($id))
    <a href="{{route('category.edit', $id)}}" class="{{$class}} btn btn-primary">edit</a>
@endif
