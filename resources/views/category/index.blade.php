@extends('_layouts.main')

@section('title', 'Laravel - July shop!')

@section('sidebar')
    <p>Sidebar</p>
@endsection

@section('content')
    <h2>Categories</h2>
    <div class="mb-3">
        <a href="{{route('category.create')}}" class="btn btn-primary">Create new</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>parent_id</th>
                <th>title</th>
            </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->parent_id }}</td>
                        <td>{{ $category->title }}</td>
                    </tr>
                    @if(count($category->children))
                        @include('category.parts.children', ['children' => $category->children])
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
