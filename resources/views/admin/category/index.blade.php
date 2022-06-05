@extends('_layouts.main')

@section('title', 'Laravel - July shop!')

@section('sidebar')
    <p>Sidebar</p>
@endsection

@section('content')
    <h2>Categories</h2>
    <div class="mb-3">
        <a href="{{route('admin.category.create')}}" class="btn btn-primary">Create new</a>
    </div>
    <div class="mb-3">
        @include('admin.category.session_messages.category_delete')
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>parent_id</th>
                <th>title</th>
                <th>actions</th>
            </tr>
            </thead>
            <tbody>
                @include('admin.category.parts.category_trs', ['categories' => $categories])
            </tbody>
        </table>
    </div>
@endsection
