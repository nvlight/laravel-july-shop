@extends('_layouts.main')

@section('title', 'show category+products')

@section('content')
    @include('guest.parts.header')
    @include('guest.parts.nav')
    @include('guest.products.main')
    @include('guest.parts.footer')
@endsection

@section('nav_mobile')
    @include('guest.parts.nav_mobile')
@endsection
