@foreach($categories as $category)
    <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->parent_id }}</td>
        <td>{{ $category->title }}</td>
        <td>{{ $category->image }}</td>
        <td>{{ $category->svg1 }}</td>
        <td>{{ $category->svg2 }}</td>
        @include('admin.category.parts.buttons.actions_buttons', ['id' => $category->id])
    </tr>
    @if(count($category->children))
        @include('admin.category.parts.category_trs', ['categories' => $category->children])
    @endif
@endforeach
