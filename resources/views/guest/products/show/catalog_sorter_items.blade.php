@foreach($priceExcludedsortNames as $key => $value)
    <a class="sort-item  @if($activeSortName == $key) sort_select @endif" href="?sort={{$key}}">
        <span>{{$value}}</span>
        @if($key == "priceAsc")
            @include('guest.products.svgs.arrow-up_svg')
        @elseif($key == "priceDesc")
            @include('guest.products.svgs.arrow-down_svg')
        @endif
    </a>
@endforeach
