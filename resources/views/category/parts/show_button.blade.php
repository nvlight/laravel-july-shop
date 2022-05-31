@if(isset($id))
    <a href="{{route('category.show', $category->id)}}" class="d-flex btn btn-success">show</a>
@endif
