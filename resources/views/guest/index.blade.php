@extends('_layouts.main')

@section('title', 'Laravel - July shop!')

@section('content')
    @include('guest.parts.header')
    @include('guest.parts.nav')
    <main class="main">
    </main>
    @include('guest.parts.footer')
@endsection

@section('nav_mobile')
    @include('guest.parts.nav_mobile')
@endsection
