<div id="catalog_sorter" class="sort">
    <span>Сортировать по:</span>

    @foreach($priceExcludedsortNames as $key => $value)
        <a href="?sort={{$key}}"
            class="sort-item @if($activeSortName == $key) sort_select @endif"
                @if($key == "priceDesc" || $key == "priceAsc") style='display: flex; align-items: end;' @endif >
            <span>{{$value}}</span>

            @if($activeSortName == "priceDesc" || $activeSortName == "priceAsc")
                @if($key == "priceDesc")
                    @include('guest.products.svgs.arrow-up_svg')
                @elseif($key == "priceAsc")
                    @include('guest.products.svgs.arrow-down_svg')
                @endif
            @endif
        </a>
    @endforeach

</div>
