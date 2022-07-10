<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Fonts -->
{{--        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">--}}

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/admin/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('css/admin/main.css')}}">

{{--        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>--}}

    </head>

<body class="">

<div class="container">
    <header class="mt-2 mb-2">
        <h1>Global header</h1>
    </header>
</div>

<div class="container">
    @yield('content')
</div>

<div class="container">
    <footer class="mt-2 mb-2">
        <h1>Global footer</h1>
    </footer>
</div>

<script src="{{asset('js/admin/bootstrap.bundle.js')}}"></script>

</body>
</html>
