@extends('_layouts.main')

@section('title', 'user/show-product')

@section('content')
    @include('guest.parts.header')
    @include('guest.parts.nav')
    @include('guest.products.show.main')
    @include('guest.parts.footer')
@endsection

@section('nav_mobile')
    @include('guest.parts.nav_mobile')
@endsection
