@extends('_layouts.admin_main')

@section('title', 'Product - create')

@section('sidebar')
    sidebar
@endsection

@section('content')
    <h2>Create Product</h2>

    <div class="mb-3">
        <a href="{{route('admin.product.index')}}" class="">Products list</a>
    </div>

    <div class="card p-3">
        <form action="{{route('admin.product.store')}}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="category_id" class="form-label">category_id</label>
                <select class="form-select" id="category_id" name="category_id" aria-label="Default select example">
                    <option value="0" selected>Категория не выбрана</option>
                    @include('admin.category.parts.recursive_children_select_part', [
                        'categories' => $categories,
                        'step' => 1,
                        'target_value' => old('category_id'),
                    ])
                </select>
                @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="type title here"
                       value="{{old('title')}}">
                <div id="textHelp" class="form-text">* required field</div>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="type price here"
                       value="{{old('price')}}">
                <div id="priceHelp" class="form-text">* required field</div>
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="old_price" class="form-label">old_price</label>
                <input type="text" class="form-control" id="old_price" name="old_price" placeholder="type old_price here"
                       value="{{old('old_price')}}">
                <div id="priceHelp" class="form-text">* required field</div>
                @error('old_price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description" cols="30"
                          rows="10">{{$product->description ?? old('description')}}</textarea>
                <div id="descriptionHelp" class="form-text">simple description</div>
            </div>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>

@endsection
