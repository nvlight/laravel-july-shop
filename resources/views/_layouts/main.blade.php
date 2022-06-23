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

<body class="">
{{--<body class="body--overflow">--}}

{{--<div class="overlay overlay--menu-burger j-overlay"></div>--}}

<div class="wrapper">
    @yield('content')
</div>
@yield('nav_mobile')

<script src="{{asset('js/guest/main.js')}}"></script>
<script src="{{asset('js/guest/helpers.js')}}"></script>

</body>
</html>
