@foreach($categories as $category)
    <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->parent_id }}</td>
        <td>{{ $category->title }}</td>
        @include('category.parts.actions_buttons', ['id' => $category->id])
    </tr>
    @if(count($category->children))
        @include('category.parts.category_trs', ['categories' => $category->children])
    @endif
@endforeach
