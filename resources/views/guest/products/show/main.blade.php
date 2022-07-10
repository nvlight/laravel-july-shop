<main class="main left-bg" role="main" id="body-layout" data-product-id="{{$product->id}}">

    {{--    @include('guest.parts.main.parts.lk-menu')--}}

    <div id="mainContainer" class="main__container">
        <div id="app">
            @include('guest.products.show.product_page')
        </div>
        <button class="btn-quick-nav j-quicknav" type="button">К началу страницы</button>
    </div>

</main>
