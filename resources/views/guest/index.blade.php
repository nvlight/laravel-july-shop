@extends('_layouts.main')

@section('title', 'Laravel - July shop!')

@section('content')
    @include('guest.parts.header')
    @include('guest.parts.nav')
    <nav>
        Nav (display: none) - after press burger button (display: block)
    </nav>
    <main class="main">
    </main>
    <footer>
        Footer
    </footer>
@endsection

@section('nav_mobile')
    @include('guest.parts.nav_mobile')
@endsection
