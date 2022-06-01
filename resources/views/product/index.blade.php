@extends('_layouts.main')

@section('title', 'Laravel - July shop!')

@section('sidebar')
    <p>Sidebar</p>
@endsection

@section('content')
    <h2>Products</h2>
    <div class="mb-3">
        <a href="{{route('product.create')}}" class="btn btn-primary">Create new</a>
    </div>
    <div class="mb-3">
        @include('product.parts.session_messages.delete_product')
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>title</th>
                <th>price</th>
                <th>age_start</th>
                <th>age_end</th>
                <th>size</th>
                <th>category_id</th>
                <th>brand_id</th>
                <th>country_id</th>
                <th>description</th>
                <th>actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->age_start }}</td>
                        <td>{{ $product->age_end }}</td>
                        <td>{{ $product->size }}</td>
                        <td>{{ $product->category_id }}</td>
                        <td>{{ $product->brand_id }}</td>
                        <td>{{ $product->country_id }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            @include('product.parts.buttons', ['product' => $product])
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
