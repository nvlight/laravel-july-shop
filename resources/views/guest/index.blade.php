@extends('_layouts.main')

@section('title', 'Laravel - July shop!')

@section('content')
    @include('guest.parts.header')
    @include('guest.parts.nav')
    @include('guest.parts.main_parts.main_index')
    @include('guest.parts.footer')
@endsection

@section('nav_mobile')
    @include('guest.parts.nav_mobile')
@endsection
