@foreach($children as $child)
    @if(old('parent_id') == $child->id)
        <option selected value="{{$child->id}}">{{ str_repeat("-", $step) }} {{$child->title}}</option>
    @else
        <option value="{{$child->id}}">{{ str_repeat("-", $step) }} {{$child->title}}</option>
    @endif

    @if(count($child->children))
        @include('category.parts.recursive_children_select_part',
            ['children' => $child->children, 'step' => $step + 1])
    @endif
@endforeach
