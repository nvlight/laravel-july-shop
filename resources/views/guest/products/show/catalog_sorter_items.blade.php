@foreach($priceExcludedsortNames as $key => $value)
    <a class="sort-item  @if($activeSortName == $key) sort_select @endif" href="?sort={{$key}}">
        <span>{{$value}}</span>
    </a>
@endforeach
