@foreach($categories as $category)
    <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->parent_id }}</td>
        <td>{{ $category->title }}</td>
        @include('admin.category.parts.buttons.actions_buttons', ['id' => $category->id])
    </tr>
    @if(count($category->children))
        @include('admin.category.parts.category_trs', ['categories' => $category->children])
    @endif
@endforeach