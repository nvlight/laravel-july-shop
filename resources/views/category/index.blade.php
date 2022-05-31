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
    <div class="mb-3">
        @if(session()->has('category_delete'))
            @if(session()->get('category_delete')['success'])
                <div class="alert alert-success" role="alert">
                    {{session()->get('category_delete')['message']}}
                </div>
            @else
                <div class="alert alert-danger" role="alert">
                    {{session()->get('category_delete')['message']}}
                </div>
            @endif
        @endif
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
                @include('category.parts.category_trs', ['categories' => $categories])
{{--                @foreach($categories as $category)--}}
{{--                    <tr>--}}
{{--                        <td>{{ $category->id }}</td>--}}
{{--                        <td>{{ $category->parent_id }}</td>--}}
{{--                        <td>{{ $category->title }}</td>--}}
{{--                        @include('category.parts.actions_buttons', ['id' => $category->id])--}}
{{--                    </tr>--}}
{{--                    @if(count($category->children))--}}
{{--                        @include('category.parts.children', ['categories' => $category->children])--}}
{{--                    @endif--}}
{{--                @endforeach--}}
            </tbody>
        </table>
    </div>
@endsection
