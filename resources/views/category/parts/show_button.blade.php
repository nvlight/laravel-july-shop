@if(isset($id))
    <a href="{{route('category.show', $category->id)}}" class="d-flex">show</a>
@endif
