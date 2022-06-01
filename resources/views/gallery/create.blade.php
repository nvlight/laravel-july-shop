@extends('_layouts.main')

@section('title', 'Product - create')

@section('sidebar')
    sidebar
@endsection

@section('content')
    <h2>Добавление галлереи картинок для продукта</h2>

    <div class="mb-3">
        <a href="{{route('gallery.index')}}" class="">Gallery list</a>
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
        <form action="{{route('gallery.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
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
            <div class="d-flex">
                <div>
                    <label for="image" class="form-label">image 1</label>
                    <input type="file" class="form-control" id="image" name="image[]" placeholder="type image here"
                        value="@php if (isset(old('image')[0])) { echo "$(old('image')[0])"; } @endphp">
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
            </div>

            <div class="mt-3">
                <span>
                    Выберите главную картинку
                </span>
            </div>
            <div class="mb-3 form-check">
                <input type="radio" class="form-check-input" id="is_main1" name="is_main" placeholder="type title here">
                <label for="is_main1" class="form-check-label">Главная картинка 1</label>
            </div>
            <div class="mb-3 form-check">
                <input type="radio" class="form-check-input" id="is_main2" name="is_main" placeholder="type title here">
                <label for="is_main2" class="form-check-label">Главная картинка 2</label>
            </div>
            @error('is_main')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
{{--            <div class="mb-3 ">--}}
{{--                <input type="checkbox" class="form-check-input" id="is_main" name="is_main" placeholder="type title here" value="{{old('is_main')}}">--}}
{{--                <label for="is_main" class="form-check-label">Главная картинка</label>--}}
{{--                @error('is_main')--}}
{{--                    <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                @enderror--}}
{{--            </div>--}}

            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>

@endsection
