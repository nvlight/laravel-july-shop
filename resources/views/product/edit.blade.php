@extends('_layouts.main')

@section('title', 'Product - create')

@section('sidebar')
    sidebar
@endsection

@section('content')
    <h2>Edit Product</h2>

    <div class="mb-3">
        @php
            //dump($product->toArray());
            //dump(session()->all());
        @endphp
        <a href="{{route('product.index')}}" class="">Products list</a>
        @include('product.parts.session_messages.update_product')
    </div>

    <div class="card p-3">
        <form action="{{route('product.update', $product->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="type title here"
                       value="{{$product->title ?? old('title')}}">
                <div id="textHelp" class="form-text">* required field</div>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="type price here"
                       value="{{$product->price ?? old('price')}}">
                <div id="priceHelp" class="form-text">* required field</div>
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">parent_id</label>
                <select class="form-select" id="category_id" name="category_id" aria-label="Default select example">
                    <option value="0" selected>Категория не выбрана</option>
                    @include('category.parts.recursive_children_select_part', [
                        'categories' => $categories,
                        'step' => 1,
                        'target_value' => $product->category_id,
                    ])
                </select>
                @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="age_start" class="form-label">Age start</label>
                <input type="text" class="form-control" id="age_start" name="age_start" placeholder="от 5 лет"
                       value="{{$product->age_start ?? old('age_start')}}">
                @error('age_start')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="age_end" class="form-label">Age end</label>
                <input type="text" class="form-control" id="age_end" name="age_end" placeholder="до 7.5 лет"
                       value="{{$product->age_end ?? old('age_end')}}">
                @error('age_end')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="size" class="form-label">Size</label>
                <input type="text" class="form-control" id="size" name="size" placeholder="type size here"
                       value="{{$product->size ?? old('size')}}">
                @error('size')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="brand_id" class="form-label">brand_id</label>
                <select class="form-select" id="brand_id" name="brand_id" aria-label="Default select example">
                    <option value="0">Choose brand</option>
                    @php
                        $staticBrands = ['Adidas','Beauti','Cool Design','In Soviet Country','Dolce montana',];
                    @endphp
                    @foreach($staticBrands as $key => $brand)
                        @if( ($key+1) == $product->brand_id)
                            <option value="{{$key+1}}" selected>{{$brand}}</option>
                        @else
                            <option value="{{$key+1}}">{{$brand}}</option>
                        @endif
                    @endforeach
                </select>
                @error('brand_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="country_id" class="form-label">country_id</label>
                <select class="form-select" id="country_id" name="country_id" aria-label="Default select example">
                    <option value="0">Choose country</option>
                    @php
                        $staticCountries = ['Russia','USA','Spain','China','France',];
                    @endphp
                    @foreach($staticCountries as $key => $country)
                        @if( ($key+1) == $product->country_id)
                            <option value="{{$key+1}}" selected>{{$country}}</option>
                        @else
                            <option value="{{$key+1}}">{{$country}}</option>
                        @endif
                    @endforeach
                    <option value="1">Russia</option>
                </select>
                @error('country_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{$product->description ?? old('description')}}</textarea>
                <div id="descriptionHelp" class="form-text">simple description</div>
            </div>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>

@endsection
