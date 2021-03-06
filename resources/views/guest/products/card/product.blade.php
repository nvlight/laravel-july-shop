@php
    use \App\Http\Controllers\Guest\ProductController;
@endphp
{{-- если нам нужен товар-реклама, то add class 'j-advert-card-item advert-card-item' --}}
<div id="c24811954" class="product-card j-card-item j-advert-card-item advert-card-item j-good-for-listing-event"
     data-card-index="0" data-popup-nm-id="24811954" style="min-height: 488px;">
    <div class="product-card__wrapper">
        <a draggable="false" class="product-card__main j-card-link"
           href="/product/{{$product->id}}">
            <div class="product-card__img">
                <div class="product-card__tip-wrap"></div>
                <div class="product-card__img-wrap img-plug j-thumbnail-wrap">
                    @if(count($product->images))
                        @foreach($product->images as $image)
                            @if($image->is_main)
                                <img class="j-thumbnail thumbnail" alt="{{$product->title}} main_thumbnail"
                                     src="{{ asset(ProductController::image_big_path_static($product->id, $image->image)) }}"
                                     width="{{config('product.gallery.convert_presets.big.width')}}"
                                     height="{{config('product.gallery.convert_presets.big.height')}}">
                            @endif
                        @endforeach
                    @endif
                </div>
                {{-- если нам нужен товар-реклама, и допольнительно тут этот тег <p> --}}
                <p class="product-card__tip-promo">Реклама</p>
                <button class="product-card__fast-view j-open-product-popup">Быстрый просмотр</button>
                <span class="product-card__sale">-55%</span>
                <div class="product-card__nav j-image-pagination">
                    <div
                        class="product-card__nav--wrapper j-item-pagination-wrapper">
                        <span class="active"></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="product-card__brand">
                <div class="product-card__price j-cataloger-price">
                        <span class="price">
                            <ins class="lower-price">{{$product->price}}&nbsp;₽</ins>
                            <span class="price-old-block">
                                <del>{{$product->old_price}}&nbsp;₽</del>
                            </span>
                        </span>
                </div>
                <div class="product-card__brand-name">
                    @if(str_contains($product->title, '/'))
                        <strong class="brand-name">{{ explode('/', $product->title)[0] }}<span>/ </span></strong>
                        <span class="goods-name">{{ explode('/', $product->title)[1] }}</span>
                    @else
                        <span class="goods-name">{{$product->title}}</span>
                    @endif
                </div>
            </div>
            <span class="product-card__rating stars-line star5"></span>
            <span class="product-card__count">2</span>
            <p class="product-card__delivery">Доставка <b class="product-card__delivery-date">завтра</b>
            </p>
            {{-- если это бестселлер, добавить <div> --}}
            <div class="product-card__action">
                    <span class="spec-action" style="background: #fff579; color: #000000;">
                        <span class="spec-action__text">БЕСТСЕЛЛЕР</span>
                    </span>
            </div>
        </a>
        <div class="product-card__drop">
            <div class="product-card__drop-wrapper j-dtlist-dop-inner">
                <div class="product-card__order">
                    <a class="btn-main-sm j-add-to-basket" href="/lk/basket">В корзину</a>
                    <button class="btn-heart-pink j-add-to-postpone"
                            type="button" aria-label="Добавить в избранное">
                    </button>
                </div>
                <span class="product-card__sizes j-sizes"></span>
            </div>
        </div>
    </div>
</div>
