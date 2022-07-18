@foreach($categories as $category)

    <option @if($target_value == $category->id) selected @endif value="{{$category->id}}">
        {{ str_repeat("-", $step) }} {{$category->title}} ({{$category->id}})
    </option>

    @if(count($category->children))
        @include('admin.category.parts.recursive_children_select_part', [
            'categories' => $category->children,
            'step' => $step + 1,
            'target_value' => $target_value,
        ])
    @endif
@endforeach
