@foreach($categories as $category)
    @if($target_value == $category->id)
        <option selected value="{{$category->id}}">{{ str_repeat("-", $step) }} {{$category->title}}</option>
    @else
        <option value="{{$category->id}}">{{ str_repeat("-", $step) }} {{$category->title}}</option>
    @endif

    @if(count($category->children))
        @include('category.parts.recursive_children_select_part', [
            'categories' => $category->children,
            'step' => $step + 1,
            'target_value' => $target_value,
        ])
    @endif
@endforeach
