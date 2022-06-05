@extends('_layouts.main')

@section('title', 'Product - create')

@section('sidebar')
    sidebar
@endsection

@section('content')
    <h2>Редактирование картинки продукта</h2>

    <div class="mb-3">
        <a href="{{route('admin.gallery.index')}}" class="">Gallery list</a>
    </div>
    <div class="mb-3">
        @include('admin.gallery.session_messages.gallery_update')
    </div>
    <div class="mb-3">
        @php
            //dump($errors);
            //dump(request()->all());
            //dump(session()->all());
        @endphp
{{--        @if($errors->any())--}}
{{--            @foreach($errors->all() as $error)--}}
{{--                @php--}}
{{--                    dump($error);--}}
{{--                @endphp--}}
{{--            @endforeach--}}
{{--        @endif--}}
    </div>
    <div class="card p-3">
        <form action="{{route('admin.gallery.update', $gallery->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <input type="hidden" name="parent_id" value="{{$gallery->parent_id}}">
            @error('parent_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" name="id" placeholder="id"
                       disabled value="{{$gallery->id}}">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">image</label>
                <input type="file" class="form-control" name="image[]" placeholder="type image here"
                    value="{{$gallery->image}}">
                <div class="form-text">{{$gallery->image}}</div>
                <div id="imageHelp" class="form-text">Выберите новую картинку, чтобы обновить текущую</div>
                @error('image.0')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            @if( !$gallery->is_main)
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="" id="is_main" name="is_main">
                    <label class="form-check-label" for="is_main">
                        Сделать главной картинкой
                    </label>
                </div>
            @endif
            @error('is_main')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
    </div>

@endsection
