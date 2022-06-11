@extends('_layouts.admin_main')

@section('title', 'Laravel - July shop!')

@section('sidebar')
    <p>Sidebar</p>
@endsection

@section('content')

    <div class="mb-3">
        <a href="{{route('admin.category.index')}}" class="">Category list</a>
    </div>
    <div class="mb-3">
        <a href="{{route('admin.category.create')}}" class="btn btn-primary">Create new</a>
    </div>
    <div class="mb-3">
        @include('admin.category.parts.buttons.edit_button', ['id' => $category->id, 'class' => ''])
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
        <tr>
            <td>image</td>
            <td><img src="{{asset(env('BURGER_MENU_1ST_LEVEL_IMAGES_SHOW_PATH').$category->image)}}" alt=""></td>
        </tr>
        <tr>
            <td>svg1</td>
            <td><img src="{{asset(env('BURGER_MENU_1ST_LEVEL_SVGS_SHOW_PATH').$category->svg1)}}" alt=""></td>
        </tr>
        <tr>
            <td>svg2</td>
            <td><img src="{{asset(env('BURGER_MENU_1ST_LEVEL_SVGS_SHOW_PATH').$category->svg2)}}" alt=""></td>
        </tr>

        </thead>
        <tbody>
        </tbody>
    </table>

@endsection
