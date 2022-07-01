<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="adaptive">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/guest/index.css')}}">

</head>

{{-- .body--overflow.catalogFilterShow - эти 2 класса нужно добавить в боди, когда открыт мобильный фильтр продуктов --}}
<body class="">

{{-- для мобильного фильтра --}}
@include('guest.products.filters_mobile')

<div class="wrapper">
    @yield('content')
</div>
@yield('nav_mobile')

<script src="{{asset('js/guest/helpers.js')}}"></script>
<script src="{{asset('js/guest/main.js')}}"></script>
<script src="{{asset('js/guest/product_filter.js')}}"></script>

</body>
</html>
