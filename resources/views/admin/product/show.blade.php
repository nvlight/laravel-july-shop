@extends('_layouts.admin_main')

@section('title', 'Laravel - July shop!')

@section('sidebar')
    <p>Sidebar</p>
@endsection

@section('content')

    <div class="mb-3">
        <a href="{{route('admin.product.index')}}" class="">Product list</a>
    </div>
    <div class="mb-3">
        <a href="{{route('admin.product.index')}}" class="btn btn-primary">Create new</a>
    </div>
    <div class="mb-3">
        {{-- @include('category.parts.buttons.edit_button', ['id' => $category->id, 'class' => ''])--}}
    </div>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>field key</th>
            <th>field value</th>
        </tr>
        <tr>
            <td>id</td>
            <td>{{$product->id}}</td>
        </tr>
        <tr>
            <td>category_id</td>
            <td>{{$product->category_id}}</td>
        </tr>
        <tr>
            <td>title</td>
            <td>{{$product->title}}</td>
        </tr>
        <tr>
            <td>price</td>
            <td>{{$product->price}}</td>
        </tr>

        <tr>
            <td>old_price</td>
            <td>{{$product->old_price}}</td>
        </tr>
        <tr>
            <td>description</td>
            <td>
                <textarea class="form-control" name="" id="" cols="30" rows="10">{{$product->description}}</textarea>
            </td>
        </tr>

        </thead>
        <tbody>
        </tbody>
    </table>

@endsection
