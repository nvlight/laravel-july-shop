@php
    use \App\Http\Controllers\Guest\ProductController;
@endphp
{{-- hide скрыл hide --}}
<div class="" data-link="{include tmpl='productCardMiniCard'}">
    <div class="product-line j-product-card-line product-line--invisible" id="f0ccf25a-5b82-1dc4-c640-0bf999fe3bc7"
         data-link="class{merge: isProductCard toggle='product-line--invisible'}class{merge: showInvisibleCard toggle='show'}class{merge: adult &amp;&amp; !$adult.isConfirmed toggle='for-adults'}">
        <div class="product-line__container">
            <div class="product-line__img-wrap hide-mobile">
                @if(count($product->images))
                    @foreach($product->images as $image)
                        @if($image->is_main)
                            <a class="product-line__img img-plug" href="#">
                                <img src="{{ asset(ProductController::image_c246x328_path_static($product->id, $image->image)) }}"
                                 alt="Main img" width="48" height="64">
                            </a>
                        @endif
                    @endforeach
                @endif
            </div>
            <button class="product-line__back hide-desktop">Назад</button>
            <div class="product-line__wrap">
                <div class="product-line__main">
                    <a class="product-line__name" href="#">
                        @if( str_contains($product->title, '/'))
                            <b>{{$product->title}}
                            </b>
                        @else
                            <b>{{explode('/', $product->title)[0]}}
                            </b> / {{explode('/', $product->title)[1]}}
                        @endif
                    </a>
                    <div class="product-line__desc hide-mobile">
                        <span class="product-line__rating stars-line star5"></span>
                        <a class="product-line__param" href="/catalog/9414496/feedbacks?size=31295101">261 отзыв
                        </a>
                    </div>
                    <div class="product-line__mobile-info hide-desktop">
                        <b class="product-line__price-now">{{$product->price}}&nbsp;₽</b>
                    </div>
                </div>
                <div class="product-line__price hide-mobile">
                    <b class="product-line__price-now">{{$product->price}}&nbsp;₽</b>
                    <span class="product-line__price-old">{{$product->old_price}}&nbsp&nbsp;₽</span>
                </div>
            </div>
            <div class="product-line__btn-wrap">
                <button class="product-line__like btn-heart-black" type="button"
                        data-link="{on togglePonedStatus}class{merge: isItemPoned() toggle='active'}class{merge: !isProductCard toggle='hide-mobile'}"
                        >В избранное
                </button>
                <button class="product-line__share hide-desktop" type="button" data-link="{on showSocialSharePopup}"
                        >Поделиться
                </button>
                <div class="product-line__btn-group hide-mobile"
                     data-link="class{merge: isProductCard toggle='hide-mobile'}">
                    <a href="/lk/basket" class="btn-main"
                       data-link="{on addToBasket}class{merge: !addedToBasket toggle='btn-main'}class{merge: addedToBasket toggle='btn-base'}text{: !addedToBasket ? 'В корзину' : 'В корзинe'}"
                       >В корзину</a>
                </div>
            </div>
        </div>
    </div>
</div>
