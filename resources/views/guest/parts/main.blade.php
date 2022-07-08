<main class="main left-bg" role="main" id="body-layout">

{{--    @include('guest.parts.main.parts.lk-menu')--}}

    <div id="mainContainer" class="main__container">
        <div id="app">
            <div class="catalog-start-page" data-link="">
                <div class="catalog-start-page__breadcrumbs">
                    <div data-link="">
                        @include('guest.parts.breadcrumbs')
                    </div>
                </div>
                <div class="catalog-title-wrap">
                    <h1 class="catalog-title">{{$currentCategory->title}}</h1>
                </div>
                <p class="j-open-tecdoc-mobile selection-btn hide-desktop hide">Подбор запчастей</p>
                <div class="catalog-start-content">

                    <div class="catalog-start-content__side">
                        <div>
                            <div class="menu-catalog">
                                <ul class="menu-catalog__list-1">
                                    @if($currentCategory->parent_id == 0)
                                        <li>Категории</li>
                                    @endif
                                    <li class="name">{{$currentCategory->title}}</li>
                                </ul>
                                @foreach($childCategories as $childCategory)
                                    <ul class="menu-catalog__list-2 maincatalog-list-2">
                                        <li class="">
                                            <a class="j-menu-item"
                                               href="{{route('guest.category.show', $childCategory->id)}}">{{$childCategory->title}}</a>
                                        </li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="catalog-start-content__main">
{{--                        @include('guest.parts.main_parts.catalog-start-content__main')--}}
                        @include('guest.parts.main_parts.tmp_main')
                    </div>

                </div>
            </div>
        </div>
        <button class="btn-quick-nav j-quicknav" type="button">К началу страницы</button>
    </div>

</main>
