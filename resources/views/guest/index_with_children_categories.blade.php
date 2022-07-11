@extends('_layouts.main')

@section('title', 'show categories tree')

@section('content')
    @include('guest.parts.header')
    @include('guest.parts.nav')
        @include('guest.parts.main')
    @include('guest.parts.footer')
@endsection

@section('nav_mobile')
    @include('guest.parts.nav_mobile')
@endsection
