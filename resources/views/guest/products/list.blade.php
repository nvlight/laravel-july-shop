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
        <div id="filters" class="catalog-page__filters">
            <div class="j-filter-container filter filterblock render_type_7 fdlvr show filter-active"
                 data-filter-name="fdlvr">
                <div class="filter__title j-b-city-dropdown j-filter-title"><span class="filter__name">Срок доставки</span>
                    <button class="j-filter-reset filter__btn-reset ">Сбросить</button>
                </div>
                <div class="j-filter-content filter__content ">
                    <fieldset
                        class="j-list filter__fieldset list_left_fdlvr render_type_7 filter__fieldset--limited">
                        <label class="j-list-item filter__item filter__item--radio " data-value="24"> <span
                                class="item-radio-text">1 день</span> </label> <label
                            class="j-list-item filter__item filter__item--radio " data-value="48"> <span
                                class="item-radio-text">2 дня</span> </label> <label
                            class="j-list-item filter__item filter__item--radio " data-value="72"> <span
                                class="item-radio-text">до 3 дней</span> </label> <label
                            class="j-list-item filter__item filter__item--radio " data-value="120"> <span
                                class="item-radio-text">до 5 дней</span> </label>
                    </fieldset>
                </div>
            </div>
            <div class="j-filter-container filter filterblock render_type_5 priceU show filter-active"
                 data-filter-name="priceU">
                <div class="filter__title j-b-city-dropdown j-filter-title"><span class="filter__name">Цена, ₽</span>
                    <button class="j-filter-reset filter__btn-reset ">Сбросить</button>
                </div>
                <div class="j-filter-content filter__content ">
                    <div class="selectorsblock range">
                        <div class="range-text">
                            <div class="start-n"><span class="start-text">От</span>
                                <div><input class="j-price c-input-base-sm" type="text" value="57"
                                            name="startN" data-filter-name="priceU"></div>
                            </div>
                            <div class="end-n"><span class="end-text">До</span>
                                <div><input class="j-price c-input-base-sm" type="text" value="28726"
                                            name="endN" data-filter-name="priceU"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="j-filter-container filter filterblock render_type_7 discount show filter-active"
                 data-filter-name="discount">
                <div class="filter__title j-b-city-dropdown j-filter-title"><span class="filter__name">Скидка</span>
                    <button class="j-filter-reset filter__btn-reset ">Сбросить</button>
                </div>
                <div class="j-filter-content filter__content ">
                    <fieldset
                        class="j-list filter__fieldset list_left_discount render_type_7 filter__fieldset--limited">
                        <label class="j-list-item filter__item filter__item--radio " data-value="10"> <span
                                class="item-radio-text">от 10% и выше</span> </label> <label
                            class="j-list-item filter__item filter__item--radio " data-value="30"> <span
                                class="item-radio-text">от 30% и выше</span> </label> <label
                            class="j-list-item filter__item filter__item--radio " data-value="50"> <span
                                class="item-radio-text">от 50% и выше</span> </label> <label
                            class="j-list-item filter__item filter__item--radio " data-value="70"> <span
                                class="item-radio-text">от 70% и выше</span> </label></fieldset>
                </div>
            </div>
            <div class="j-filter-container filter filterblock render_type_1 fpublisher show filter-active"
                 data-filter-name="fpublisher">
                <div class="filter__title j-b-city-dropdown j-filter-title"><span class="filter__name">Издательство</span>
                    <button class="j-filter-reset filter__btn-reset ">Сбросить</button>
                </div>
                <div class="j-filter-content filter__content ">
                    <div class="filter__search"><input class="j-search-filter" placeholder="Я ищу..."
                                                       value=""></div>
                    <fieldset
                        class="j-list filter__fieldset list_left_fpublisher render_type_1 filter__fieldset--limited">
                        <label class="j-list-item filter__item filter__item--checkbox" data-value="179503">
                            4tets Rare Books (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="189933">
                            Agora Books (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="180080">
                            Alan Rodgers Books (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="180566">
                            Alicia Editions (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="180051">
                            Alpha Editions (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="180323">
                            Astral International Pvt. Ltd. (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="179953">
                            Baker Street Studios Limited (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="36666">
                            Bamboo (10) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="179738">
                            Benediction Books (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="180067">
                            Black Coat Press (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="185861">
                            Bloodhound Books (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="183356">
                            Bookline and Thinker Ltd (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="1109644">
                            Bookouture (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="192548">
                            Books on Demand (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="183241">
                            Books We Love Ltd. (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="179603">
                            Bottom of the Hill Publishing (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="196100">
                            Carolyn Haines, Inc. (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="185751">
                            Columbine Publishing Group, LLC (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="179869">
                            Concord Theatricals, Ltd (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="179686">
                            Cosimo (5) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="185494">
                            Darkhouse Books (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="179777">
                            David Penny (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="1109572">
                            Dodo Press (6) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="406495">
                            Draft2Digital (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="181824">
                            Ebook Alchemy Pty Ltd (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="179748">
                            EDITORIAL IMAGEN LLC (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="182131">
                            Elaleph.com S.R.L. (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="180280">
                            Elita Publications (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="396457">
                            Emotion Press (5) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="179698">
                            Equinox Publishing (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="333986">
                            Erin Lanter (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="180328">
                            Fireship Press (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="179944">
                            Gatekeeper Press (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="193864">
                            Ghillinnein Books (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="184043">
                            GLAGOSLAV PUBLICATIONS B.V. (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="189670">
                            Granville Island Publishing Ltd. (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="200829">
                            H.Y. Hanna - Wisheart Press (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="190027">
                            ibidem-Verlag Haunschild Schoen GbR (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="180159">
                            IndoEuropeanPublishing (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="411128">
                            Inspiria (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="333742">
                            Inspiria (Эксмо) (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="179882">
                            Intercom (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="179998">
                            iUniverse (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="198955"> J
                            &amp; M Press (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="336341"> J&amp;R
                            Publishing LLC (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="196120">
                            J.T. Marsh (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="315152">
                            Jeffrey D. Wallace (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="146231">
                            K.BOX (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="324679">
                            Leanne Wood (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="187247"> Lee
                            Dobbins (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="523117">
                            Legare Street Press (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="180520"> Les
                            prairies numeriques (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="14309">
                            Livebook (6) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="160416">
                            Lulu Press (10) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="195434">
                            Mark Blayney (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="179583">
                            Martino Fine Books (8) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="207547">
                            Matata Books (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="179288"> Max
                            Bollinger (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="180341">
                            Maximilian Hertzberg Hessler (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="185801">
                            McGuffin Ink LLC (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="180405">
                            Mentoris Project (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="1127795">
                            Mia Nika (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="180527">
                            Mint Editions (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="180061">
                            MiraVista Interactive (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9013">
                            MONDIAL (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="185802">
                            Moritz Isaac Herbstein (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="179968">
                            Mountain Brook Ink (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="179600"> MX
                            Publishing (14) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="202103">
                            Myong Cho (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="179678">
                            Neeland Media (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="179627"> New
                            Generation Publishing Ltd (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="1342787">
                            newold.writer (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="302494">
                            Next Chapter (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="182506">
                            Noah Lukeman (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="178238">
                            Nobel Press (19) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="179745">
                            Norilana Books (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="179747">
                            Oakpast (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="180274">
                            Omnibook Co. (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="179843">
                            Page Publishing, Inc. (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="34452"> Pan
                            Macmillan (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="302644">
                            Paulsen/Паулсен (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="1109569">
                            Poisoned Pen Press (10) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="184010">
                            Polaris Press (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="182743">
                            Pomona Press (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="34403">
                            Popcorn Books (5) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="1109671">
                            Prince Classics (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="331565">
                            Priscilla Baker (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8014">
                            PROFFI (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="179710">
                            Progres et Declin SA (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="183212">
                            Progressive Rising Phoenix Press, LLC (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="34457">
                            Random House (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="179863">
                            Read Books (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="109166">
                            Ridero (2&nbsp;522) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="179978">
                            Ross Bolton (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="199096">
                            Sahara Publisher Books (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="192144">
                            Salim Bouzekouk (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="216535">
                            Sanford J. Greenburger Associates (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="179956"> SC
                            Active Business Development SRL (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="179787">
                            Serenity Publishers (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="180234">
                            Simon &amp; Brown (1) </label></fieldset>
                </div>
            </div>
            <div class="j-filter-container filter filterblock render_type_6 f1180 show filter-active"
                 data-filter-name="f1180">
                <div class="filter__title j-b-city-dropdown j-filter-title"><span
                        class="filter__name">Автор</span>
                    <button class="j-filter-reset filter__btn-reset ">Сбросить</button>
                </div>
                <div class="j-filter-content filter__content ">
                    <div class="filter__search"><input class="j-search-filter" placeholder="Я ищу..."
                                                       value=""></div>
                    <fieldset
                        class="j-list filter__fieldset list_left_f1180 render_type_6 filter__fieldset--limited">
                        <label class="j-list-item filter__item filter__item--checkbox" data-value="714136">
                            A. A. Milne (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="715877"> A.
                            C. Doyle (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="637018">
                            A.C. Doyle (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="646207">
                            Adam Mickiewicz (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="710742">
                            Agatha Christie (14) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="1095004">
                            Aleksander Sowa (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5462629">
                            ALEXANDER CHERENOV (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8154103">
                            Alexander Monterio (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="648172">
                            Alexandre Dumas (9) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5250882">
                            Alexsa Fantasy (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="725087">
                            Alison Skaling (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="710444">
                            Alistair Duncan (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="636584">
                            Andrew Lang (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="710441">
                            Andrew Moore (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="1297699">
                            Andrew Sean Greer (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5366102">
                            Andrey Er (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="1359868">
                            Angela M. Sanders (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="1085622">
                            Angela Marsons (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="2188762">
                            Ann Cleeves (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5353762">
                            Anna Efimenko (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="719051">
                            Anna Katharine Green (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9609343">
                            Anna Kupetskaya (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="710539">
                            Anthony Trollope (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="707795">
                            Arthur Conan Doyle (10) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="637320">
                            Arthur Cosslett Smith (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="665043">
                            Arthur Machen (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="1348395"> B.
                            Stoker (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="1093226">
                            Ben Waggoner (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="1087991">
                            Blake Pierce (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10147364">
                            Bonnie Oldre (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="814783">
                            Bradley Mary Hastings (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="814706">
                            Bramah Ernest (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="2594651">
                            Braz Menezes (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="4085664">
                            Brian L. Porter (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="639533">
                            Buchan John (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="689476"> C.
                            Agatha (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="1124957">
                            Caroline Graham (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="709379">
                            Carolyn Wells (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9365993">
                            Caron Allan (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="637318">
                            Charles C. Nott (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="4163499">
                            Chretien Detroys (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="720942">
                            Christer Tholin (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="832684">
                            Christie Agatha (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="636972">
                            Comfort Will Levington (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="1046037">
                            Daisy White (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9490768">
                            Danny Osipenko (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="712027">
                            David Marcum (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="711146">
                            David Penny (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="974003">
                            David Ruffle (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="717258">
                            Deni Vrai (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="1505153">
                            Denis Herold (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5346001">
                            Dogtor (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5393639">
                            DOM (1) </label> <label class="j-list-item filter__item filter__item--checkbox"
                                                    data-value="2570173"> Donald MacLachlan (1) </label>
                        <label class="j-list-item filter__item filter__item--checkbox" data-value="710740">
                            Dorothy L. Sayers (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="808308">
                            Dorrington Albert (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="636974">
                            Doyle Arthur Conan (33) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10841799">
                            Dr. Arthur Conan Doyle (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="713262"> E.
                            A. Poe (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="1348135"> E.
                            Poe (3) </label> <label class="j-list-item filter__item filter__item--checkbox"
                                                    data-value="675578"> E.A. Poe (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="636986">
                            Edith Wharton (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="719702">
                            Edwin Lefevre (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5425084">
                            Elena Grossman (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="1086306">
                            Elizabeth Howard (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="4697087">
                            Elzbieta Wojnarowska (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="4916788">
                            Erin Lanter (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5241099">
                            Evgenii Shan (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="4250142">
                            Eкатерина Островская (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="637998"> F.
                            Scott Fitzgerald (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="12392922">
                            FBP-1738 (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="637310">
                            Fergus Hume (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="2108400">
                            Fiodor Dostoievski (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="639557">
                            Fletcher Joseph Smith (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="730848">
                            Ford Madox Ford (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="974809">
                            Frank J. Morlock (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="636929">
                            Frank Norris (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="646793"> G.
                            K. Chesterton (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="710951">
                            G.K. Chesterton (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="857532">
                            Gaboriau Emile (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="713780">
                            Gail Tsukiyama (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="712550">
                            Gaston Leroux (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="2385701">
                            George Morehead (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="710760">
                            George Rapall Noyes (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="1626101">
                            Gerard Kelly (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="1649782">
                            Gilbert K Chesterton (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="717099">
                            Gilbert Keith Chesterton (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="4642578">
                            Gloria Allan (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="713090">
                            Gregory Shepard (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="636956">
                            Grey Zane (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5485987">
                            GriindeVald (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="710665">
                            Gwendolyn Frame (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="710765"> H
                            Rider Haggard (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="636926">
                            H.H. Rider (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="2214567">
                            H.Y. Hanna (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5579905">
                            Heike Bonin (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="637312">
                            Henri Bremond (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="4272815">
                            Henry de Gorsse (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="1254445">
                            Hilary Mantel (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5649802">
                            Holly Hope Karter (2) </label></fieldset>
                </div>
            </div>
            <div class="j-filter-container filter filterblock render_type_1 f62431 show filter-active"
                 data-filter-name="f62431">
                <div class="filter__title j-b-city-dropdown j-filter-title"><span class="filter__name">Жанры/тематика</span>
                    <button class="j-filter-reset filter__btn-reset ">Сбросить</button>
                </div>
                <div class="j-filter-content filter__content ">
                    <div class="filter__search"><input class="j-search-filter" placeholder="Я ищу..."
                                                       value=""></div>
                    <fieldset
                        class="j-list filter__fieldset list_left_f62431 render_type_1 filter__fieldset--limited">
                        <label class="j-list-item filter__item filter__item--checkbox"
                               data-value="10468978"> Английский язык (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69476">
                            Астрология и эзотерика (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69487">
                            Афоризмы, фольклор и мифы (6) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69437">
                            Бизнес и менеджмент (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9448068">
                            Биографи и мемуары (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69434">
                            Биографии и мемуары (7) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9236247">
                            Биография (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="568680">
                            Военное дело (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="11881997">
                            Детектив (6) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69439">
                            Детективы для взрослых (13&nbsp;835) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69484">
                            Детективы для детей (10) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10643981">
                            Детективы и триллеры (98) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10643981">
                            Детективы и триллеры (98) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10643573">
                            Детская и подростковая познавательная литература (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69548">
                            Домоводство (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69450">
                            Здоровье и медицина (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69492">
                            Изучение иностранных языков (24) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="70941">
                            Интернет и технологии (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69442">
                            Искусство и культура (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9532235">
                            Историчекие романы (7) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8244641">
                            Историческая и военная лиетратура (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69443">
                            Историческая и военная литература (79) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10659172">
                            Исторические книги (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="205607">
                            Исторические романы (156) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="460326">
                            История России (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="221221">
                            Книги для подростков (13) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69438">
                            Книги для родителей (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69444">
                            Книги на иностранных языках (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="70848">
                            Комиксы и манга (13) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="11420512">
                            Криминальный зарубежный детектив (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69447">
                            Кулинария (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69448">
                            Литературоведение и критика (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69449">
                            Любовные романы (438) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8658582">
                            Любовный роман (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69588">
                            Научно-популярная литература (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="3174256">
                            Национальная история (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10644006">
                            Повести и рассказы (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69453">
                            Познавательная литература для детей (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69454">
                            Политика (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69455">
                            Поэзия для взрослых (19) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69457">
                            Приключенческая литература для взрослых (1&nbsp;524) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69458">
                            Приключенческая литература для детей (11) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69459">
                            Проза для взрослых (574) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9371061">
                            Проза для взрослых Художественная литература (8) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69460">
                            Проза для детей (49) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69461">
                            Психология (8) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10643939">
                            Психология взаимоотношений (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69462">
                            Публицистика (7) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69463">
                            Религия (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69467">
                            Рукоделие и досуг (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="70967">
                            Саморазвитие для взрослых (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="14384776">
                            Современная зарубежная проза (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8060053">
                            Современная проза (16) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10515152">
                            Триллер (29) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="155767">
                            Триллеры (987) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69472">
                            Туризм и страноведение (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="11864949">
                            Фантастика для взрослых (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="142821">
                            Фантастика и фентези для взрослых (5) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10355185">
                            Фантастика и фэнези для взрослых (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69473">
                            Фантастика и фэнтези для взрослых (824) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69474">
                            Фантастика и фэнтези для детей (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9456259">
                            Фантастикаи фэнтези для взрослых (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10643649">
                            Фэнтези и фантастика (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10643649">
                            Фэнтези и фантастика (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="11673840">
                            Художесвенные книги (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="14568128">
                            Художественнаяе книги (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="102552">
                            Художественные книги (1&nbsp;221) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8060056">
                            Эзотерика и спиритизм (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69478">
                            Эротика (79) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="69479"> Юмор
                            и сатира (184) </label></fieldset>
                </div>
            </div>
            <div class="j-filter-container filter filterblock render_type_1 f1185 show filter-active"
                 data-filter-name="f1185">
                <div class="filter__title j-b-city-dropdown j-filter-title"><span class="filter__name">Обложка</span>
                    <button class="j-filter-reset filter__btn-reset ">Сбросить</button>
                </div>
                <div class="j-filter-content filter__content ">
                    <div class="filter__search"><input class="j-search-filter" placeholder="Я ищу..."
                                                       value=""></div>
                    <fieldset
                        class="j-list filter__fieldset list_left_f1185 render_type_1 filter__fieldset--limited">
                        <label class="j-list-item filter__item filter__item--checkbox" data-value="8119218">
                            Elena Grossman (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="12051352">
                            Fatma Ahmed kz Nabieva (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8134832"> no
                            name (1) </label> <label class="j-list-item filter__item filter__item--checkbox"
                                                     data-value="10121122"> Sergey Baksheev (1) </label>
                        <label class="j-list-item filter__item filter__item--checkbox" data-value="5398403">
                            Алекс Динго (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5635407">
                            Александр Ралот (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10158280">
                            Александр Сиваков (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8124424">
                            Александр Уваров (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10517263">
                            Альберт (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9918219">
                            Анастасия Валерьевна Суворова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8043537">
                            Андрей Щупов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5324869">
                            Афоризмы, фольклор и мифы (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8095403">
                            бумажная глянцевая (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9640205">
                            Валерий Водопян (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10143858">
                            Виктор Минаков (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8359063">
                            Виктория Владиславовна Шорикова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10143816">
                            Виктория Чуйкова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10374861">
                            Виктория Шатилова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8018718">
                            Владимир Иванович Баранов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9147269">
                            Владимир Федорович Безмалый (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8654331">
                            Владислав Денисович Скворцов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8268962">
                            Даниил Степанов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5527013">
                            Дарья Кова (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9918783">
                            Дарья Рагулина (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5306367">
                            Детективы для взрослых (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10085009">
                            Доктор С. В. (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10089149">
                            Евгений Иванов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5489076">
                            Евгений Николаевич Ильдейкин (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9781215">
                            Екатерина instagram: @materinstvo eto Корнилова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8230108">
                            Екатерина Асмус (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10375870">
                            Екатерина Соллъх (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9584015">
                            Елена Валерьевна Хичева (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5429904">
                            Женя Джентбаев (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8062315">
                            Ильяс Сибгатулин (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="132575">
                            интегральная (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5180364">
                            Интегральный переплет (6) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5258302">
                            Интернет и технологии (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5189500">
                            Историческая и военная литература (19) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5361342">
                            Исторические романы (29) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="411916">
                            Картон (6) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8221610">
                            Кирилл Простяков (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5929167">
                            книжный твердый переплет (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="3779094">
                            кожанный переплет (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="459757">
                            Кожаный переплет (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5453664">
                            Константин Шахматский (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10145389">
                            Кристина Овсянкина (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9788295">
                            Лидия Миронова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="12050173">
                            Лилия Чужова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9648006">
                            Лия Тарви (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5214359">
                            Любовные романы (81) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="14652518">
                            Мария Грин (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5480490">
                            Марк Агатов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9758264">
                            Михаил Небрицкий (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5410514">
                            Мягая (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10634">
                            мягкая (2&nbsp;928) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5013086">
                            МЯГКАЯ БУМАЖНАЯ (42) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="11506452">
                            Мягкая бумажная обложка (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="2588123">
                            Мягкая глянцевая (107) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="3934514">
                            Мягкая матовая (29) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8083269">
                            Мягкая матовая с глянцевыми вставками (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9774364">
                            Мягкая обл (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="4056006">
                            Мягкая обл. (12) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="436498">
                            мягкая обложка (3&nbsp;314) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="548386">
                            Мягкая с клапанами (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="477078">
                            Мягкий переплет (18) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="7479151">
                            Мягкий переплёт (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10159319">
                            Наталия Мстительная (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5485701">
                            Наталья Патрацкая (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="452582">
                            натуральная кожа (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9577175">
                            Николай Петрович (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5089823">
                            Обл (2) </label> <label class="j-list-item filter__item filter__item--checkbox"
                                                    data-value="423167"> обложка (40) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9135962">
                            Олег Васильевич Северюхин (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10149437">
                            Олег Кот (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10162343">
                            Ольга Викторовна Горбацевич (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10374651">
                            Павел Саксонов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="416885">
                            Переплет (9) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5969706">
                            Переплет 7БЦ (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9606299">
                            Петр Ингвин (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="4203791">
                            Познавательная литература для детей (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5326630">
                            Поэзия для взрослых (6) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5214105">
                            Приключенческая литература для взрослых (162) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5260742">
                            Проза для взрослых (10) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5233440">
                            Проза для детей (10) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5221895">
                            Психология (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10561745">
                            романы в мягкой обложке (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5422938">
                            Ромео Саровски (Stran nuk) (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8139959">
                            Семён Юрьевич Ешурин (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10117736">
                            Сергей Жигальцев (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8065516">
                            Сергей Зацаринный (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8268757">
                            Сергей Нагорный (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9660933">
                            Сергей Фатеев (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8010234">
                            Соня Гельд (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8644484">
                            Супер обложка (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="413849">
                            суперобложка (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10155325">
                            Тамара Борисовна Карсавина (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8026013">
                            Татьяна Богатова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5853948">
                            Татьяна Ренсинк (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10807952">
                            Тверая (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10633">
                            твердая (2&nbsp;571) </label></fieldset>
                </div>
            </div>
            <div class="j-filter-container filter filterblock render_type_1 f19717 show filter-active"
                 data-filter-name="f19717">
                <div class="filter__title j-b-city-dropdown j-filter-title"><span class="filter__name">Возрастные ограничения</span>
                    <button class="j-filter-reset filter__btn-reset ">Сбросить</button>
                </div>
                <div class="j-filter-content filter__content ">
                    <div class="filter__search"><input class="j-search-filter" placeholder="Я ищу..."
                                                       value=""></div>
                    <fieldset
                        class="j-list filter__fieldset list_left_f19717 render_type_1 filter__fieldset--limited">
                        <label class="j-list-item filter__item filter__item--checkbox" data-value="27074">
                            0+ (7) </label> <label class="j-list-item filter__item filter__item--checkbox"
                                                   data-value="8074842"> Без возврастных ограниченийдя
                            (1) </label> <label class="j-list-item filter__item filter__item--checkbox"
                                                data-value="406431"> от 18 лет (7) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8080707">
                            Приключенческая литература для взрослых (249) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8150472">
                            Триллеры (208) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8150471">
                            Фантастика и фэнтези для взрослых (291) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8080708">
                            Юмор и сатира (69) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="27075"> 6+
                            (22) </label> <label class="j-list-item filter__item filter__item--checkbox"
                                                 data-value="27092"> 7+ (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="595985"> 12
                            + (3) </label> <label class="j-list-item filter__item filter__item--checkbox"
                                                  data-value="27076"> 12+ (234) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="63706"> 14+
                            (3) </label> <label class="j-list-item filter__item filter__item--checkbox"
                                                data-value="114994"> 15+ (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="415685"> 16
                            (9) </label> <label class="j-list-item filter__item filter__item--checkbox"
                                                data-value="416899"> 16 + (222) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="27077"> 16+
                            (4&nbsp;202) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="448785"> 16
                            лет (184) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="470510"> 18
                            + (36) </label> <label class="j-list-item filter__item filter__item--checkbox"
                                                   data-value="27078"> 18+ (2&nbsp;610) </label></fieldset>
                </div>
            </div>
            <div class="j-filter-container filter filterblock render_type_1 f1183 show filter-active"
                 data-filter-name="f1183">
                <div class="filter__title j-b-city-dropdown j-filter-title"><span
                        class="filter__name">Серия</span>
                    <button class="j-filter-reset filter__btn-reset ">Сбросить</button>
                </div>
                <div class="j-filter-content filter__content ">
                    <div class="filter__search"><input class="j-search-filter" placeholder="Я ищу..."
                                                       value=""></div>
                    <fieldset
                        class="j-list filter__fieldset list_left_f1183 render_type_1 filter__fieldset--limited">
                        <label class="j-list-item filter__item filter__item--checkbox" data-value="216779">
                            Bilingua (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="392267">
                            Black Books (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="567153">
                            Black. Триллеры для ценителей (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="14016711">
                            Book&amp;Travel (8) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="4082669">
                            Corpus (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="201946">
                            Corpus.(roman) (5) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="265727">
                            Cozy kitchen: кулинарный детектив (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="4031716">
                            DETECTED. Тайна покорившая мир (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="91775">
                            DETECTED. Тайна, покорившая мир (18) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="123243">
                            Fanzon. Наш выбор (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="146147">
                            Fanzon. Фантастика Чайны Мьевиля (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10668062">
                            Harlequin Поцелуй (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10668063">
                            Harlequin Соблазн (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="3810508">
                            Horror Story (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="109042">
                            Live Book (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="384726">
                            Loft. Серьезные женщины (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="384727">
                            Loft. Современный роман (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10658515">
                            Love Crime. Любовь страсть (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10798221">
                            Love&amp;Crime. Любовь, страсть, преступление (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="394405">
                            Mainstream. Триллер (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="357453">
                            Master Detective (8) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10716812">
                            Master Detective (мягкая мягкийожка) (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="3649895">
                            Master Detective (мягкая обложка) (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="11146">
                            Millennium (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="11149">
                            Millennium. Элизабет Джордж (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5732524">
                            MOLOKO. Кто-то разыскивает тебя по всей стране. (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="91858">
                            MYST. Черная книга 18+ (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10629303">
                            MYST. Черная книга 18+ (новое (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="404707">
                            Mystic &amp; Fiction (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9207409">
                            Neoclassic Расследование (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10583193">
                            Neoclassic Триллер (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="14628983">
                            Neoclassic: Детектив (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9485919">
                            Neoclassic: Расследование (6) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10665093">
                            Neoclassic: Триллер (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10798167">
                            New Horror (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="384728">
                            Novel. Большая маленькая жизнь (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5358664">
                            Novel. Национальный (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10663595">
                            Novel. Национальный бестселлер. Германия (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="404708">
                            Novel. Частная история (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5098648">
                            Pink room. Страстная вражда (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="11150">
                            Pocket book (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="11150">
                            Pocket book (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="11150">
                            Pocket book (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="91861">
                            Pocket book (обложка) (29) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="253855">
                            Pocket&amp;Travel (8) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="91865">
                            Romantic-детектив (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="91868">
                            Secret. Культовый французский детектив (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="6695909">
                            Storytel Original (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="361064">
                            StorytelOriginal (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="3831055">
                            Strong Story (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="385069"> The
                            Bestseller (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="161878"> The
                            Big Book (24) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="410804"> The
                            Big Book (мягкая обл) (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="212235"> The
                            Big Book (мягкая обложка) (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="177825"> The
                            Big Book (тв/обл.) (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="167620"> The
                            Big Book. Дин Кунц (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="388862"> The
                            International Bestseller (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="496776">
                            Tok. True Crime Story. Главный (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10663610">
                            Tok. True Crime Story. Главный документальный (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8034040">
                            Tok. Upmarket Crime Fiction. Больше чем (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10506518">
                            Tok. Upmarket Crime Fiction. Больше чем триллер (5) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="6025482">
                            Tok. Блестящий триллер (5) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="447601">
                            Tok. Внутри убийцы. Триллеры (19) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10662186">
                            Tok. Внутри убийцы. Триллеры о (7) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="413527">
                            Tok. Детектив в кубе (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="457428">
                            Tok. Драматический саспенс (5) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="3933782">
                            Tok. За туманом. Детектив (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="384735">
                            Tok. За туманом. Детектив по-английски (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5493204">
                            Tok. Захватывающие (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10663643">
                            Tok. Захватывающие бестселлеры Меган Миранды (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="407793">
                            Tok. И не осталось никого (8) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10550417">
                            Tok. Карин Слотер: триллеры от мастера жанра (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="567016">
                            Tok. Логика и игра (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="11500390">
                            Tok. Мировой бестселлер (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5133411">
                            Tok. Мировые хиты (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="457410">
                            Tok. Мистик-триллер (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="397019">
                            Tok. Национальный (16) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10665077">
                            Tok. Национальный бестселлер. Британия (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="384736">
                            Tok. Национальный бестселлер. Германия (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="3171213">
                            Tok. Национальный бестселлер. Испания (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10664635">
                            Tok. Национальный бестселлер. Италия (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5305954">
                            Tok. Национальный бестселлер. Китай (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10662553">
                            Tok. Национальный бестселлер. Корея (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="4566952">
                            Tok. Национальный бестселлер. Польша (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="14261039">
                            Tok. Национальный бестселлер. Швеция (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="413490">
                            Tok. Национальный бестселлер. Япония (5) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="397020">
                            Tok. Ненадежный рассказчик. (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="3206476">
                            Tok. Ненадежный рассказчик. Настоящий саспенс (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="398705">
                            Tok. Новый скандинавский (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="3682263">
                            Tok. Новый скандинавский триллер (7) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10689335">
                            Tok. Новый скандинавский триллер Анны Богстам (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="457362">
                            Tok. Нордический характер: (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10707140">
                            Tok. Пациент. (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10665067">
                            Tok. Пациент. Психиатрический триллер (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10818704">
                            Tok. Преступления страсти (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10662915">
                            Tok. Психиатрические расследования. Главный (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="457408">
                            Tok. Сканди-бланк. (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="457390">
                            Tok. Слишком близко. (6) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10662084">
                            Tok. Слишком близко. Семейные триллеры (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10874809">
                            Tok. Софи Саренбрант (1) </label></fieldset>
                </div>
            </div>
            <div class="j-filter-container filter filterblock render_type_1 f25001 show filter-active"
                 data-filter-name="f25001">
                <div class="filter__title j-b-city-dropdown j-filter-title"><span class="filter__name">Иллюстратор</span>
                    <button class="j-filter-reset filter__btn-reset ">Сбросить</button>
                </div>
                <div class="j-filter-content filter__content ">
                    <div class="filter__search"><input class="j-search-filter" placeholder="Я ищу..."
                                                       value=""></div>
                    <fieldset
                        class="j-list filter__fieldset list_left_f25001 render_type_1 filter__fieldset--limited">
                        <label class="j-list-item filter__item filter__item--checkbox" data-value="3774728">
                            0 (3) </label> <label class="j-list-item filter__item filter__item--checkbox"
                                                  data-value="5509106"> DCist (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5368827">
                            Den Xenon (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="11455930">
                            Elfiexnina (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9305904">
                            Fox Laziness Mr (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5356275">
                            NDA (1) </label> <label class="j-list-item filter__item filter__item--checkbox"
                                                    data-value="5366710"> p i r a n y a (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5822151">
                            Shutterstock Ireland LTD (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="6097739">
                            Аверьянов Александр Владимирович (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5332723">
                            Агний Немов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8638726">
                            Айре Вест (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="13564053">
                            Алаис Зар (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="166924">
                            Алек Болл (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5237439">
                            Александр Смирнов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5350713">
                            Алексей Бартенев (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5398368">
                            Алексей Курбатов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5489944">
                            Алексей Плотников (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9645139">
                            Алина Геннадьевна Сапоговская (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9606041">
                            Алиса Евгеньевна Кисель (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5602482">
                            Альфонс Муха (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5455550">
                            Анастасия Алексеева (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5472944">
                            Анастасия Евграфова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5370880">
                            Анастасия Жиленкова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5381275">
                            Анастасия Маслакова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5423380">
                            Анастасия Суворова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5303950">
                            Ангелина Сатунина (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="14263436">
                            Андреев Александр Семенович (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="602669">
                            Андрей Бондаренко (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="11605006">
                            Андрей Крушанов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5317595">
                            Андрей Нифедов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="14125087">
                            Андрей Сауков (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="238109">
                            Аникин Виталий Олегович (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5423886">
                            Анна Вацуро (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5602485">
                            Анна Данилова (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5233611">
                            Анна Ивахненко (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="14125275">
                            Анна Рысухина (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9153823">
                            Анна Сергеевна Бондаренко (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5587025">
                            Антон Гусев (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10881818">
                            Арм Коста (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="511912"> без
                            иллюстратора (27) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="32318"> без
                            иллюстраций (1&nbsp;294) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5513956">
                            Боб Гиулиани (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5369975">
                            Божидар Жеков (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5348930">
                            В.А. Трубчанинов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5380572">
                            Валентина Лотова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9628969">
                            Валерий Алексеевич Касаткин (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="13610057">
                            Валерия Дмитриевна Жданова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="102523">
                            Валерия Знаменская (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5453242">
                            Валерия Шеина (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5303949">
                            Ванесса Гаврилова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5513301">
                            Василий Кошарич (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5229153">
                            Василиса Бессонова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5352508">
                            Венера Багирова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9592770">
                            Вера Анатольевна Клыкова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9656280">
                            Вероника Валерьевна Земскова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9113800">
                            Виктор Александрович Вержбицкий (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5237420">
                            Виктор Миллер Гауса (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10715602">
                            Виктория Давлетбаева (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5374293">
                            Виктория Журова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="11981582">
                            Виктория Лебедева (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5604511">
                            Виктория Шатилова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5387599">
                            Владимир Иванов (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="11981590">
                            Владимир Манюхин, Ольга Закис (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="356367">
                            Гавричков Михаил Алексеевич (5) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="238113">
                            Гаврюченков Юрий Федорович (13) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5473302">
                            Галина Рачко (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="7991490">
                            Георгий Кобиашвили (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5403098">
                            Грейвс Эббот Фуллер (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="14185586">
                            Гумшмидт Рихард (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8244469">
                            Гусарев Константин Сергеевич (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5378061">
                            Даниил Иванов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="250304">
                            Даниэль Напп (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10148976">
                            Даннаис дде Даненн (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5425181">
                            Дарья Ninjinmoon (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9142935">
                            Дарья Романовна Федосова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5353187">
                            Дарья Тихая (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9918073">
                            Дарья Юрьевна Антоненко (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="6025452">
                            Девятова Юлия Владимировна (19) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10495966">
                            Детективы для взрослых (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="11981745">
                            Дмитрий Андреев (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9757293">
                            Дмитрий Викторович Клюс (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5476585">
                            Дмитрий Мерзляков (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10690620">
                            Дмитрий Сазонов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5391176">
                            Дмитрий Хузин aka Skolzky (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="7943646">
                            Дурасов Алексей (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5390953">
                            Евгений Попов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5385230">
                            Евгения Иванова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5366509">
                            Евгения Хамуляк (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9632550">
                            Екатерина instagram: @materinstvo eto Корнилова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5488977">
                            Екатерина Асмус (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5466888">
                            Екатерина Вараксина (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5467251">
                            Екатерина Давыдова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10664698">
                            Екатерина Елькина (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5305061">
                            Екатерина Ерохина (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8637697">
                            Екатерина Корнева (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="3782290">
                            Екатерина Петрова (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10512743">
                            Екатерина Румянцева (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9457188">
                            Екатерина Сидорова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9647184">
                            Елизавета Викторовна Гричан (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5466889">
                            Елизавета Жилинская (1) </label></fieldset>
                </div>
            </div>
            <div class="j-filter-container filter filterblock render_type_1 f18269 show filter-active"
                 data-filter-name="f18269">
                <div class="filter__title j-b-city-dropdown j-filter-title"><span class="filter__name">Вид бумаги</span>
                    <button class="j-filter-reset filter__btn-reset ">Сбросить</button>
                </div>
                <div class="j-filter-content filter__content ">
                    <div class="filter__search"><input class="j-search-filter" placeholder="Я ищу..."
                                                       value=""></div>
                    <fieldset
                        class="j-list filter__fieldset list_left_f18269 render_type_1 filter__fieldset--limited">
                        <label class="j-list-item filter__item filter__item--checkbox" data-value="8027754">
                            Dogtor (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8269356">
                            Ledy $maille (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8560811">
                            Leon Malin (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10097292">
                            Алекс Владимиров (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5435641">
                            Алекс Динго (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10434558">
                            Александр Гаврилов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="14666660">
                            Александр Кондратьев (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9504424">
                            Александр Михан (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10158274">
                            Александр Понуров (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10158292">
                            Александр Сиваков (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5475688">
                            Алексей Хапров (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9575854">
                            Анастасия Шлейхер (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10121093">
                            Анастасия Эльберг (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9156660">
                            Андрей Лоскутов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10180580">
                            Анна Попова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10115420">
                            Анна Сергеевна (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5318046">
                            Анри Мартини (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10145910">
                            Ася Михеева (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5306720">
                            Афоризмы, фольклор и мифы (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9168081">
                            Борис Борисович Пьянков (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="446833">
                            Бумага газетная 70/45 (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="446696">
                            Бумага газетная 76/45 (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="447637">
                            Бумага газетная 84/45 (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="457546">
                            Бумага газетная пухлая 60/45 (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="457313">
                            Бумага газетная пухлая 62/48,8 (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="433205">
                            Бумага газетная пухлая 70/42 (38) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="447958">
                            Бумага газетная пухлая 76/42 (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="446629">
                            Бумага газетная пухлая 76/45 (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="425023">
                            Бумага газетная пухлая 84/48,8 (7) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="3199375">
                            Бумага классик 95 пухл 1,8 60/50 (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="4077298">
                            бумага офсетная 80 г/м2, печать черно-белая (936) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="447628">
                            Бумага офсетная 84/50 Кама (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="456775">
                            Бумага офсетная 84/65 Кама (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="446340">
                            Бумага офсетная пухлая 60/65 Кама (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="446618">
                            Бумага офсетная пухлая 84/60 Кама (18) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="446350">
                            Бумага офсетная пухлая 84/65 Кама (11) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="447911">
                            Бумага типографская 70/60 (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="446615">
                            Бумага типографская 84/60 (6) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="533861">
                            Бумага типографская пухлая 76/55 (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="522722">
                            Бумага типографская пухлая 76/60 (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="447936">
                            Бумага типографская пухлая 84/55 (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="457215">
                            Бумага типографская пухлая 84/60 (20) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10381744">
                            Василий Васильевич Чибисов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10383435">
                            Владимир Безмалый (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8234005">
                            Владимир Михайлович Жариков (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10365284">
                            Владимир Органов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="61629">
                            газетная (1&nbsp;854) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="603321">
                            газетная бумага (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5823052">
                            газетная пухлая (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5552893">
                            Давид Чумертов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9759077">
                            Данила Викторович Шумков (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10374748">
                            Денис Алексеевич Кузнецов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5435908">
                            Детективы для взрослых (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5607804">
                            Дмитрий Луговой (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10167570">
                            Евгений Николаевич Ильдейкин (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10706018">
                            Елена Сазанович (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5387778">
                            Елена Фили (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5445019">
                            Игорь Дасиевич Шиповских (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8155830">
                            Игорь Кабаретье (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10085109">
                            Игорь Родин (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5434928">
                            Ирина Ворожцова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5216615">
                            Историческая и военная литература (25) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5361346">
                            Исторические романы (20) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="26754">
                            картон (10) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8029412">
                            Катрина Фрай (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9142305">
                            Кристина Линси (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10145582">
                            Лана Петровских (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5445333">
                            Лилия Чужова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10116398">
                            Лина Личман (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5215617">
                            Любовные романы (102) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="3749414">
                            Люкс крим 80 г/м2 пухл. 2,0 (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5434895">
                            Люси Поэль (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10153426">
                            Марина Игоревна Мусиенко (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="26749">
                            мелованная (29) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9578049">
                            Михаил Борисович Поляков (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10116195">
                            Н. В. Патрацкая (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9603836"> Н.
                            С. Быстрова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8268129">
                            Наталия Григорян (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="6038433">
                            Наталия Речка (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5756415">
                            Наталья Бондарь (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5483088">
                            Наталья Фор (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5221766">
                            Научно-популярная литература (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="3998374"> не
                            указано (5) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10374743">
                            Николай Делигиоз (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10147747">
                            Оксана Бунькова-Коннова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10154971">
                            Оксана Дидан (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="14657614">
                            Оксана Логвиненко (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8262105">
                            Олег Донской (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10382392">
                            Ольга Чалых (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="398117">
                            Офсет (120) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="6103477">
                            офсет 80 г/м2 (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="32317">
                            офсетная (2&nbsp;635) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="14021326">
                            офсетная (белая) (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="3711034">
                            офсетная 80 (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="609075">
                            офсетная бумага (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5777696">
                            офсетная пухлая (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="12031928">
                            Офсетная сероватая (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="3650468">
                            Офсетная, 80г/м2 (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5180351">
                            Оффсет (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5242376">
                            Поэзия для взрослых (3) </label></fieldset>
                </div>
            </div>
            <div class="j-filter-container filter filterblock render_type_1 f5300 show filter-active"
                 data-filter-name="f5300">
                <div class="filter__title j-b-city-dropdown j-filter-title"><span
                        class="filter__name">Языки</span>
                    <button class="j-filter-reset filter__btn-reset ">Сбросить</button>
                </div>
                <div class="j-filter-content filter__content ">
                    <div class="filter__search"><input class="j-search-filter" placeholder="Я ищу..."
                                                       value=""></div>
                    <fieldset
                        class="j-list filter__fieldset list_left_f5300 render_type_1 filter__fieldset--limited">
                        <label class="j-list-item filter__item filter__item--checkbox" data-value="13617">
                            английский (297) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="119364">
                            греческий (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="13622">
                            испанский (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="116785">
                            итальянский (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="119365">
                            корейский (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="20222">
                            немецкий (6) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="119366">
                            польский (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="643559">
                            Португальский (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="557748">
                            Руский (15) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="3735493">
                            руссикй (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="13616">
                            русский (4&nbsp;609) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="457938">
                            Русский (русская документация) (5) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="13549567">
                            Русский текcт (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="461654">
                            русский текст (735) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="3683407">
                            Русский тект (10) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="2136541">
                            русский язык (28) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="20223">
                            французский (18) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="643562">
                            Эсперанто (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="119368">
                            японский (2) </label></fieldset>
                </div>
            </div>
            <div class="j-filter-container filter filterblock render_type_1 f1181 show filter-active"
                 data-filter-name="f1181">
                <div class="filter__title j-b-city-dropdown j-filter-title"><span class="filter__name">Переводчик</span>
                    <button class="j-filter-reset filter__btn-reset ">Сбросить</button>
                </div>
                <div class="j-filter-content filter__content ">
                    <div class="filter__search"><input class="j-search-filter" placeholder="Я ищу..."
                                                       value=""></div>
                    <fieldset
                        class="j-list filter__fieldset list_left_f1181 render_type_1 filter__fieldset--limited">
                        <label class="j-list-item filter__item filter__item--checkbox" data-value="5580783">
                            Heike Bonin (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5649328">
                            http://www.translate.ru (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5352537">
                            Natalia Lilienthal (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5215875">
                            Natalie Lilienthal (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5353764">
                            Olga Simpson (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10763381">
                            А. Ардисламова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5437379"> А.
                            Владимирович (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10717900">
                            А. Воронцов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="14195121">
                            А. Голосовская, Н. Вуль (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10664241">
                            А. Ерыкалин (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10662552">
                            А. Лисочкин (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="11863921">
                            А. Петухов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="14195125">
                            А. Рудакова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10539458">
                            А. Самарина (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10539977">
                            А. Самуджян (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10538372">
                            А. Сандлер (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="14195116">
                            А. Санин, Н. Вуль (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="14195117">
                            А. Санин, Ю. Смирнов, Д. Попов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="14195135">
                            А. Собкович (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10664969">
                            А. Шмелева (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="14195145">
                            А. Штрыков (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="14195134">
                            А.С. Собкович (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="4626360">
                            Абдуллин Нияз (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="181217">
                            Абдуллин Нияз Наилевич (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8569829">
                            Акимова М. С. (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="11694712">
                            Акинана Мария (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="116185">
                            Александр Богдановский (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10664749">
                            Александр Бушуев (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="14125077">
                            Александр Бушуев и др. (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10715731">
                            Александр Бушуев, Татьяна Бушуева (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10506000">
                            Александр Крышан (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10662457">
                            Александр Нордштрем (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10798146">
                            Александр Санин, Татьяна Чернышева, Кирилл (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10506259">
                            Александр Сафронов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10663360">
                            Александр Соколов (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10645570">
                            Александр Филонов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10798222">
                            Александр Шабрин (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="115565">
                            Александр Яковлев (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="14195103">
                            Александра Бряндинская и др. (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5257947">
                            Александра Василькова (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10503136">
                            Александра Гребенникова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="106703">
                            Александра Самарина (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10505978">
                            Александра Усачева (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="206059">
                            Александров Глеб (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="206058">
                            Александрова Мария (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="182881">
                            Александрова Ольга (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10539153">
                            Алексей Андреев (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10716566">
                            Алексей Андреев, Я. Саравайская (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9599447">
                            Алексей Астапенков (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8631049">
                            Алексей Борисович Козлов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10501425">
                            Алексей Новиков (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="14125006">
                            Алексей Штрыков (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10663178">
                            Алена Куц (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10644554">
                            Алина Ардисламова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="181046">
                            Алчеев Игорь Николаевич (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="14125312">
                            Анаит Григорян (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="106886">
                            Анастасия Грызунова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="106854">
                            Анастасия Миролюбова (6) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9510534">
                            Анастасия Наумова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10506322">
                            Анастасия Наумова, Дарья Гоголева (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10506322">
                            Анастасия Наумова, Дарья Гоголева (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10662965">
                            Анастасия Осминина (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10715751">
                            Анастасия Паршина (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10645520">
                            Анастасия Погадаева, Ин Сун Чун (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10505148">
                            Анастасия Рудакова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="11391518">
                            Анастасия Рыбалкина (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10689964">
                            Анастасия Шаболтас (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10664526">
                            Анастасия Яновская (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="180802">
                            Андреев Алексей Викторович (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10663356">
                            Андрей Воронцов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10662817">
                            Андрей Петухов (6) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10506181">
                            Андрей Полошак (5) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10504948">
                            Анна Баренкова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="11981594">
                            Анна Хромова, Наталия Некрасова (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10501464">
                            Анна Шершун (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="11522251">
                            Антонов Виктор (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10798507">
                            Аркадий Кабалкин, Мария Виноградова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10645827">
                            Аркадий Кабалкин, О. Янковская (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="182950">
                            Арро Татьяна Арнольдовна (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10663502">
                            Артем Лисочкин (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10643829">
                            Артем Пудов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10505161">
                            Ася Лавруша (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5582587">
                            Ахмерова А. И. (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="181014">
                            Бабков Владимир Олегович (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="7587641">
                            Балаян Ю. А. (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="182971">
                            Баренкова Анна Владимировна (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="511113"> без
                            переводчика (218) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="181332">
                            Беленькая Надежда Мариовна (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="182983">
                            Белов Сергей Николаевич (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="14391941">
                            Белова Светлана (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="6017524">
                            Бессмертная И. (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="181179">
                            Бессмертная Ирина Михайловна (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="11878335">
                            Бобков В (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="6153559">
                            Богданова Е. Г. (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10351959">
                            Борис Жаров (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10500546">
                            Борис Хлебников (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9312711">
                            Бочарова Я. В. (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="235881">
                            Боченкова Ирина (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="183029">
                            Боченкова Ольга Борисовна (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="181317">
                            Брилова Людмила Юрьевна (1) </label></fieldset>
                </div>
            </div>
            <div class="j-filter-container filter filterblock render_type_1 f189099 show filter-active"
                 data-filter-name="f189099">
                <div class="filter__title j-b-city-dropdown j-filter-title"><span class="filter__name">Год выпуска</span>
                    <button class="j-filter-reset filter__btn-reset ">Сбросить</button>
                </div>
                <div class="j-filter-content filter__content ">
                    <div class="filter__search"><input class="j-search-filter" placeholder="Я ищу..."
                                                       value=""></div>
                    <fieldset
                        class="j-list filter__fieldset list_left_f189099 render_type_1 filter__fieldset--limited">
                        <label class="j-list-item filter__item filter__item--checkbox"
                               data-value="11192497"> J1324013 (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8571038">
                            Leon Malin (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9629865">
                            Stasia S. (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10147522">
                            Алевтина Бартова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8088276">
                            Александр Mихан (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10379825">
                            Александр Литвиненко (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9576028">
                            Анастасия Шлейхер (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5312472">
                            Афоризмы, фольклор и мифы (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10595048">
                            В. Чижов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10383198">
                            Валентина Сычёва (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5602881">
                            Виктор Бондарчук (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8633840">
                            Владислав Денисович Скворцов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9574284">
                            Даниил Степанов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10358379">
                            Дмитрий Шуров (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10375824">
                            Екатерина Соллъх (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8144834">
                            Елизавета Жилинская (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5334726">
                            Здоровье и медицина (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="11912316">
                            Иван Шам (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9577744">
                            Ильдус Муслимов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5237461">
                            Интернет и технологии (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5216617">
                            Историческая и военная литература (11) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5362518">
                            Исторические романы (21) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10599194">
                            Константин Ренжин (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9660736">
                            Лариса Вайсерова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5214174">
                            Любовные романы (71) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10147699">
                            Меир Ландау (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5540412">
                            Наталья Патрацкая (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8021453">
                            Николай Лебедев (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10147593">
                            Оксана Бунькова-Коннова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8025610">
                            Олег Ерёмин (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5228876">
                            Поэзия для взрослых (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5214185">
                            Приключенческая литература для взрослых (82) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5305027">
                            Проза для взрослых (14) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5235900">
                            Проза для детей (6) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5221712">
                            Психология (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5231520">
                            Публицистика (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5236390">
                            Религия (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5237999">
                            Рукоделие и досуг (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10382497">
                            Руслан Мифтахов (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5436960">
                            Татьяна Богатова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8270935">
                            Татьяна Латукова (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="11465592">
                            ТИМУР ШИПОВ (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="11465592">
                            ТИМУР ШИПОВ (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8235834">
                            Томми Дипфлауэр (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5221623">
                            Триллеры (66) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5221622">
                            Фантастика и фэнтези для взрослых (80) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8105777">
                            Хамид Эф (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10649546">
                            Эйрик Годвирдсон (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5222345">
                            Эротика (11) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5221808">
                            Юмор и сатира (23) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="415382"> 2&nbsp;020
                            (8) </label> <label class="j-list-item filter__item filter__item--checkbox"
                                                data-value="445313"> 2&nbsp;021 (10) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="652065">
                            1910 (1) </label> <label class="j-list-item filter__item filter__item--checkbox"
                                                     data-value="669792"> 1920 (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="680952">
                            1934 (1) </label> <label class="j-list-item filter__item filter__item--checkbox"
                                                     data-value="189103"> 1995 (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="189104">
                            1997 (1) </label> <label class="j-list-item filter__item filter__item--checkbox"
                                                     data-value="189105"> 1998 (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="189106">
                            1999 (5) </label> <label class="j-list-item filter__item filter__item--checkbox"
                                                     data-value="189107"> 2000 (7) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="189108">
                            2001 (12) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="189109">
                            2002 (2) </label> <label class="j-list-item filter__item filter__item--checkbox"
                                                     data-value="189110"> 2003 (5) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="189111">
                            2004 (2) </label> <label class="j-list-item filter__item filter__item--checkbox"
                                                     data-value="189112"> 2005 (13) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="189113">
                            2006 (14) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="189114">
                            2007 (22) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="189115">
                            2008 (22) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="189116">
                            2009 (26) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="189117">
                            2010 (37) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="189118">
                            2011 (65) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10510480">
                            2012 г (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="189119">
                            2012 (77) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="6011157">
                            2012 г. (7) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5509739">
                            2013 г. (6) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="189120">
                            2013 (55) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="189121">
                            2014 (141) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="6667156">
                            2014 г. (5) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="189122">
                            2015 (200) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5192831">
                            2015 г. (7) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="189123">
                            2016 (386) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5192830">
                            2016 г. (7) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="189124">
                            2017 (554) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="7155389">
                            2017 г (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="4136205">
                            2017 г. (7) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="6794832">
                            2018 г (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="189125">
                            2018 (963) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="4109972">
                            2018 г. (14) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="189126">
                            2019 (1&nbsp;625) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="6794842">
                            2019 г (5) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="3199914">
                            2019 г. (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="11783738">
                            2019г (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="6794834">
                            2020 г (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="3734375">
                            2020 г. (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="189127">
                            2020 (1&nbsp;512) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="6794936">
                            2021 г (8) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="384809">
                            2021 (2&nbsp;578) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="3998185">
                            2021 г. (29) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5007628">
                            2021г. (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9206227">
                            2022 г (1) </label></fieldset>
                </div>
            </div>
            <div class="j-filter-container filter filterblock render_type_1 f240823 show filter-active"
                 data-filter-name="f240823">
                <div class="filter__title j-b-city-dropdown j-filter-title"><span class="filter__name">Редакция</span>
                    <button class="j-filter-reset filter__btn-reset ">Сбросить</button>
                </div>
                <div class="j-filter-content filter__content ">
                    <div class="filter__search"><input class="j-search-filter" placeholder="Я ищу..."
                                                       value=""></div>
                    <fieldset
                        class="j-list filter__fieldset list_left_f240823 render_type_1 filter__fieldset--limited">
                        <label class="j-list-item filter__item filter__item--checkbox" data-value="6042040">
                            CLEVER Издательство (5) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="240848">
                            Corpus (18) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="240825">
                            Freedom (4) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="366648">
                            Inspiria (99) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="240826">
                            Like Book (9) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="240843">
                            Lingua (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="240842">
                            Mainstream (29) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="240841">
                            Neoclassic (166) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5097844">
                            POPCORN BOOKS (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="3815729">
                            Азбука (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="385832">
                            Альпина Паблишер (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="468463"> АСТ
                            (4) </label> <label class="j-list-item filter__item filter__item--checkbox"
                                                data-value="6085064"> АСТ-Астрель (5) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="240852">
                            Астрель СПб (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5903243">
                            Астрель-СПб (6) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="6066911">
                            Бойко В. (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="240828">
                            БОМБОРА (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="240856">
                            Времена (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="240830">
                            ГрандМастер (27) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="240851">
                            Жанры (97) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="11366479">
                            Иванова В. (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="557775">
                            ИЗДАТЕЛЬСТВО "АСТ" (12) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="566984">
                            Издательство "Эксмо" (924) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="2589436">
                            Издательство "Эксмо" ООО (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="447563">
                            Издательство Манн, Иванов и Фербер (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="3201110">
                            издательство Эксмо (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="240854">
                            Кладезь (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10774838">
                            Книжный клуб 36.6 (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10521353">
                            Концептуал (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="240850">
                            Ленинград (7) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="1131752">
                            Манн, Иванов и Фербер (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9307900">
                            Мастера детективного жанра (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="921455">
                            Межиздат (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="4644274">
                            Молодая гвардия (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="5778571">
                            Назаров Вадим (5) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="10171113">
                            Неоклассика (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9534198">
                            Нуар и мистика (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="4703062">
                            Омега (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="240849">
                            Редакция Елены Шубиной (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="14692624">
                            РиполАкция (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9312712">
                            Скандинавский детектив (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="8149775">
                            Современная зарубежная проза (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9118824">
                            Современный зарубежный детектив (2) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="9507459">
                            Современный российский детектив (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="240835">
                            ХлебСоль (3) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="415672">
                            Эксмо (195) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="7567738">
                            Эксмо-Пресс (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="384331">
                            Эксмо. Премьера (1) </label> <label
                            class="j-list-item filter__item filter__item--checkbox" data-value="240839">
                            Яуза (12) </label></fieldset>
                </div>
            </div>
        </div>
        <!--/noindex-->

        <div class="sidemenu-mobile"
             data-link="{include tmpl='catalogPromoMenuMobile' model}class{merge: model.menuMobileShown toggle='open'}">
        </div>
        <button class="btn-quick-nav j-quicknav btn-quick-nav--mobile" type="button" style="display: none;">
            К началу страницы
        </button>
    </div>
    {{-- если нажата кнопка - показать большие картинки, то сюда добавляется класс catalog-big-card   --}}
    <div class="catalog-page__main new-size catalog-big-card">
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

                        @include('guest.products.card.items')
{{--                        @include('guest.products.card.static_items')--}}

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
