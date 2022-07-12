<div class="sorter-mobile__select">
    <div class="select-filter">
        @foreach($mobileSortNamesArray as $key => $value)
            @if($sortName == $key)
                <div class="select-filter__value" style="text-transform: capitalize">{{$value}}</div>
            @endif
        @endforeach

        <div class="select-filter__list j-mobile-sorter-list">
            @foreach($mobileSortNamesArray as $key => $value)
                <div>
                    <a href="?sort={{$key}}" class="select-filter__item" style="display:block;">По {{$value}}</a>
                </div>
            @endforeach

                {{--            <div class="select-filter__item"--}}
{{--                 data-link="{on model.updateSort model.sorterModel.sortingEntries['popular']}">По популярности--}}
{{--            </div>--}}
{{--            <div class="select-filter__item"--}}
{{--                 data-link="{on model.updateSort model.sorterModel.sortingEntries['rate']}">По рейтингу--}}
{{--            </div>--}}
{{--            <div class="select-filter__item"--}}
{{--                 data-link="{on model.updateSort model.sorterModel.sortingEntries['pricedown']}">По цене max--}}
{{--            </div>--}}
{{--            <div class="select-filter__item"--}}
{{--                 data-link="{on model.updateSort model.sorterModel.sortingEntries['priceup']}">По цене min--}}
{{--            </div>--}}
{{--            <div class="select-filter__item"--}}
{{--                 data-link="{on model.updateSort model.sorterModel.sortingEntries['sale']}">По скидке--}}
{{--            </div>--}}
{{--            <div class="select-filter__item"--}}
{{--                 data-link="{on model.updateSort model.sorterModel.sortingEntries['newly']}">По обновлению--}}
{{--            </div>--}}

        </div>
    </div>
</div>
