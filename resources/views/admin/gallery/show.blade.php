@php
    use \App\Http\Controllers\Guest\ProductController;
@endphp

@extends('_layouts.admin_main')

@section('title', 'Gallery/show')

@section('sidebar')
    <p>Sidebar</p>
@endsection

@section('content')

    <div class="mb-3">
        <a href="{{route('admin.gallery.index')}}" class="">Gallery list</a>
    </div>
    <div class="mb-3">
        <a href="{{route('admin.gallery.create')}}" class="btn btn-primary">Create new</a>
    </div>
    <div class="mb-3">
        @include('admin.gallery.parts.buttons.edit', ['id' => $gallery->id, 'class' => ''])
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
                <td>
                    <p>orig image size</p>
                    <p>{{filesize('storage/'.$gallery->image)}}</p>
                </td>
                <td>
                    <img src="{{asset('storage/'.$gallery->image)}}" alt="">
                </td>
            </tr>

            <tr>
                <td>
                    <p>preset: {{ config('product.gallery.paths.big') }}</p>
                    <p>Size: {{ filesize(ProductController::image_big_path_static($gallery->parent_id, $gallery->image))}}</p>
                </td>
                <td>
                    <img src="{{ asset(ProductController::image_big_path_static($gallery->parent_id, $gallery->image)) }}" style=" height: auto;" alt="">
                </td>
            </tr>

            <tr>
                <td>
                    <p>preset: {{ config('product.gallery.paths.c516x688') }}</p>
                    <p>Size: {{ filesize(ProductController::image_c516x688_path_static($gallery->parent_id, $gallery->image))}}</p>
                </td>
                <td>
                    <img src="{{ asset(ProductController::image_c516x688_path_static($gallery->parent_id, $gallery->image)) }}" style=" height: auto;" alt="">
                </td>
            </tr>

            <tr>
                <td>
                    <p>preset: {{ config('product.gallery.paths.c246x328') }}</p>
                    <p>Size: {{ filesize(ProductController::image_c246x328_path_static($gallery->parent_id, $gallery->image))}}</p>
                </td>
                <td>
                    <img src="{{ asset(ProductController::image_c246x328_path_static($gallery->parent_id, $gallery->image)) }}" style=" height: auto;" alt="">
                </td>
            </tr>

        </thead>
        <tbody>
        </tbody>
    </table>

@endsection
