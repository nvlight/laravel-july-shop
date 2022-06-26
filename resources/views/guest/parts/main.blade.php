<main class="main left-bg" role="main" id="body-layout">

{{--    @include('guest.parts.main.parts.lk-menu')--}}

    <div id="mainContainer" class="main__container">
        <div id="app">
            <div class="catalog-start-page" data-link="">
                <div class="catalog-start-page__breadcrumbs">
                    <div data-link="">
                        <div class="breadcrumbs">
                            <div class="breadcrumbs__container">
                                <ul class="breadcrumbs__list" itemscope="" itemtype="https://schema.org/BreadcrumbList">
                                    <li class="breadcrumbs__item" itemprop="itemListElement" itemscope=""
                                        itemtype="https://schema.org/ListItem">
                                        <a class="breadcrumbs__link" href="/" itemprop="item"> <span itemprop="name">Главная</span> </a>
                                        <meta itemprop="position" content="1">
                                    </li>
                                    <li class="breadcrumbs__item"
                                        itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                        <span itemprop="name">{{$parentCategory->title}}</span>
                                        <meta itemprop="position" content="2">
                                    </li>
                                </ul>
                            </div>
                        </div>
{{--                        <div class="breadcrumbs">--}}
{{--                            <div class="breadcrumbs__container">--}}
{{--                                <ul class="breadcrumbs__list" itemscope="" itemtype="https://schema.org/BreadcrumbList"--}}
{{--                                    data-jsv-df="">--}}
{{--                                    <li class="breadcrumbs__item" itemprop="itemListElement" itemscope=""--}}
{{--                                        itemtype="https://schema.org/ListItem"><a class="breadcrumbs__link" href="/"--}}
{{--                                                                                  itemprop="item"> <span--}}
{{--                                                itemprop="name">Главная</span> </a>--}}
{{--                                        <meta itemprop="position" content="1">--}}
{{--                                    </li>--}}
{{--                                    <li data-jsv="#5872^#14039_#14040_#14041_" class="breadcrumbs__item"--}}
{{--                                        itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">--}}
{{--                                        <script type="jsv#14042_"></script>--}}
{{--                                        <a class="breadcrumbs__link" href="/catalog/elektronika" itemscope=""--}}
{{--                                           itemtype="https://schema.org/WebPage" itemprop="item"--}}
{{--                                           itemid="/catalog/elektronika"> <span itemprop="name">Электроника</span> </a>--}}
{{--                                        <script type="jsv/14042_"></script>--}}
{{--                                        <meta itemprop="position" content="2">--}}
{{--                                    </li>--}}
{{--                                    <li data-jsv="/14041_/14040_#14043_#14044_" class="breadcrumbs__item"--}}
{{--                                        itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">--}}
{{--                                        <script type="jsv#14045_"></script>--}}
{{--                                        <span itemprop="name">Ноутбуки и компьютеры</span>--}}
{{--                                        <script type="jsv/14045_"></script>--}}
{{--                                        <meta itemprop="position" content="3">--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div class="catalog-title-wrap"><h1 class="catalog-title">{{$parentCategory->title}}</h1></div>
                <p class="j-open-tecdoc-mobile selection-btn hide-desktop hide">Подбор запчастей</p>
                <div class="catalog-start-content">

                    <div class="catalog-start-content__side">
                        <div>
                            <div class="menu-catalog">
                                <ul class="menu-catalog__list-1">
                                    <li>Категории</li>
                                    <li class="name">{{$parentCategory->title}}</li>
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
                        @php
                            dump($childCategories->toArray());
                        @endphp
                    </div>

                </div>
            </div>
        </div>
        <button class="btn-quick-nav j-quicknav" type="button">К началу страницы</button>
    </div>

</main>
