@extends('_layouts.main')

@section('title', 'Laravel - July shop!')

@section('sidebar')
    <p>Sidebar</p>
@endsection

@section('content')

    <div class="mb-3">
        <a href="{{route('gallery.index')}}" class="">Gallery list</a>
    </div>
    <div class="mb-3">
        <a href="{{route('gallery.create')}}" class="btn btn-primary">Create new</a>
    </div>
    <div class="mb-3">
        @include('gallery.parts.buttons.edit', ['id' => $gallery->id, 'class' => ''])
    </div>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>field key</th>
            <th>field value</th>
        </tr>
        <tr>
            <td>id</td>
            <td>{{$gallery->id}}</td>
        </tr>
        <tr>
            <td>parent_id</td>
            <td>{{$gallery->parent_id}}</td>
        </tr>
        <tr>
            <td>is_main</td>
            <td>{{$gallery->is_main}}</td>
        </tr>
        <tr>
            <td>image</td>
            <td>
                <img src="{{asset('storage/'.$gallery->image)}}" alt="">
            </td>
        </tr>

        </thead>
        <tbody>
        </tbody>
    </table>

@endsection
