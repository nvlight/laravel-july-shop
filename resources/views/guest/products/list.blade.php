<div id="catalog" class="catalog-page">
    <div class="catalog-page__breadcrumbs">
        <div data-link="">
            @include('guest.parts.breadcrumbs')
        </div>
    </div>
    <div class="catalog-title-wrap">
        <h1 class="catalog-title">{{$currentCategory->title}}</h1>
        <span class="goods-count">
            <span class="hide">ТОП</span>
            <span>{{$productsCount}}</span>
            <span>товаров</span>
        </span>
    </div>
    <div class="catalog-category hide">
        <div class="sw-slider-tags j-swiper-tags-menu">
            <div class="swiper-container">
                <ul class="catalog-category__list swiper-wrapper"></ul>
            </div>
            <button class="swiper-button-prev"></button>
            <button class="swiper-button-next"></button>
        </div>
        <div class="catalog-category__collapse hide"></div>
    </div>
    <div class="catalog-page__seller-details">
        <div class="seller-details hide">
            <div class="seller-details__info-wrap">
                <div class="seller-details__logo-wrap">
                    <div class="seller-details__logo img-plug">
                        {{-- //static.wbstatic.net/i/v3/catalog/seller-logo-new.jpg --}}
                        <img src="" alt="Логотип продавца" class="" width="120" height="50">
                        {{-- //static.wbstatic.net/i/blank.gif --}}
                        <img src="" alt="" width="120" height="50">
                    </div>
                </div>
                <div class="seller-details__info">
                    <div class="seller-details__title-wrap">
                        <h2 class="seller-details__title"></h2>
                        <span class="seller-details__tip-info tip-info"
                              data-link="{tooltip tmplName='suppliersInfoTooltipster' classes='tooltip-supplier' distance=8 tmplData=model.sellerTooltipInfo pos='center bottom' trigger='click'}"
                              data-jsv="#17850^/17850^"></span></div>
                    <div class="seller-details__param"><span class="address-rate-mini hide"
                                                             data-link="class{merge: !(model.sellerExtInfo &amp;&amp; model.sellerExtInfo.rating) toggle='hide'}text{:model.sellerExtInfo &amp;&amp; model.sellerExtInfo.rating}"></span>
                        <span class="seller-details__review hide"
                              data-link="class{merge: !model.sellerExtInfo toggle='hide'}html{:~nonBreakingSpaceFormatted((model.sellerExtInfo &amp;&amp; model.sellerExtInfo.feedbacks || '0')) + ' ' +  ~pluralize(model.sellerExtInfo &amp;&amp; model.sellerExtInfo.feedbacks || 0, 'отзыв', 'отзыва', 'отзывов')}">0 отзывов</span>
                        <div class="seller-details__count-products"
                             data-link="class{merge: model.pagerModel.pagingInfo.hideTotal toggle='hide'}">
                            <span data-link="html{spaceFormatted:model.pagerModel.pagingInfo.totalItems}">13 835</span>
                            <span
                                data-link="text{pluralize:model.pagerModel.pagingInfo.totalItems 'товар' 'товара' 'товаров'}">товаров</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="seller-details__parameter-wrap"></div>
        </div>
        <div class="seller-head img-plug" style="display: none;">
            {{-- //static.wbstatic.net/i/blank.gif --}}
            <img src="" class="seller-head__img" alt="" width="1440" height="158">
        </div>
    </div>
    <div class="catalog-page__side">
        <ul class="category-side hide-mobile hide"></ul>
        <div class="sidemenu-overflow">
            <div class="">
                <ul class="sidemenu" >
                    <li class="selected opened haschild">
                        <a href="{{route('guest.category.show', $parentCategory->id)}}">Художественная литература</a>
                        <ul>
                            <li class="selected hasnochild">
                                <a href="{{route('guest.category.show', $currentCategory->id)}}">{{$currentCategory->title}}</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!--noindex-->
        @include('guest.products.filters')
        <!--/noindex-->

        <div class="sidemenu-mobile"></div>
        <button class="btn-quick-nav j-quicknav btn-quick-nav--mobile" type="button" style="display: none;">
            К началу страницы
        </button>
    </div>

    {{-- если нажата кнопка - показать большие картинки, то сюда добавляется класс catalog-big-card   --}}
    <div class="catalog-page__main new-size">
        <div class="">
            <div class="inner-sorter">

                @include('guest.products.show.catalog_sorter')

                <div class="card-sizes" data-link="">
                    <a class="card-sizes-link card-sizes-link--c516x688 active"
                       href="?cardSize=c516x688">
                    </a>
                    <a class="card-sizes-link card-sizes-link--big"
                       href="?cardSize=big">
                    </a>
                </div>
            </div>
            <div class="sorter-mobile">
                <div class="sorter-mobile__filter show-numb" data-numb="0"
                     data-link="{on model.showMobileFilters}data-numb{: model.yourChoice^length}"
                     data-jsv="#17905^/17905^">Фильтр
                </div>

                @include('guest.products.show.sorter-mobile__select')

                <div class="sorter-mobile__card-refresh"
                     data-link="class{merge: model.sizerModel.value == 'big' toggle='big'}{on model.applyNextSize}"
                     data-jsv="#17917^/17917^"></div>
            </div>
            <div class="your-choice" style="display: none;">
                <ul data-jsv-df=""></ul>
            </div>
            <div class="catalog-page__content" id="catalog-content"
                 data-addtobasket-url="/product/addtobasket"
                 data-addtoponed-url="/lk/favorites/addtoponed">
                <div class="product-card-overflow">
                    <div class="product-card-list">

                        @foreach($products as $product)
                            @include('guest.products.card.product', ['product' => $product])
                        @endforeach
                        {{-- @include('guest.products.card.static_items')--}}

                    </div>
                </div>
            </div>

            <div>

{{--                @include('vendor.pagination.default', [--}}
{{--                    'paginator' => $products,--}}
{{--                    //'elements'  => [],--}}
{{--                    'elements'  => $products,--}}
{{--                ])--}}
            </div>

            {{ $products->links('vendor.pagination.default') }}

{{--            <div class="pager-bottom">--}}
{{--                <div class="pager i-pager pagination">--}}
{{--                    <div class="pageToInsert pagination__wrapper">--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
    </div>
    <div id="divGoodsNotFound" class="hide" data-link="class{merge: !model.catalogEmpty toggle='hide'}">
        К сожалению, именно такого товара сейчас нет. Попробуйте поискать с другими параметрами или
        посмотрите все товары в категории <a data-link="text{:model.title}href{:model.emptyCatalogLink}"
                                             href="/catalog/knigi/hudozhestvennaya-literatura/detektivy">Детективы</a>.
    </div>
</div>
</div>
