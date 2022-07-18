@extends('_layouts.admin_main')

@section('title', 'admin/product')

@section('sidebar')
    <p>Sidebar</p>
@endsection

@section('content')
    <h2>Products</h2>
    <div class="mb-3">
        <a href="{{route('admin.product.create')}}" class="btn btn-primary">Create new</a>
    </div>
    <div class="mb-3">
        @include('admin.product.parts.session_messages.delete_product')
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>category_id</th>
                <th>title</th>
                <th>price</th>
                <th>old_price</th>
                <th>description</th>
                <th>actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->category_id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->old_price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        @include('admin.product.parts.buttons', ['product' => $product])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
