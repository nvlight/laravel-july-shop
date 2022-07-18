<script>

// let zoomImgsArr = [];
// let zoomImgsArrCount = 0;
// let zoomImgsArrId = 0;

// /**
//  * Инициализировать массив картинок Зум-слайдера
//  */
{{--function imgsinitSliderZoomImgsArray() {--}}
{{--    @if(count($sliderImages))--}}
{{--        let imgId;--}}
{{--        let imgName;--}}
{{--        <?php $i = 1; ?>--}}
{{--        @foreach($sliderImages as $key => $image)--}}
{{--            imgId = {{$i}};--}}
{{--            imgName = `{{$image}}`;--}}
{{--            //conlog("{{$image}}");--}}
{{--            <?php $i++; ?>--}}
{{--            zoomImgsArr.push( {id:imgId, name:imgName});--}}
{{--        @endforeach--}}
{{--        zoomImgsArrCount = {{count($sliderImages)}};--}}
{{--        zoomImgsArrId = 1;--}}
{{--        return zoomImgsArr;--}}
{{--    @else--}}
{{--        return zoomImgsArr;--}}
{{--    @endif--}}
{{--}--}}

</script>

<div class="product-page__slider-wrap">
    <div class="product-page__sticky-wrap">
        <div class="product-page__slider" id="c9b886c8-f0ab-8c86-91cd-ac1f72dc8e1b">
            <div class="sw-slider-kt-mix">
                <p class="badge-express-sm hide">Экспресс-доставка</p>
                <p class="badge-abroad-sm hide">Доставка из-за рубежа</p>

                @if($sliderImages && count($sliderImages) >= 5)
                    <button class="swiper-button-prev" type="button" tabindex="-1" role="button"
                            aria-label="Previous slide" aria-disabled="true">Предыдущий слайд
                    </button>
                @endif

                <div class="sw-slider-kt-mix__wrap">
                    <div class="swiper-container j-sw-images-carousel swiper-container-initialized swiper-container-vertical">
                        <ul class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                            @include('guest.products.show.slider_image_li')
                        </ul>

                        <button class="mix-block__slider-btnCustom btn--prev hide-desktop" type="button">
                        </button>
                        <button class="mix-block__slider-btnCustom btn--next hide-desktop" type="button">
                        </button>

                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                    <div class="sw-slider-kt-mix__btns-bottom hide-desktop">
                        <script type="jsv#5422^"></script>
                        <script type="jsv/5422^"></script>
                        <a class="sw-slider-kt-mix__btn sw-slider-kt-mix__btn--same j-find-similar"
                           aria-label="Найти похожие по фото" data-link="href{:urlForReccomendations}"
                           href="/recommendation/catalog?type=visuallysimilar&amp;forproduct=9414496&amp;excludeNms=true">Похожие</a>
                    </div>
                </div>

                @if($sliderImages && count($sliderImages) >= 5)
                    <button class="swiper-button-next" type="button" tabindex="0" role="button"
                            aria-label="Next slide" aria-disabled="false">Следующий слайд
                    </button>
                @endif

                <p class="swiper-pagination j-pagination swiper-pagination-fraction">
                    <span class="swiper-pagination-current">1</span>/<span
                        class="swiper-pagination-total">11</span>
                </p>
            </div>
        </div>

        <div class="product-page__mix-block hide-mobile">
            <div id="photo" class="mix-block"
                 data-link="{on 'click' '#imageContainer' $adult.proceedIfAdultConfirmed adult showImageGallery #data null}"
                 data-jsv="#5450^/5450^">
                <button class="mix-block__slider-btn mix-block__slider-btn--prev" type="button"
                        aria-label="Предыдущий слайд"
                        data-link="class{merge: totalSlides < 2 toggle='hide'}{on moveToPreviousSlide}"
                        data-jsv="#5452^/5452^"></button>
                <div id="imageContainer" class="mix-block__photo-zoom photo-zoom j-wba-card-item"
                     data-name-for-wba="Item_Photo">
                    <div class="photo-zoom__img-plug img-plug" data-plug-text="Фото отсутствует" style="opacity: 1;">
                        <div class="zoom-image-container">
                            <img class="photo-zoom__preview j-zoom-image hide" src="" width="900" height="1200">
                            <canvas class="photo-zoom__preview j-image-canvas" width="900" height="1200"></canvas>
                        </div>
                        <a class="mix-block__find-similar j-wba-card-item"
                           data-name-for-wba="Item_SimilarItems_PhotoSearch"
                           data-link="href{: urlForReccomendations}class{merge: !~globalSettings.switches.enableVisuallySimilar || currentSlide < 0  toggle='hide'}"
                           href="/recommendation/catalog?type=visuallysimilar&amp;forproduct=9414496&amp;excludeNms=true">
                            <span>Похожие</span> </a>
                    </div>
                </div>
                <div id="video" class="mix-block__video j-wba-card-item product-card-video"
                     data-name-for-wba="Item_Video_Icon"
                     data-link="css-display{: shouldShowVideo() ? 'block' : 'none'}{wbVideoPlayer class='product-card-video' ^src=videoModel^videoSrc maxReplays=50}"
                     style="display: none;" data-jsv="#5464^/5464^">
                    <script type="jsv#17649_"></script>
                    <div class="wb-player" data-link="
                                        {on 'touch' ~tag.showPanel}
                                        {on ~tag.showPanel}
                                        {on 'mousemove' ~tag.showPanel}
                                        {on 'mouseleave' ~tag.hidePanel}"
                         data-jsv="#5465^/5465^#5466^/5466^#5467^/5467^#5468^/5468^">

                        <p class="wb-player__no-video hide"
                           data-link="class{merge: ~tag.isAvailable toggle='hide'}">видео отсутствует</p>
                        <div class="wb-player__loader"
                             data-link="class{merge: ~tag.isLoaded toggle='hide'}"></div>
                        <script type="jsv#5463^"></script>
                        <script type="jsv/5463^"></script>
                    </div>
                    <script type="jsv/17649_"></script>
                </div>
                <div class="mix-block__three-d j-wba-card-item" data-name-for-wba="Item_Photo_360"
                     data-link="visible{:shouldShow360()}{include model360 tmpl=model360.template}"
                     style="display: none;">
                    <script type="jsv#17650_"></script>
                    <script type="jsv#5472^"></script>
                    <script type="jsv/5472^"></script>
                    <script type="jsv/17650_"></script>
                </div>
                <button class="mix-block__slider-btn mix-block__slider-btn--next" type="button"
                        aria-label="Следующий слайд"
                        data-link="class{merge: totalSlides < 2 toggle='hide'}{on moveToNextSlide}"
                        data-jsv="#5475^/5475^"></button>
                <p class="badge-express hide"
                   data-link="class{merge:!(enabledForRegion &amp;&amp; deliveryModel^deliveryInfoModel &amp;&amp; deliveryModel^deliveryInfoModel.isExpress) toggle='hide'}">
                    Экспресс-доставка</p>
                <p class="badge-abroad hide"
                   data-link="class{merge: !isImport toggle='hide'}{tooltip tmplName='abroadInfoTooltip' classes='i-tooltip-abroad-delivery' distance=4 pos='alignleft bottom'}"
                   data-jsv="#5478^/5478^">Доставка из-за рубежа</p>
            </div>
        </div>
        <script type="jsv/17623_"></script>
    </div>
</div>
