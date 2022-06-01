@extends('_layouts.main')

@section('title', 'Laravel - July shop!')

@section('sidebar')
    <p>Sidebar</p>
@endsection

@section('content')
    <h2>Galleries</h2>
    <div class="mb-3">
        <a href="{{route('gallery.create')}}" class="btn btn-primary">Create new</a>
    </div>
    <div class="mb-3">
{{--        @include('product.parts.session_messages.delete_product')--}}
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>parent_id</th>
                <th>image</th>
                <th>is_main</th>
                <th>actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($galleries as $gallery)
                <tr>
                    <td>{{ $gallery->id }}</td>
                    <td>{{ $gallery->parent_id }}</td>
                    <td>{{ $gallery->image }}</td>
                    <td>{{ $gallery->is_main }}</td>
                    <td>
{{--                        @include('product.parts.buttons', ['product' => $product])--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
