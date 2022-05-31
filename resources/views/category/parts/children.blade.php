@foreach($children as $child)
    <tr>
        <td>{{ $child->id }}</td>
        <td>{{ $child->parent_id }}</td>
        <td>{{ $child->title }}</td>
    </tr>
    @if(count($child->children))
        @include('category.parts.children', ['children' => $child->children])
    @endif
@endforeach
