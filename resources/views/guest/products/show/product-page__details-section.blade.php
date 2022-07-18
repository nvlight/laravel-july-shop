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
                            <tbody>
                                @include('guest.products.show.product-page.options_trs')
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
