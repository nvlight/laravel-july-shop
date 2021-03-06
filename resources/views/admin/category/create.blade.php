@extends('_layouts.admin_main')

@section('title', 'Product - create')

@section('sidebar')
    sidebar
@endsection

@section('content')
    <h2>Create Category</h2>

    <div class="mb-3">
        <a href="{{route('admin.category.index')}}" class="">Category list</a>
    </div>

    <div class="mb-3">
        @php
            //dump(session()->all());
            //dump(request()->all());
        @endphp
    </div>

    <div class="card p-3">
        <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
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
                <label for="parent_id" class="form-label">parent_id</label>
                <select class="form-select" id="parent_id" name="parent_id" aria-label="Default select example">
                    <option value="0" selected>Самостоятельная категория</option>
                    @include('admin.category.parts.recursive_children_select_part', [
                        'categories' => $categories,
                        'step' => 1,
                        'target_value' => old('parent_id'),
                    ])
                </select>
                <div id="textHelp" class="form-text">* required field</div>
                @error('parent_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" placeholder="type title here"
                       value="{{old('image')}}">
                <div id="textHelp" class="form-text">image for category</div>
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="svg1" class="form-label">Svg 1</label>
                <input type="file" class="form-control" id="svg1" name="svg1"
                       value="{{old('svg1')}}">
                <div id="textHelp" class="form-text">svg1 for category</div>
                @error('svg1')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="svg2" class="form-label">Svg 2</label>
                <input type="file" class="form-control" id="svg2" name="svg2"
                       value="{{old('svg2')}}">
                <div id="textHelp" class="form-text">svg2 for category</div>
                @error('svg2')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>

@endsection
