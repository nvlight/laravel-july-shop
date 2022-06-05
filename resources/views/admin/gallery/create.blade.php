@extends('_layouts.main')

@section('title', 'Product - create')

@section('sidebar')
    sidebar
@endsection

@section('content')
    <h2>Добавление галлереи картинок для продукта</h2>

    <div class="mb-3">
        <a href="{{route('admin.gallery.index')}}" class="">Gallery list</a>
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
        <form action="{{route('admin.gallery.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="">
                <label for="parent_id" class="form-label">parent_id</label>
                <select class="form-select" id="parent_id" name="parent_id" aria-label="Default select example">
                    <option value="0">Продукт не выбран</option>
                    @foreach($products as $product)
                        @if( (old('parent_id')) == $product->id)
                            <option value="{{$product->id}}" selected>{{$product->title}} ({{$product->id}})</option>
                        @else
                            <option value="{{$product->id}}">{{$product->title}} ({{$product->id}})</option>
                        @endif
                    @endforeach
                </select>
                <div id="is_mainHelp" class="form-text">* required field</div>
                @error('parent_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="image" class="form-label">image 1</label>
                <input type="file" class="form-control" id="image" name="image[]" placeholder="type image here"
                    value="@php if (isset(old('image')[0])) { echo old('image')[0]; } @endphp">
                <div id="imageHelp" class="form-text">* required field</div>
                @error('image.0')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="image" class="form-label">image 2</label>
                <input type="file" class="form-control" id="image" name="image[]" placeholder="type image here">
                @error('image.1')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="image" class="form-label">image 3</label>
                <input type="file" class="form-control" id="image" name="image[]" placeholder="type image here">
                @error('image.2')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="image" class="form-label">image 4</label>
                <input type="file" class="form-control" id="image" name="image[]" placeholder="type image here">
                @error('image.3')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="image" class="form-label">image 5</label>
                <input type="file" class="form-control" id="image" name="image[]" placeholder="type image here">
                @error('image.4')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-3">
                <label for="is_main" class="form-label">Главная картинка</label>
                <select class="form-select" id="is_main" name="is_main" aria-label="Default select example">
                    <option value="0" selected>Главная картинка не выбрана</option>
                    @foreach( range(1,5) as $k => $v)
                        @if(old('is_main') == $v)
                            <option value="{{$v}}" selected>Картинка {{$v}}</option>
                        @else
                            <option value="{{$v}}">Картинка {{$v}}</option>
                        @endif
                    @endforeach
                </select>
                <div id="is_mainHelp" class="form-text">* required field</div>
                    @error('is_main')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>

@endsection
