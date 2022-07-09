<div class="product-page"
     data-link="{on 'click mouseenter mousedown' '.j-wba-card-item' cardCommonActionEventsWba}     {on 'mouseenter elementInViewportEvent' '.j-wba-card-item-show' cardCommonShowEventsWba}     class{merge: product^adult &amp;&amp;  !$adult^isConfirmed toggle='for-adults'}id{:id}"
     id="1aab5db7-e68b-6313-2da9-7ba2ce30b8ba">

    @include('guest.products.show.product_line__product_card_line')
    <div class="product-page__top-wrap">
        <div class="product-page__breadcrumbs breadcrumbs">
            <a class="breadcrumbs__back">К предыдущей странице</a>
        </div>
        <div class="product-page__share">
            <button class="btn-share" aria-label="Поделиться ссылкой на товар" type="button"></button>
        </div>
        <div class="product-page__to-poned hide-desktop" data-link="{include ponedModel tmpl=ponedModel.template}">
            <button class="" type="button" aria-label="Добавить в избранное"></button>
        </div>
    </div>

    <div class="product-page__grid">
        @include('guest.products.show.product-page__slider-wrap')
        <div class="product-page__price-block product-page__price-block--common">
            <div data-link="{include priceModel tmpl=priceModel.template ~align='alignleft bottom'}">
                <div class="price-block">
                    <div class="price-block__content">
                        <p class="price-block__price-wrap">
                            <span class="price-block__price">
                                <ins class="price-block__final-price">{{$product->price}}&nbsp;₽</ins>
                            </span>
                            <del class="price-block__old-price j-final-saving j-wba-card-item-show"
                                 data-name-for-wba="Item_PriceDetails"
                                 data-link="{tooltip tmplName='priceTooltipster' classes='i-tooltip-add-discount' distance=12 tmplData=#data pos='alignright bottom'}"
                                 data-jsv="#5763^/5763^">343&nbsp;₽
                            </del>
                        </p>
                    </div>
                </div>
            </div>
            <p class="digital-info hide"
               data-link="class{merge:!product^isDigital toggle='hide'}text{:product^isVideo ? 'Видеоматериалы будут доступны для просмотра в Личном кабинете сразу после покупки' : product^isActivationKey ? 'Ключ активации будет доступен сразу после покупки в Личном кабинете, в полной версии сайта' : 'Электронная книга будет доступна для скачивания в Личном кабинете сразу после покупки'}">
                Электронная книга будет доступна для скачивания в Личном кабинете сразу после покупки
            </p>
        </div>
        <div class="product-page__composition hide-mobile hide"
             data-link="class{merge: !product^consist || product^showMinDetails toggle='hide'}{collapsibleBlock itemSelector='.j-consist-popup' maxCollapsedHeight=40 collapsedMsg='Развернуть состав' unCollapsedMsg='Свернуть состав'}"
             data-jsv="#5493^/5493^">
            <div class="collapsable">
                <p class="collapsable__content j-consist-popup" style="max-height: 40px;">
                    <span>Состав:</span>
                    <span data-link="text{:product^consist}"></span></p>
                <div class="collapsible__bottom"></div>
            </div>
        </div>
        <div class="product-page__colors-wrap">
            <div data-link="{include selectedNomenclature^digitalLinks tmpl='digitalLinks'}{on 'click' '.j-digital-link' digitalLinkClicked}">
            </div>
            <div data-link="{include colorsModel tmpl=colorsModel.template}">
                <div data-link="id{: 'colors-' + parentId}" id="colors-1aab5db7-e68b-6313-2da9-7ba2ce30b8ba">
                    <div class="slider-color hide" data-link="class{merge:!(nomenclatures^length > 1 &amp;&amp; !showTones) toggle='hide'}">
                        <div class="sw-slider-colorpicker">
                            <button class="swiper-button-prev" type="button" tabindex="0" role="button"
                                    aria-label="Previous slide" aria-disabled="false"></button>
                            <div class="swiper-container j-swiper-color-carousel swiper-container-initialized swiper-container-horizontal"
                                id="0c0c22a5-d813-380e-b820-ff536cc7994a">
                                <ul class="swiper-wrapper"
                                    data-link="{on 'click' '.j-color' updateNomenclature}{on 'mouseenter' '.j-color' showMiniCarousel}{on 'mouseleave' '.j-color' hideMiniCarousel}"
                                    data-jsv-df="" data-jsv="#5501^/5501^#5502^/5502^#5503^/5503^"
                                    style="transition-duration: 0ms;">
                                    <li data-jsv="#5498^#17657_#17658_" class="j-color swiper-slide active"
                                        data-link="class{merge: ~currentNmId == nmId toggle='active'}class{merge: allSizesSoldOut toggle='blur'}">
                                        <a class="img-plug"
                                           href="https://www.wildberries.ru/catalog/9414496/detail.aspx" aria-label="">
                                            <img loading="lazy" src="//images.wbstatic.net/tm/new/9410000/9414496-1.jpg"
                                                 alt="" title="" width="72" height="96"> </a></li>
                                </ul>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                            <button class="swiper-button-next" type="button" tabindex="0" role="button"
                                    aria-label="Next slide" aria-disabled="false"></button>
                        </div>
                    </div>
                </div>
                <script type="jsv/17656_"></script>
            </div>
            <div class="product-page__options" data-link="class{merge: !product^showMinDetails toggle='hide'}">
                <div class=""
                     data-link="class{merge: !(product^groupedAddedOptions &amp;&amp; product^groupedAddedOptions^length > 0) toggle='hide'}">
                    <div class="product-params"
                         data-link="{include tmpl='productCardOptions' ^~groupedAddedOptions=product^minGroupedAddedOptions ~showCategoryName=true}">
                        <script type="jsv#17659_"></script>
                        <script type="jsv#17660_"></script>
                        <script type="jsv#17661_"></script>
                        <table class="product-params__table">
                            <caption data-jsv="#5509^#17662_" class="product-params__caption">Дополнительная
                                информация
                            </caption>
                            <tbody data-jsv="/17662_/5509^" data-jsv-df="">
                            <tr data-jsv="#5520^#17663_#17664_" class="product-params__row">
                                <th class="product-params__cell"><span class="product-params__cell-decor"><span><script
                                                type="jsv#5510^"></script>Автор<script type="jsv/5510^"></script></span></span>
                                </th>
                                <td class="product-params__cell">
                                    <script type="jsv#5511^"></script>
                                    Агата Кристи
                                    <script type="jsv/5511^"></script>
                                </td>
                            </tr>
                            <tr data-jsv="/17664_#17665_" class="product-params__row">
                                <th class="product-params__cell"><span class="product-params__cell-decor"><span><script
                                                type="jsv#5512^"></script>Вес товара с упаковкой (г)<script
                                                type="jsv/5512^"></script></span></span></th>
                                <td class="product-params__cell">
                                    <script type="jsv#5513^"></script>
                                    135 г
                                    <script type="jsv/5513^"></script>
                                </td>
                            </tr>
                            <tr data-jsv="/17665_#17666_" class="product-params__row">
                                <th class="product-params__cell"><span class="product-params__cell-decor"><span><script
                                                type="jsv#5514^"></script>Вид бумаги<script
                                                type="jsv/5514^"></script></span></span></th>
                                <td class="product-params__cell">
                                    <script type="jsv#5515^"></script>
                                    газетная
                                    <script type="jsv/5515^"></script>
                                </td>
                            </tr>
                            <tr data-jsv="/17666_#17667_" class="product-params__row">
                                <th class="product-params__cell"><span class="product-params__cell-decor"><span><script
                                                type="jsv#5516^"></script>Возрастные ограничения<script
                                                type="jsv/5516^"></script></span></span></th>
                                <td class="product-params__cell">
                                    <script type="jsv#5517^"></script>
                                    16+
                                    <script type="jsv/5517^"></script>
                                </td>
                            </tr>
                            <tr data-jsv="/17667_#17668_" class="product-params__row">
                                <th class="product-params__cell"><span class="product-params__cell-decor"><span><script
                                                type="jsv#5518^"></script>Высота предмета<script
                                                type="jsv/5518^"></script></span></span></th>
                                <td class="product-params__cell">
                                    <script type="jsv#5519^"></script>
                                    16.5 см
                                    <script type="jsv/5519^"></script>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <script type="jsv/17661_"></script>
                        <script type="jsv/17660_"></script>
                        <script type="jsv/17659_"></script>
                    </div>
                </div>
                <a class=""
                   data-link="{on $moveToAnchor 'options' true false 84}class{merge: !showMinAddedOptions() toggle='hide'}"
                   href="#options" data-jsv="#5522^/5522^">Все характеристики</a></div>
            <div class="product-page__sizes-wrap hide"
                 data-link="class{merge: !selectedNomenclature^showSize toggle='hide'}{include sizeModel tmpl=sizeModel.template}">
            </div>
        </div>

        <div class="product-page__header-wrap">
            <div class="product-page__header">
                <a class="hide-desktop" data-link="text{:product^brandName}href{:product^brandUrl}" href="/brands/eksmo">Эксмо</a>
                @if( !str_contains('/', $product->title))
                    <span class="hide-mobile" data-link="text{:product^brandName}">{{$product->title}}</span>
                    <h1 data-link="text{:product^goodsName}"></h1></div>
                @else
                    <span class="hide-mobile" data-link="text{:product^brandName}">{{explode('/', $product->title)[0]}}</span>
                    <h1 data-link="text{:product^goodsName}">{{explode('/', $product->title)[1]}}</h1></div>
                @endif
            <div class="product-page__spec-action">
                <div class="spec-action hide"
                     data-link="class{merge:(selectedNomenclature^promoText == null || selectedNomenclature^promoText == '')  toggle='hide'}     {include tmpl='productCardPromoText'}style{:~getCustomPromoPanelStyle(selectedNomenclature^promoText)}">
                    <span class="spec-action__text" data-link="text{:selectedNomenclature^promoText}"></span>
                </div>
            </div>
            <div class="product-page__common-info">
                <a class="product-review j-wba-card-item" id="comments_reviews_link"
                      data-name-for-wba="Item_Feedback_Top"
                      data-link="{on isPopup ? $void : $moveToAnchor 'footerTabs' true true 84}href{urlForGood:selectedNomenclature^nmId true targetInfo^targetUrl 'Comments' isAdv}"
                      href="https://www.wildberries.ru/catalog/9414496/detail.aspx?targetUrl=GP#Comments"
                      data-jsv="#5536^/5536^">
                    <span class="product-review__rating stars-line star5"
                        data-link="class{: 'product-review__rating stars-line star' + product^star}">
                        <span data-link="text{: product^star}">5</span>
                    </span>
                    <span class="product-review__count-review" data-link="{include tmpl='productCardCommentsCount'}">261 отзыв</span>
                </a>
                <p class="product-article"><span class="hide-mobile">Артикул:</span>
                    <span class="hide-desktop">Арт:</span>
                    <span id="productNmId"
                       data-link="text{: selectedNomenclature^nmId}{on copyNmId}"
                       data-jsv="#5544^/5544^">9414496</span></p>
                <p class="product-order-quantity j-orders-count-wrapper"
                   data-link="class{merge: selectedNomenclature^ordersCount < 1 || isPopup toggle='hide'}">Купили
                    <span data-link="{include tmpl='productCardOrderCount' ^~ordersCount=selectedNomenclature^ordersCount}">
                        более 7&nbsp;600 раз
                    </span></p>
            </div>
        </div>

        <section class="product-page__details-section details-section">
            <div class="details-section__header-wrap" id="options"><h2 class="details-section__header">О товаре</h2>
                <div data-link="{if promoUrl tmpl='spaProductPromoUrl'}"></div>
            </div>

            @include('guest.products.show.details-section__inner-wrap')

            <div class="details-section__details details-section__details--about details">
                <div class="details__content collapsable"
                     data-link="class{merge: !(product^groupedAddedOptions &amp;&amp; product^groupedAddedOptions^length > 0) toggle='hide'}">
                    <div
                        data-link="{collapsibleBlock btnClass='j-parameters-btn j-wba-card-item j-wba-card-item-show' nameForWba='Item_Parameters_More' itemSelector='.j-add-info-section' maxCollapsedHeight=(~wbSettings^displayMode=='m' ? 76 : 224) collapsedMsg='Развернуть характеристики' unCollapsedMsg='Свернуть характеристики' useGradient=true}"
                        data-jsv="#5559^/5559^">
                        <div class="collapsable__content j-add-info-section" style="max-height: 224px;">
                            <div class="product-params"
                                 data-link="{include tmpl='productCardOptions' ^~groupedAddedOptions=product^groupedAddedOptions ~showCategoryName=true}">
                                <table class="product-params__table">
                                    <caption data-jsv="#5560^#17678_" class="product-params__caption">Дополнительная
                                        информация
                                    </caption>
                                    <tbody data-jsv="/17678_/5560^" data-jsv-df="">
                                    <tr data-jsv="#5591^#17679_#17680_" class="product-params__row">
                                        <th class="product-params__cell"><span class="product-params__cell-decor"><span><script
                                                        type="jsv#5561^"></script>Автор<script
                                                        type="jsv/5561^"></script></span></span></th>
                                        <td class="product-params__cell">
                                            Агата Кристи
                                        </td>
                                    </tr>
                                    <tr data-jsv="/17680_#17681_" class="product-params__row">
                                        <th class="product-params__cell"><span class="product-params__cell-decor"><span><script
                                                        type="jsv#5563^"></script>Вес товара с упаковкой (г)<script
                                                        type="jsv/5563^"></script></span></span></th>
                                        <td class="product-params__cell">
                                            135 г
                                        </td>
                                    </tr>
                                    <tr data-jsv="/17681_#17682_" class="product-params__row">
                                        <th class="product-params__cell"><span class="product-params__cell-decor"><span><script
                                                        type="jsv#5565^"></script>Вид бумаги<script
                                                        type="jsv/5565^"></script></span></span></th>
                                        <td class="product-params__cell">
                                            газетная
                                        </td>
                                    </tr>
                                    <tr data-jsv="/17682_#17683_" class="product-params__row">
                                        <th class="product-params__cell"><span class="product-params__cell-decor"><span><script
                                                        type="jsv#5567^"></script>Возрастные ограничения<script
                                                        type="jsv/5567^"></script></span></span></th>
                                        <td class="product-params__cell">
                                            <script type="jsv#5568^"></script>
                                            16+
                                            <script type="jsv/5568^"></script>
                                        </td>
                                    </tr>
                                    <tr data-jsv="/17683_#17684_" class="product-params__row">
                                        <th class="product-params__cell"><span class="product-params__cell-decor"><span><script
                                                        type="jsv#5569^"></script>Высота предмета<script
                                                        type="jsv/5569^"></script></span></span></th>
                                        <td class="product-params__cell">
                                            <script type="jsv#5570^"></script>
                                            16.5 см
                                            <script type="jsv/5570^"></script>
                                        </td>
                                    </tr>
                                    <tr data-jsv="/17684_#17685_" class="product-params__row">
                                        <th class="product-params__cell"><span class="product-params__cell-decor"><span><script
                                                        type="jsv#5571^"></script>Год выпуска<script
                                                        type="jsv/5571^"></script></span></span></th>
                                        <td class="product-params__cell">
                                            <script type="jsv#5572^"></script>
                                            2019
                                            <script type="jsv/5572^"></script>
                                        </td>
                                    </tr>
                                    <tr data-jsv="/17685_#17686_" class="product-params__row">
                                        <th class="product-params__cell"><span class="product-params__cell-decor"><span><script
                                                        type="jsv#5573^"></script>Жанры/тематика<script
                                                        type="jsv/5573^"></script></span></span></th>
                                        <td class="product-params__cell">
                                            <script type="jsv#5574^"></script>
                                            Детективы для взрослых
                                            <script type="jsv/5574^"></script>
                                        </td>
                                    </tr>
                                    <tr data-jsv="/17686_#17687_" class="product-params__row">
                                        <th class="product-params__cell"><span class="product-params__cell-decor"><span><script
                                                        type="jsv#5575^"></script>Иллюстратор<script
                                                        type="jsv/5575^"></script></span></span></th>
                                        <td class="product-params__cell">
                                            <script type="jsv#5576^"></script>
                                            коллектив иллюстраторов
                                            <script type="jsv/5576^"></script>
                                        </td>
                                    </tr>
                                    <tr data-jsv="/17687_#17688_" class="product-params__row">
                                        <th class="product-params__cell"><span class="product-params__cell-decor"><span><script
                                                        type="jsv#5577^"></script>Количество страниц<script
                                                        type="jsv/5577^"></script></span></span></th>
                                        <td class="product-params__cell">
                                            <script type="jsv#5578^"></script>
                                            288 шт.
                                            <script type="jsv/5578^"></script>
                                        </td>
                                    </tr>
                                    <tr data-jsv="/17688_#17689_" class="product-params__row">
                                        <th class="product-params__cell"><span class="product-params__cell-decor"><span><script
                                                        type="jsv#5579^"></script>Обложка<script
                                                        type="jsv/5579^"></script></span></span></th>
                                        <td class="product-params__cell">
                                            <script type="jsv#5580^"></script>
                                            мягкая
                                            <script type="jsv/5580^"></script>
                                        </td>
                                    </tr>
                                    <tr data-jsv="/17689_#17690_" class="product-params__row">
                                        <th class="product-params__cell"><span class="product-params__cell-decor"><span><script
                                                        type="jsv#5581^"></script>Серия<script
                                                        type="jsv/5581^"></script></span></span></th>
                                        <td class="product-params__cell">
                                            <script type="jsv#5582^"></script>
                                            Агата Кристи. Любимая коллекция (обложка)
                                            <script type="jsv/5582^"></script>
                                        </td>
                                    </tr>
                                    <tr data-jsv="/17690_#17691_" class="product-params__row">
                                        <th class="product-params__cell"><span class="product-params__cell-decor"><span><script
                                                        type="jsv#5583^"></script>Ширина предмета<script
                                                        type="jsv/5583^"></script></span></span></th>
                                        <td class="product-params__cell">
                                            <script type="jsv#5584^"></script>
                                            11.3 см
                                            <script type="jsv/5584^"></script>
                                        </td>
                                    </tr>
                                    <tr data-jsv="/17691_#17692_" class="product-params__row">
                                        <th class="product-params__cell"><span class="product-params__cell-decor"><span><script
                                                        type="jsv#5585^"></script>Языки<script
                                                        type="jsv/5585^"></script></span></span></th>
                                        <td class="product-params__cell">
                                            <script type="jsv#5586^"></script>
                                            русский
                                            <script type="jsv/5586^"></script>
                                        </td>
                                    </tr>
                                    <tr data-jsv="/17692_#17693_" class="product-params__row">
                                        <th class="product-params__cell"><span class="product-params__cell-decor"><span><script
                                                        type="jsv#5587^"></script>Страна производства<script
                                                        type="jsv/5587^"></script></span></span></th>
                                        <td class="product-params__cell">
                                            <script type="jsv#5588^"></script>
                                            Россия
                                            <script type="jsv/5588^"></script>
                                        </td>
                                    </tr>
                                    <tr data-jsv="/17693_#17694_" class="product-params__row">
                                        <th class="product-params__cell"><span class="product-params__cell-decor"><span><script
                                                        type="jsv#5589^"></script>Комплектация<script
                                                        type="jsv/5589^"></script></span></span></th>
                                        <td class="product-params__cell">
                                            <script type="jsv#5590^"></script>
                                            книга
                                            <script type="jsv/5590^"></script>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <script type="jsv/17677_"></script>
                                <script type="jsv/17676_"></script>
                                <script type="jsv/17675_"></script>
                            </div>
                        </div>
                        <div class="collapsible__bottom">
                            <script type="jsv#17732_"></script>
                            <script type="jsv#5754^"></script>
                            <script type="jsv#17733_"></script>
                            <div class="collapsible__gradient"
                                 data-link="class{merge: !isCollapsed toggle='hide'}"></div>
                            <script type="jsv/17733_"></script>
                            <script type="jsv/5754^"></script>
                            <script type="jsv#5755^"></script>
                            <script type="jsv#17734_"></script>
                            <div class="collapsible__toggle-wrap">
                                <button
                                    class="collapsible__toggle j-parameters-btn j-wba-card-item j-wba-card-item-show"
                                    data-name-for-wba="Item_Parameters_More"
                                    data-link="text{:isCollapsed ? collapsedMsg : unCollapsedMsg}{on toggleCollapse !isCollapsed}"
                                    type="button" data-jsv="#5758^/5758^">Развернуть характеристики
                                </button>
                            </div>
                            <script type="jsv/17734_"></script>
                            <script type="jsv/5755^"></script>
                            <script type="jsv/17732_"></script>
                        </div>
                    </div>
                </div>
                <div class="details-section__description-error description-error hide-mobile"
                     data-link="{include describtionErrorModel tmpl=describtionErrorModel.template}">
                    <script type="jsv#17695_"></script>
                    <div class="description-error">
                        <p class="description-error__text"> Вся информация о товаре справочная и основывается на
                            последних сведениях от производителя.
                            <button
                                class="description-error__btn j-description-error-btn j-wba-card-item j-wba-card-item-show hide"
                                data-name-for-wba="Item_Inaccuracy"
                                data-link="class{merge: !~globalSettings.switches.enableContentErrorApi || hideContentError toggle='hide'}{on showErrorInformer}"
                                type="button" data-jsv="#5594^/5594^"><span>Сообщить о неточности</span></button>
                        </p>
                    </div>
                    <script type="jsv/17695_"></script>
                </div>
            </div>
        </section>
        <div class="product-page__delivery-advantages"
             data-link="class{merge: (!selectedNomenclature^enabledForRegion || selectedNomenclature^allSizesSoldOut) &amp;&amp; ~wbSettings.displayMode == 'm' toggle='hide'}">
            <div class="product-page__delivery-wrap"
                 data-link="class{merge: !selectedNomenclature^enabledForRegion || selectedNomenclature^allSizesSoldOut toggle='hide'}">
                <p class="digital-info hide"
                   data-link="class{merge:!product^isDigital toggle='hide'}text{:product^isVideo ? 'Видеоматериалы будут доступны для просмотра в Личном кабинете сразу после покупки' : product^isActivationKey ? 'Ключ активации будет доступен сразу после покупки в Личном кабинете, в полной версии сайта' : 'Электронная книга будет доступна для скачивания в Личном кабинете сразу после покупки'}">
                    Электронная книга будет доступна для скачивания в Личном кабинете сразу после покупки</p>
                <div class="product-page__delivery"
                     data-link="class{merge: !selectedNomenclature^deliveryInfoEnable toggle='hide'}">
                    <div data-link="{include deliveryHelper^deliveryInfoModel tmpl=deliveryHelper^template}">
                        <div class="delivery">
                            <p class="delivery__row">
                                <span class="delivery__title">2-4 июля</span>
                                <script type="jsv#17771_"></script>
                                <span class="delivery__info"><script type="jsv#17772_"></script>доставит Wildberries
                                    <span class="delivery__store"> со&nbsp;склада&nbsp;Коледино WB</span>
                                </span>
                                <span></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-page__links hide-mobile">
                <p class="j-wba-card-item" data-name-for-wba="Item_Brand_Name" data-link="class{merge: !product^brandUrl toggle='hide'}">
                    <a data-link="href{:product^brandUrl}" href="/brands/eksmo">Все товары <span
                            data-link="text{:product^brandName}">Эксмо</span></a></p>
                <p class="j-wba-card-item hide"
                   data-link="class{merge: !(product^brandAndSubjectUrl &amp;&amp; product^subjectName) toggle='hide'}"
                   data-name-for-wba="Item_Brand_Category"><a
                        data-link="href{: product^brandAndSubjectUrl}{on $analitic.proceedAndSave 'IBC'}"
                        data-jsv="#5608^/5608^">Все <span
                            data-link="text{toLower: (product^subjectName || '')}">книги</span> <span
                            data-link="text{:product^brandName}">Эксмо</span></a></p>
                <p class="j-wba-card-item hide"
                   data-link="class{merge: !(product^categoryUrl &amp;&amp; product^subjectName) toggle='hide'}"
                   data-name-for-wba="Item_Category"><a
                        data-link="href{:product^categoryUrl}{on $analitic.proceedAndSave 'ICC'}"
                        data-jsv="#5613^/5613^">Все <span
                            data-link="text{toLower: (product^subjectName || '')}">книги</span> в категории</a>
                </p>
            </div>

            <div class="product-page__advantages advantages"
                 data-link="class{merge: !selectedNomenclature^enabledForRegion || selectedNomenclature^allSizesSoldOut || product^isDigital toggle='hide'}">
                <ul class="advantages__list">
                    <li class="advantages__item advantages__item--delivery"
                        data-link="class{merge:selectedNomenclature^addToBookingEnable || selectedNomenclature^isComputedDeliveryCost || selectedNomenclature^allSizesSoldOut toggle='hide'}">
                        Бесплатная доставка
                    </li>
                    <li class="advantages__item advantages__item--refund hide"
                        data-link="class{merge:product.nonRefundable||selectedNomenclature^allSizesSoldOut || (deliveryHelper.deliveryInfoModel &amp;&amp; deliveryHelper.deliveryInfoModel^isCargo) toggle='hide'}">
                        21 день на возврат
                    </li>
                    <li class="advantages__item advantages__item--fitting hide"
                        data-link="class{merge: selectedNomenclature^isCargo || !product.canFit toggle='hide'}">Примерка
                    </li>
                    <li class="advantages__item advantages__item--rise hide"
                        data-link="class{merge:!(deliveryHelper.deliveryInfoModel &amp;&amp; deliveryHelper.deliveryInfoModel^isCargo) || (deliveryHelper.deliveryInfoModel &amp;&amp; deliveryHelper.deliveryInfoModel^isComputedDeliveryCost) toggle='hide'}">
                        Бесплатный подъем на этаж
                    </li>
                    <li class="advantages__item advantages__item--fake"></li>
                </ul>
            </div>
            <div class="product-page__alcohol-warning alcohol-warning hide"
                 data-link="class{merge: !selectedNomenclature^enabledForRegion || selectedNomenclature^allSizesSoldOut || !selectedNomenclature^addToBookingEnable || !product.adult toggle='hide'}">
                <p class="alcohol-warning__text">Wildberries не продаёт и не доставляет алкогольную продукцию. Вы можете
                    забронировать интересующий товар и забрать его в магазинах партнёров.</p>
                <p class="warning-info-alcohol">Черезмерное употребление алкоголя вредит здоровью</p></div>
        </div>
        <div class="product-page__seller-wrap"
             data-link="{include (suppliersHelper &amp;&amp; suppliersHelper^currentSupplier) tmpl=(suppliersHelper &amp;&amp; suppliersHelper.template) ~showSellerCatalog=true ~cardFullModel=false}">
            <div class="seller-info">
                <div class="seller-info__header">
                    <div class="seller-info__wrap">
                        <div class="seller-info__title">
                            <script type="jsv#17799_"></script>
                            <a href="/seller/8969" class="seller-info__name seller-info__name--link">ТД Эксмо</a>
                            <script type="jsv/17799_"></script>
                            <span class="seller-info__tip-info tip-info"
                                  data-link="{tooltip tmplName='suppliersInfoTooltipster' classes='tooltip-supplier' distance=8 tmplData=#data pos='center bottom' trigger='click'}"
                                  data-jsv="#5800^/5800^"></span></div>
                        <div class="seller-info__param">
                            <script type="jsv#17800_"></script>
                            <span class="address-rate-mini">4.7</span>
                            <script type="jsv/17800_"></script>
                            <script type="jsv#17801_"></script>
                            <span class="seller-info__review"><script type="jsv#17802_"></script>179 008<script
                                    type="jsv/17802_"></script> отзывов на товары</span>
                            <script type="jsv/17801_"></script>
                        </div>
                    </div>
                    <script type="jsv#17803_"></script>
                    <a class="seller-info__logo img-plug" href="/seller/8969">
                        <script type="jsv#17804_"></script>
                        <img src="//images.wbstatic.net/shops/8969_logo.jpg" alt="ТД Эксмо" width="96" height="40">
                        <script type="jsv/17804_"></script>
                    </a>
                    <script type="jsv/17803_"></script>
                </div>
                <script type="jsv#17805_"></script>
                <ul class="seller-info__list" data-jsv-df="">
                    <li data-jsv="#17806_" class="seller-info__item seller-info__item--delivered"><b
                            class="seller-info__value">
                            <script type="jsv#17807_"></script>
                            12 269 914
                            <script type="jsv/17807_"></script>
                        </b>
                        <p class="seller-info__desc">проданных товаров</p></li>
                    <li data-jsv="/17806_#17808_" class="seller-info__item seller-info__item--time"><b
                            class="seller-info__value">
                            <script type="jsv#17809_"></script>
                            7 лет и 6 мес
                            <script type="jsv/17809_"></script>
                        </b>
                        <p class="seller-info__desc">
                            <script type="jsv#17810_"></script>
                            продает
                            <script type="jsv/17810_"></script>
                            на Wildberries
                        </p>
                    </li>
                    <li data-jsv="/17808_#17811_" class="seller-info__item seller-info__item--delivery"><b
                            class="seller-info__value">99.8%</b>
                        <p class="seller-info__desc">доставок вовремя</p></li>
                    <li data-jsv="/17811_#17812_" class="seller-info__item seller-info__item--defective"><b
                            class="seller-info__value">0.1%</b>
                        <p class="seller-info__desc">товаров с браком</p></li>
                </ul>
                <script type="jsv/17805_"></script>
                <script type="jsv#17813_"></script>
                <a href="/seller/8969" class="seller-info__link hide-desktop">Перейти в магазин продавца</a>
                <script type="jsv/17813_"></script>
            </div>
            <script type="jsv/17798_"></script>
            <script type="jsv/5795^"></script>
            <script type="jsv/17794_"></script>
        </div>
        <div class="product-page__order">
            <div class="product-page__order-container" data-link="{include orderModel tmpl=orderModel.template}">
                <script type="jsv#17698_"></script>
                <div class="order" data-link="class{merge: isDigital toggle='hide'}">
                    <button class="order__btn-buy btn-base hide"
                            data-link="class{merge: !showAddToBasketBtn() || !userIsAuth || isPreorder toggle='hide'}{on $adult.proceedIfAdultConfirmed adult buyItNow #data}"
                            data-jsv="#5625^/5625^">Купить сейчас
                    </button>
                    <button class="btn-main"
                            data-link="class{merge: !showAddToBasketBtn() toggle='hide'}{on $adult.proceedIfAdultConfirmed adult addToBasket #data}"
                            data-jsv="#5627^/5627^"><span class="hide-mobile"
                                                          data-link="(isPreorder ? 'Предзаказ' : 'Добавить в корзину')">Добавить в корзину</span>
                        <span class="hide-desktop" data-link="(isPreorder ? 'Предзаказ' : 'В корзину')">В корзину</span>
                    </button>
                    <a class="btn-base j-go-to-basket hide" href="/lk/basket"
                       data-link="class{merge: !addedToBasket toggle='hide'}"> Перейти в корзину </a>
                    <button class="btn-main hide"
                            data-link="class{merge: !showAddToBookingBtn() toggle='hide' onError='hide'}{on $adult.proceedIfAdultConfirmed adult addToBooking #data}"
                            data-jsv="#5632^/5632^"> Забронировать
                    </button>
                    <div class="order__btn-qt btn-qt-goods hide"
                         data-link="class{merge: !showQntCntBookingBtns() toggle='hide' onError='hide'}">
                        <button class="btn-qt-goods__edit btn-qt-goods__edit--minus" onerror=""
                                data-link="{on $services.booking.changeQty (selectedSize &amp;&amp; selectedSize^characteristicId) (-1)}"
                                data-jsv="#5634^/5634^">-
                        </button>
                        <a href="/lk/booking" class="btn-qt-goods__text">В корзине <span onerror=""
                                                                                         data-link="text{:(selectedSize ? $services.booking.getQty(selectedSize &amp;&amp; selectedSize^characteristicId) : '')}">0</span>
                            шт.</a>
                        <button class="btn-qt-goods__edit btn-qt-goods__edit--plus" onerror=""
                                data-link="class{merge: selectedSize &amp;&amp; ($services.booking.getQty(selectedSize &amp;&amp; selectedSize^characteristicId) >= (selectedSize &amp;&amp; selectedSize.quantity)) toggle='disabled'}{on $services.booking.changeQty (selectedSize &amp;&amp; selectedSize^characteristicId) 1}"
                                data-jsv="#5637^/5637^">+
                        </button>
                    </div>
                    <button class="btn-main hide"
                            data-link="class{merge: !showAddToWlBtn() toggle='hide'}{on $adult.proceedIfAdultConfirmed adult addToWl #data}"
                            data-jsv="#5639^/5639^"> В избранное
                    </button>
                    <p class="btn-main disabled j-add-to-wait-msg hide"
                       data-link="class{merge: !addedToWl toggle='hide'}"> Добавлено в избранное </p></div>
                <script type="jsv#17699_"></script>
                <button class="order-to-poned hide-mobile btn-heart-black" type="button"
                        aria-label="Добавить в избранное"
                        data-link="class{merge: !showAddToPoned() toggle='hide'}class{merge: isItemPoned() toggle='active'}{on $adult.proceedIfAdultConfirmed adult togglePonedStatus #data}"
                        data-jsv="#5643^/5643^"></button>
                <script type="jsv/17699_"></script>
                <script type="jsv/17698_"></script>
            </div>
            <div class="product-page__order-delivery hide-desktop"
                 data-link="class{merge: !selectedNomenclature^deliveryInfoEnable toggle='hide'}">
                <div data-link="{include deliveryHelper^deliveryInfoModel tmpl=deliveryHelper^template}">
                    <script type="jsv#17774_"></script>
                    <script type="jsv#5786^"></script>
                    <script type="jsv#17775_"></script>
                    <div class="delivery">
                        <script type="jsv#5785^"></script>
                        <script type="jsv#17776_"></script>
                        <p class="delivery__row">
                            <script type="jsv#17777_"></script>
                            <span class="delivery__title">                        <script type="jsv#17778_"></script>2-4 июля<script
                                    type="jsv/17778_"></script>                    </span>
                            <script type="jsv#17779_"></script>
                            <span class="delivery__info">                        <script type="jsv#17780_"></script>                            доставит Wildberries<span
                                    class="delivery__store"> со&nbsp;склада&nbsp;Коледино WB</span>                        <script
                                    type="jsv/17780_"></script>                    </span>
                            <script type="jsv/17779_"></script>
                            <script type="jsv/17777_"></script>
                            <script type="jsv#5784^"></script>
                            <script type="jsv#17781_"></script>
                            <span>                                    </span>
                            <script type="jsv/17781_"></script>
                            <script type="jsv/5784^"></script>
                        </p>
                        <script type="jsv/17776_"></script>
                        <script type="jsv/5785^"></script>
                    </div>
                    <script type="jsv/17775_"></script>
                    <script type="jsv/5786^"></script>
                    <script type="jsv/17774_"></script>
                </div>
            </div>
        </div>

        <div class="product-page__aside">
            <div class="product-page__aside-sticky">
                <div class="product-page__aside-container j-price-block">
                    <div class="product-page__price-block product-page__price-block--aside"
                         data-link="{include priceModel tmpl=priceModel.template ~align='aligncenter bottom'}">
                        <div class="price-block">
                            <div class="price-block__content">
                                <p class="price-block__price-wrap">
                                    <span class="price-block__price">
                                        <ins class="price-block__final-price">{{$product->price}}&nbsp;₽</ins>
                                    </span>
                                    <del class="price-block__old-price j-final-saving j-wba-card-item-show"
                                         data-name-for-wba="Item_PriceDetails"
                                         data-link="{tooltip tmplName='priceTooltipster' classes='i-tooltip-add-discount' distance=12 tmplData=#data pos='alignright bottom'}"
                                         data-jsv="#5768^/5768^">343&nbsp;₽
                                    </del>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div data-link="{include orderModel tmpl=orderModel.template}">
                        <div class="order" data-link="class{merge: isDigital toggle='hide'}">
                            <button class="order__btn-buy btn-base hide"
                                    data-link="class{merge: !showAddToBasketBtn() || !userIsAuth || isPreorder toggle='hide'}{on $adult.proceedIfAdultConfirmed adult buyItNow #data}"
                                    data-jsv="#5660^/5660^">Купить сейчас
                            </button>
                            <button class="btn-main"
                                    data-link="class{merge: !showAddToBasketBtn() toggle='hide'}{on $adult.proceedIfAdultConfirmed adult addToBasket #data}"
                                    data-jsv="#5662^/5662^"><span class="hide-mobile"
                                                                  data-link="(isPreorder ? 'Предзаказ' : 'Добавить в корзину')">Добавить в корзину</span>
                                <span class="hide-desktop" data-link="(isPreorder ? 'Предзаказ' : 'В корзину')">В корзину</span>
                            </button>
                            <a class="btn-base j-go-to-basket hide" href="/lk/basket"
                               data-link="class{merge: !addedToBasket toggle='hide'}"> Перейти в корзину </a>
                            <button class="btn-main hide"
                                    data-link="class{merge: !showAddToBookingBtn() toggle='hide' onError='hide'}{on $adult.proceedIfAdultConfirmed adult addToBooking #data}"
                                    data-jsv="#5667^/5667^"> Забронировать
                            </button>
                            <div class="order__btn-qt btn-qt-goods hide"
                                 data-link="class{merge: !showQntCntBookingBtns() toggle='hide' onError='hide'}">
                                <button class="btn-qt-goods__edit btn-qt-goods__edit--minus" onerror=""
                                        data-link="{on $services.booking.changeQty (selectedSize &amp;&amp; selectedSize^characteristicId) (-1)}"
                                        data-jsv="#5669^/5669^">-
                                </button>
                                <a href="/lk/booking" class="btn-qt-goods__text">В корзине <span onerror=""
                                                                                                 data-link="text{:(selectedSize ? $services.booking.getQty(selectedSize &amp;&amp; selectedSize^characteristicId) : '')}">0</span>
                                    шт.</a>
                                <button class="btn-qt-goods__edit btn-qt-goods__edit--plus" onerror=""
                                        data-link="class{merge: selectedSize &amp;&amp; ($services.booking.getQty(selectedSize &amp;&amp; selectedSize^characteristicId) >= (selectedSize &amp;&amp; selectedSize.quantity)) toggle='disabled'}{on $services.booking.changeQty (selectedSize &amp;&amp; selectedSize^characteristicId) 1}"
                                        data-jsv="#5672^/5672^">+
                                </button>
                            </div>
                            <button class="btn-main hide"
                                    data-link="class{merge: !showAddToWlBtn() toggle='hide'}{on $adult.proceedIfAdultConfirmed adult addToWl #data}"
                                    data-jsv="#5674^/5674^"> В избранное
                            </button>
                            <p class="btn-main disabled j-add-to-wait-msg hide"
                               data-link="class{merge: !addedToWl toggle='hide'}"> Добавлено в избранное </p></div>
                        <script type="jsv#17706_"></script>
                        <button class="order-to-poned hide-mobile btn-heart-black" type="button"
                                aria-label="Добавить в избранное"
                                data-link="class{merge: !showAddToPoned() toggle='hide'}class{merge: isItemPoned() toggle='active'}{on $adult.proceedIfAdultConfirmed adult togglePonedStatus #data}"
                                data-jsv="#5678^/5678^"></button>
                        <script type="jsv/17706_"></script>
                        <script type="jsv/17705_"></script>
                    </div>
                    <p class="digital-info hide"
                       data-link="class{merge:!product^isDigital toggle='hide'}text{:product^isVideo ? 'Видеоматериалы будут доступны для просмотра в Личном кабинете сразу после покупки' : product^isActivationKey ? 'Ключ активации будет доступен сразу после покупки в Личном кабинете, в полной версии сайта' : 'Электронная книга будет доступна для скачивания в Личном кабинете сразу после покупки'}">
                        Электронная книга будет доступна для скачивания в Личном кабинете сразу после покупки</p>
                    <div class="product-page__delivery"
                         data-link="class{merge: !selectedNomenclature^deliveryInfoEnable toggle='hide'}">
                        <div data-link="{include deliveryHelper^deliveryInfoModel tmpl=deliveryHelper^template}">
                            <script type="jsv#17782_"></script>
                            <script type="jsv#5789^"></script>
                            <script type="jsv#17783_"></script>
                            <div class="delivery">
                                <script type="jsv#5788^"></script>
                                <script type="jsv#17784_"></script>
                                <p class="delivery__row">
                                    <script type="jsv#17785_"></script>
                                    <span class="delivery__title">                        <script
                                            type="jsv#17786_"></script>2-4 июля<script type="jsv/17786_"></script>                    </span>
                                    <script type="jsv#17787_"></script>
                                    <span class="delivery__info">                        <script
                                            type="jsv#17788_"></script>                            доставит Wildberries<span
                                            class="delivery__store"> со&nbsp;склада&nbsp;Коледино WB</span>                        <script
                                            type="jsv/17788_"></script>                    </span>
                                    <script type="jsv/17787_"></script>
                                    <script type="jsv/17785_"></script>
                                    <script type="jsv#5787^"></script>
                                    <script type="jsv#17789_"></script>
                                    <span>                                    </span>
                                    <script type="jsv/17789_"></script>
                                    <script type="jsv/5787^"></script>
                                </p>
                                <script type="jsv/17784_"></script>
                                <script type="jsv/5788^"></script>
                            </div>
                            <script type="jsv/17783_"></script>
                            <script type="jsv/5789^"></script>
                            <script type="jsv/17782_"></script>
                        </div>
                    </div>
                </div>
                <div class="product-page__price-history"
                     data-link="{if (priceHistoryHelper &amp;&amp; priceHistoryHelper^isReady) tmpl=(priceHistoryHelper &amp;&amp; priceHistoryHelper.template) }">
                    <script type="jsv#17790_"></script>
                    <script type="jsv#17791_"></script>
                    <section class="price-history" data-link="class{merge: !hideChart toggle='dropdown-open'}">
                        <div class="price-history__title-wrap">
                            <h2 class="price-history__title" data-link="{on toggleChart}" data-jsv="#5791^/5791^">
                                История цены
                                <script type="jsv#17792_"></script>
                                <span class="price-history__trend hide-desktop uptrend">32&nbsp;₽</span>
                                <script type="jsv/17792_"></script>
                                <span class="price-history__dropdown-icon hide-desktop"></span></h2>
                            <p class="price-history__text hide-mobile"> от <span>182&nbsp;₽</span> до
                                <span>264&nbsp;₽</span></p></div>
                        <div class="price-history__dropdown"><p class="price-history__text hide-desktop">Диапазон: от
                                <span>182&nbsp;₽</span> до <span>264&nbsp;₽</span></p>
                            <p class="price-history__text hide-desktop">Чтобы увидеть цену нажмите на график</p>
                            <svg viewBox="0 0 1200 156" fill="none" class="price-history__history-chart history-chart"
                                 xmlns="http://www.w3.org/2000/svg"
                                 data-link="{on 'mousemove touchmove' showPricePoint}{on 'mouseleave' hidePricePoint}"
                                 data-jsv="#5792^/5792^#5793^/5793^">
                                <linearGradient id="linear-gradient" x1="0" x2="0" y1="0" y2="1">
                                    <stop offset="0%" stop-color="#FDEEF9"></stop>
                                    <stop offset="100%" stop-color="rgba(253, 238, 249, 0.3)"></stop>
                                </linearGradient>
                                <path
                                    d="M 0 58.14545454545454 C 12.147505422993493 58.14545454545454, 36.442516268980484 59.56363636363635, 48.59002169197397 59.56363636363635, 60.73752711496746 59.56363636363635, 85.03253796095446 63.81818181818181, 97.18004338394795 63.81818181818181, 109.32754880694144 63.81818181818181, 133.62255965292843 66.65454545454546, 145.7700650759219 66.65454545454546, 157.9175704989154 66.65454545454546, 182.2125813449024 69.49090909090908, 194.3600867678959 69.49090909090908, 206.5075921908894 69.49090909090908, 230.80260303687635 69.49090909090908, 242.95010845986985 69.49090909090908, 255.09761388286336 69.49090909090908, 279.3926247288503 69.01818181818182, 291.5401301518438 69.01818181818182, 303.6876355748373 69.01818181818182, 327.9826464208243 68.07272727272726, 340.1301518438178 68.07272727272726, 352.27765726681133 68.07272727272726, 376.5726681127983 69.49090909090908, 388.7201735357918 69.49090909090908, 400.8676789587853 69.49090909090908, 425.16268980477224 69.96363636363637, 437.31019522776575 69.96363636363637, 449.45770065075925 69.96363636363637, 473.7527114967462 66.18181818181817, 485.9002169197397 66.18181818181817, 498.0477223427332 66.18181818181817, 522.3427331887202 69.01818181818182, 534.4902386117137 69.01818181818182, 546.6377440347072 69.01818181818182, 570.9327548806941 67.12727272727273, 583.0802603036876 67.12727272727273, 595.2277657266811 67.12727272727273, 619.5227765726681 65.23636363636362, 631.6702819956616 65.23636363636362, 643.8177874186551 65.23636363636362, 668.1127982646422 65.23636363636362, 680.2603036876357 65.23636363636362, 692.4078091106292 65.23636363636362, 716.702819956616 65.23636363636362, 728.8503253796096 65.23636363636362, 740.9978308026031 65.23636363636362, 765.2928416485901 62.400000000000006, 777.4403470715836 62.400000000000006, 789.5878524945771 62.400000000000006, 813.8828633405641 53.89090909090909, 826.0303687635576 53.89090909090909, 838.1778741865511 53.89090909090909, 862.472885032538 48.21818181818182, 874.6203904555315 48.21818181818182, 886.767895878525 48.21818181818182, 911.062906724512 39.709090909090904, 923.2104121475055 39.709090909090904, 935.357917570499 39.709090909090904, 959.6529284164859 41.599999999999994, 971.8004338394794 41.599999999999994, 983.9479392624729 41.599999999999994, 1008.2429501084599 37.345454545454544, 1020.3904555314534 37.345454545454544, 1032.537960954447 37.345454545454544, 1056.8329718004338 43.963636363636354, 1068.9804772234274 43.963636363636354, 1081.127982646421 43.963636363636354, 1105.4229934924078 46.327272727272714, 1117.5704989154015 46.327272727272714, 1129.7180043383948 46.327272727272714, 1154.0130151843819 46.327272727272714, 1166.1605206073752 46.327272727272714, 1174.6203904555314 46.327272727272714, 1191.5401301518439 31.199999999999992, 1200 31.199999999999992 L 1200 156, 0 156Z"
                                    fill="url(#linear-gradient)"></path>
                                <path
                                    d="M 0 58.14545454545454 C 12.147505422993493 58.14545454545454, 36.442516268980484 59.56363636363635, 48.59002169197397 59.56363636363635, 60.73752711496746 59.56363636363635, 85.03253796095446 63.81818181818181, 97.18004338394795 63.81818181818181, 109.32754880694144 63.81818181818181, 133.62255965292843 66.65454545454546, 145.7700650759219 66.65454545454546, 157.9175704989154 66.65454545454546, 182.2125813449024 69.49090909090908, 194.3600867678959 69.49090909090908, 206.5075921908894 69.49090909090908, 230.80260303687635 69.49090909090908, 242.95010845986985 69.49090909090908, 255.09761388286336 69.49090909090908, 279.3926247288503 69.01818181818182, 291.5401301518438 69.01818181818182, 303.6876355748373 69.01818181818182, 327.9826464208243 68.07272727272726, 340.1301518438178 68.07272727272726, 352.27765726681133 68.07272727272726, 376.5726681127983 69.49090909090908, 388.7201735357918 69.49090909090908, 400.8676789587853 69.49090909090908, 425.16268980477224 69.96363636363637, 437.31019522776575 69.96363636363637, 449.45770065075925 69.96363636363637, 473.7527114967462 66.18181818181817, 485.9002169197397 66.18181818181817, 498.0477223427332 66.18181818181817, 522.3427331887202 69.01818181818182, 534.4902386117137 69.01818181818182, 546.6377440347072 69.01818181818182, 570.9327548806941 67.12727272727273, 583.0802603036876 67.12727272727273, 595.2277657266811 67.12727272727273, 619.5227765726681 65.23636363636362, 631.6702819956616 65.23636363636362, 643.8177874186551 65.23636363636362, 668.1127982646422 65.23636363636362, 680.2603036876357 65.23636363636362, 692.4078091106292 65.23636363636362, 716.702819956616 65.23636363636362, 728.8503253796096 65.23636363636362, 740.9978308026031 65.23636363636362, 765.2928416485901 62.400000000000006, 777.4403470715836 62.400000000000006, 789.5878524945771 62.400000000000006, 813.8828633405641 53.89090909090909, 826.0303687635576 53.89090909090909, 838.1778741865511 53.89090909090909, 862.472885032538 48.21818181818182, 874.6203904555315 48.21818181818182, 886.767895878525 48.21818181818182, 911.062906724512 39.709090909090904, 923.2104121475055 39.709090909090904, 935.357917570499 39.709090909090904, 959.6529284164859 41.599999999999994, 971.8004338394794 41.599999999999994, 983.9479392624729 41.599999999999994, 1008.2429501084599 37.345454545454544, 1020.3904555314534 37.345454545454544, 1032.537960954447 37.345454545454544, 1056.8329718004338 43.963636363636354, 1068.9804772234274 43.963636363636354, 1081.127982646421 43.963636363636354, 1105.4229934924078 46.327272727272714, 1117.5704989154015 46.327272727272714, 1129.7180043383948 46.327272727272714, 1154.0130151843819 46.327272727272714, 1166.1605206073752 46.327272727272714, 1174.6203904555314 46.327272727272714, 1191.5401301518439 31.199999999999992, 1200 31.199999999999992"
                                    fill="transparent" vector-effect="non-scaling-stroke" stroke="#cb11ab"
                                    stroke-width="2"></path>
                                <circle r="8" fill="white" vector-effect="non-scaling-stroke" stroke="#cb11ab"
                                        stroke-width="2" class="history-chart__circle hide"
                                        data-link="{tooltip trigger='Shown' tmplName='periodPriceTmpl' classes='tooltip-price-history' responsive=false delay=0 distance=8 tmplData=currentPeriod pos='center top'}"
                                        data-jsv="#5794^/5794^"></circle>
                            </svg>
                            <div class="price-history__date"><span>02.01.2022</span> <span>01.07.2022</span></div>
                        </div>
                    </section>
                    <script type="jsv/17791_"></script>
                    <script type="jsv/17790_"></script>
                </div>
                <div class="product-page__other-mini hide-mobile j-wba-card-item"
                     data-link="class{merge: !(multipleSellersHelper &amp;&amp; multipleSellersHelper^canRender) toggle='hide'}">
                    <a class="btn-minor j-move-to-sellers"
                       data-link="{on !!multipleSellersHelper?multipleSellersHelper.onMoveToSellersClicked:$moveToAnchor 'full-list' true false 84}"
                       href="#full-list" data-jsv="#5687^/5687^"><span>У других продавцов от</span> <b
                            data-link="html{priceWithCurrencyV2: (multipleSellersHelper &amp;&amp; multipleSellersHelper^otherSellerMinPrice() || 0)}">363&nbsp;₽</b></a>
                </div>
            </div>
        </div>
        <div class="product-page__brand-logo hide-mobile" data-link="class{merge: !product^brandUrl toggle='hide'}"><a
                class="img-plug j-wba-card-item" data-name-for-wba="Item_Brand_Photo"
                data-link="title{:product^brandName}href{:product^brandUrl}target{: isPopup ? '_blank' : '_self'}{on $analitic.proceedAndSave 'IBP'}"
                title="Эксмо" target="_self" data-jsv="#5693^/5693^" href="/brands/eksmo"> <img
                    data-link="alt{:product^brandName}src{:product^brandLogo}class{merge:!product^brandLogo toggle='hide'}"
                    alt="Эксмо" class="" src="//images.wbstatic.net/brands/small/4481.jpg" width="96" height="40"></a>
        </div>
    </div>

    {{-- @include('guest.products.show.other_after_product') --}}

</div>
