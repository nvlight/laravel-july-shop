@foreach($sortNamesArray as $key => $value)
    <a class="sort-item  @if($sortName == $key) sort_select @endif" href="?sort={{$key}}">
        <span>{{$value}}</span>
    </a>
@endforeach
