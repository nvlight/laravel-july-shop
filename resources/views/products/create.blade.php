@extends('_layouts.products_main')

@section('title', 'Product - create')

@section('sidebar')
    sidebar
@endsection

@section('content')
    <h2>Create Product</h2>

    <div class="mb-3">
        <a href="{{route('product.index')}}" class="">Products list</a>
    </div>

    <div class="mb-3">
{{--        @php--}}
{{--            dump($errors);--}}
{{--        @endphp--}}
{{--        @if($errors->any())--}}
{{--            @foreach($errors->all() as $error)--}}
{{--                @php--}}
{{--                    dump($error);--}}
{{--                @endphp--}}
{{--            @endforeach--}}
{{--        @endif--}}
    </div>
    <div class="card p-3">
        <form action="{{route('product.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="type title here" value="{{old('title')}}">
                <div id="textHelp" class="form-text">* required field</div>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="type price here">
                <div id="priceHelp" class="form-text">* required field</div>
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="age_start" class="form-label">Age start</label>
                <input type="text" class="form-control" id="age_start" name="age_start" placeholder="от 5 лет">
            </div>
            <div class="mb-3">
                <label for="age_end" class="form-label">Age end</label>
                <input type="text" class="form-control" id="age_end" name="age_end" placeholder="до 7.5 лет">
            </div>
            <div class="mb-3">
                <label for="size" class="form-label">Size</label>
                <input type="text" class="form-control" id="size" name="size" placeholder="type size here">
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">category_id</label>
                <select class="form-select" id="category_id" name="category_id" aria-label="Default select example">
                    <option value="0" disabled selected>Choose category</option>
                    <option value="1">first category</option>
                    <option value="2">second category</option>
                    <option value="3">third category</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="brand_id" class="form-label">brand_id</label>
                <select class="form-select" id="brand_id" name="brand_id" aria-label="Default select example">
                    <option value="0" disabled selected>Choose brand</option>
                    <option value="1">Adidas</option>
                    <option value="2">Beauti</option>
                    <option value="3">Cool Design</option>
                    <option value="3">In Soviet Country</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="country_id" class="form-label">country_id</label>
                <select class="form-select" id="country_id" name="country_id" aria-label="Default select example">
                    <option value="0" disabled selected>Choose country</option>
                    <option value="1">Russia</option>
                    <option value="2">USA</option>
                    <option value="3">Spain</option>
                    <option value="3">China</option>
                    <option value="3">France</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>
                <div id="descriptionHelp" class="form-text">simple description</div>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>

@endsection
