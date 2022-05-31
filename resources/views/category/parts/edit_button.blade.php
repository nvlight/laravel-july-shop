@if(isset($id))
    <a href="{{route('category.edit', $category->id)}}" class="{{$class}} btn btn-primary">edit</a>
@endif
