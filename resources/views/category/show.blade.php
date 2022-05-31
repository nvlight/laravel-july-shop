@extends('_layouts.main')

@section('title', 'Laravel - July shop!')

@section('sidebar')
    <p>Sidebar</p>
@endsection

@section('content')

    <div class="mb-3">
        <a href="{{route('category.index')}}" class="">Category list</a>
    </div>
    <div class="mb-3">
        <a href="{{route('category.create')}}" class="btn btn-primary">Create new</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>field key</th>
            <th>field value</th>
        </tr>
        <tr>
            <td>id</td>
            <td>{{$category->id}}</td>
        </tr>
        <tr>
            <td>parent_id</td>
            <td>{{$category->parent_id}}</td>
        </tr>
        <tr>
            <td>title</td>
            <td>{{$category->title}}</td>
        </tr>

        </thead>
        <tbody>
        </tbody>
    </table>

@endsection
