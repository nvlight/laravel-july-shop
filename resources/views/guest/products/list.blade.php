<div id="catalog" class="catalog-page">
    <div class="catalog-page__breadcrumbs">
        <div data-link="">
            @include('guest.parts.breadcrumbs')
        </div>
    </div>
    <div class="catalog-title-wrap">
        <h1 class="catalog-title" >Детективы</h1>
        <span class="goods-count">
            <span class="hide">ТОП</span>
            <span>13 835</span>
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
                    <div class="seller-details__logo img-plug"><img
                            src="//static.wbstatic.net/i/v3/catalog/seller-logo-new.jpg"
                            alt="Логотип продавца"
                            data-link="class{merge: model.sellerExtInfo &amp;&amp; model.sellerExtInfo.hasLogo toggle='hide'}"
                            class="" width="120" height="50"> <img src="//static.wbstatic.net/i/blank.gif"
                                                                   data-link="src{:model.sellerExtInfo &amp;&amp; model.sellerExtInfo.hasLogo ? ('//images.wbstatic.net/shops/' + model.sellerId + '_logo.jpg'):'//static.wbstatic.net/i/blank.gif'}                     alt{>~trimWord(model.sellerInfo &amp;&amp; (model.sellerInfo.trademark || model.sellerInfo.fineName), model.sellerInfo &amp;&amp; model.sellerInfo.orgForms)}"
                                                                   alt="" width="120" height="50"></div>
                </div>
                <div class="seller-details__info">
                    <div class="seller-details__title-wrap"><h2 class="seller-details__title"
                                                                data-link="{>~trimWord(model.sellerInfo &amp;&amp; (model.sellerInfo.trademark || model.sellerInfo.fineName),  model.sellerInfo &amp;&amp; model.sellerInfo.orgForms)}"></h2>
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
            <img src="//static.wbstatic.net/i/blank.gif" class="seller-head__img" alt="" width="1440" height="158">
        </div>
    </div>
    <div class="catalog-page__side">
        <ul class="category-side hide-mobile hide"></ul>
        <div class="sidemenu-overflow">
            <div class="">
                <ul class="sidemenu" >
                    <li data-jsv="#17869^#49064_#49065_" class="selected opened haschild">
                        <a href="/catalog/knigi/hudozhestvennaya-literatura">Художественная литература</a>
                        <ul >
                            <li class="selected hasnochild">
                                <a href="/catalog/knigi/hudozhestvennaya-literatura/detektivy">Детективы</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!--noindex-->
        @include('guest.products.filters')
        <!--/noindex-->

        <div class="sidemenu-mobile"
             data-link="{include tmpl='catalogPromoMenuMobile' model}class{merge: model.menuMobileShown toggle='open'}">
        </div>
        <button class="btn-quick-nav j-quicknav btn-quick-nav--mobile" type="button" style="display: none;">
            К началу страницы
        </button>
    </div>

    {{-- если нажата кнопка - показать большие картинки, то сюда добавляется класс catalog-big-card   --}}
    <div class="catalog-page__main new-size">
        <div class="">
            <div class="inner-sorter">
                <div id="catalog_sorter" class="sort">
                    <span>Сортировать по:</span> <a class="sort-item sort_select"
                                                    href="https://www.wildberries.ru/catalog/knigi/hudozhestvennaya-literatura/detektivy?sort=popular">
                        <span>популярности</span>
                    </a> | <a class="sort-item"
                              href="https://www.wildberries.ru/catalog/knigi/hudozhestvennaya-literatura/detektivy?sort=rate">
                        <span>рейтингу</span> </a> | <a class="sort-item"
                                                        href="https://www.wildberries.ru/catalog/knigi/hudozhestvennaya-literatura/detektivy?sort=price"
                    >
                        цене<span
                            class=""></span> </a> | <a class="sort-item"
                                                       href="https://www.wildberries.ru/catalog/knigi/hudozhestvennaya-literatura/detektivy?sort=sale"
                    >
                        <span>скидке</span> </a> |
                    <a class="sort-item"
                       href="https://www.wildberries.ru/catalog/knigi/hudozhestvennaya-literatura/detektivy?sort=newly">
                        <span>обновлению</span>
                    </a>
                </div>
                <div class="card-sizes" data-link="{include tmpl='catalogCardSizePicker' ~model=model}">
                    <a class="card-sizes-link card-sizes-link--c516x688 active"
                       href="https://www.wildberries.ru/catalog/knigi/hudozhestvennaya-literatura/detektivy?cardSize=c516x688">
                    </a>
                    <a class="card-sizes-link card-sizes-link--big"
                       href="https://www.wildberries.ru/catalog/knigi/hudozhestvennaya-literatura/detektivy?cardSize=big">
                    </a>
                </div>
            </div>
            <div class="sorter-mobile">
                <div class="sorter-mobile__filter show-numb" data-numb="0"
                     data-link="{on model.showMobileFilters}data-numb{: model.yourChoice^length}"
                     data-jsv="#17905^/17905^">Фильтр
                </div>
                <div class="sorter-mobile__select">
                    <div class="select-filter">
                        <div class="select-filter__value"
                             data-link="{on model.showMobileSorter}text{:model.sorterModel.textValue}">По популярности
                        </div>
                        <div class="select-filter__list j-mobile-sorter-list">
                            <div class="select-filter__item"
                                 data-link="{on model.updateSort model.sorterModel.sortingEntries['popular']}">По популярности
                            </div>
                            <div class="select-filter__item"
                                 data-link="{on model.updateSort model.sorterModel.sortingEntries['rate']}">По рейтингу
                            </div>
                            <div class="select-filter__item"
                                 data-link="{on model.updateSort model.sorterModel.sortingEntries['pricedown']}">По цене max
                            </div>
                            <div class="select-filter__item"
                                 data-link="{on model.updateSort model.sorterModel.sortingEntries['priceup']}">По цене min
                            </div>
                            <div class="select-filter__item"
                                 data-link="{on model.updateSort model.sorterModel.sortingEntries['sale']}">По скидке
                            </div>
                            <div class="select-filter__item"
                                 data-link="{on model.updateSort model.sorterModel.sortingEntries['newly']}">По обновлению
                            </div>
                        </div>
                    </div>
                </div>
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
            <div class="pager-bottom">
                <div class="pager i-pager pagination"
                     data-link="class{merge:(model.pagerHelper &amp;&amp; model.pagerHelper.pagerModel.pagingInfo.totalPages == 0) toggle='hidden'}">
                    <div class="pageToInsert pagination__wrapper"
                         data-link="{if model.pagerHelper tmpl='catalogPagerTemplate' ~model=(model.pagerHelper &amp;&amp; model.pagerHelper.pagerModel) ~updatePage=model.updatePage.bind(model)}">
                        <span class="pagination-item pagination__item active">1</span>
                        <a href="https://www.wildberries.ru/catalog/knigi/hudozhestvennaya-literatura/detektivy?page=2"
                           class="pagination-item pagination__item" data-link="{on ~updatePage (+value)}"
                           data-jsv="#18786^/18786^">2</a>
                        <a href="https://www.wildberries.ru/catalog/knigi/hudozhestvennaya-literatura/detektivy?page=3"
                           class="pagination-item pagination__item" data-link="{on ~updatePage (+value)}"
                           data-jsv="#18787^/18787^">3</a>
                        <a href="https://www.wildberries.ru/catalog/knigi/hudozhestvennaya-literatura/detektivy?page=4"
                           class="pagination-item pagination__item" data-link="{on ~updatePage (+value)}"
                           data-jsv="#18788^/18788^">4</a>
                        <a href="https://www.wildberries.ru/catalog/knigi/hudozhestvennaya-literatura/detektivy?page=5"
                           class="pagination-item pagination__item" data-link="{on ~updatePage (+value)}"
                           data-jsv="#18789^/18789^">5</a>
                        <a href="https://www.wildberries.ru/catalog/knigi/hudozhestvennaya-literatura/detektivy?page=6"
                           class="pagination-item pagination__item" data-link="{on ~updatePage (+value)}"
                           data-jsv="#18790^/18790^">6</a>
                        <a href="https://www.wildberries.ru/catalog/knigi/hudozhestvennaya-literatura/detektivy?page=7"
                           class="pagination-item pagination__item" data-link="{on ~updatePage (+value)}"
                           data-jsv="#18791^/18791^">7</a>
                        <span class="pagination-dotes pagination__dots">...</span>
                        <a class="pagination-next pagination__next"
                           href="https://www.wildberries.ru/catalog/knigi/hudozhestvennaya-literatura/detektivy?page=2"
                           data-link="{on ~updatePage (+value)}" data-jsv="#18800^/18800^">Следующая
                            страница<span class="arrow next"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="divGoodsNotFound" class="hide" data-link="class{merge: !model.catalogEmpty toggle='hide'}">
        К сожалению, именно такого товара сейчас нет. Попробуйте поискать с другими параметрами или
        посмотрите все товары в категории <a data-link="text{:model.title}href{:model.emptyCatalogLink}"
                                             href="/catalog/knigi/hudozhestvennaya-literatura/detektivy">Детективы</a>.
    </div>
</div>
</div>
