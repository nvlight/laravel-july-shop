@extends('_layouts.admin_main')

@section('title', 'admin/gallery')

@section('sidebar')
    <p>Sidebar</p>
@endsection

@section('content')
    <h2>Galleries</h2>
    <div class="mb-3">
        <a href="{{route('admin.gallery.create')}}" class="btn btn-primary">Create new</a>
    </div>
    <div class="mb-3">
        @include('admin.gallery.session_messages.default_message')
    </div>
    <div class="mb-3">
        @include('admin.gallery.session_messages.gallery_delete')
    </div>
    <div class="mb-3">
        @include('admin.gallery.session_messages.gallery_images_created')
    </div>
    @include('admin.gallery.parts.main_index_table')
@endsection
