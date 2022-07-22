@extends('_layouts.admin_main')

@section('title', 'Laravel - July shop!')

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
                orig image size
            </td>
            <td>
                {{filesize('storage/'.$gallery->image)}}
            </td>
        </tr>
        <tr>
            <td>image</td>
            <td>
                <img src="{{asset('storage/'.$gallery->image)}}" alt="">
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        @foreach(config('product.gallery.convert_presets') as $key => $image)
            @php
                $imgPathPartsArr = explode('/', $gallery->image);
                $imgName = $imgPathPartsArr[count($imgPathPartsArr)-1];
                $imgFullName = config('product.gallery.paths.products_show_path') . '/' . $gallery->parent_id . '/'
                    . $key . '/' . $imgName . '.webp';
            @endphp
            <tr>
                <td>
                    <p>preset: {{$key}}</p>
                    <p>Size: {{filesize($imgFullName)}}</p>
                </td>
                <td>
                    <img src="{{asset($imgFullName)}}" style="width: {{$image['width']}}px; height: auto;" alt="">
                </td>
            </tr>
        @endforeach


        </thead>
        <tbody>
        </tbody>
    </table>

@endsection
