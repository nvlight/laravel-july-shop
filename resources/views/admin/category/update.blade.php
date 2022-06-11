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
            //dump(session()->all())
        @endphp
    </div>

    <div class="mb-3">
        @include('admin.category.session_messages.category_update')
        @include('admin.category.session_messages.category_delete')
        @include('admin._parts.default_message')
    </div>

    <div class="card p-3">
        <form action="{{route('admin.category.update', $category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="type title here"
                       value="{{$category->title}}">
                <div id="textHelp" class="form-text">* required field</div>
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="parent_id" class="form-label">parent_id</label>
                <select class="form-select" id="parent_id" name="parent_id" aria-label="Default select example">
                    <option value="0">Самостоятельная категория</option>
                    @include('admin.category.parts.recursive_children_select_part', [
                        'categories' => $categories,
                        'step' => 1,
                        'target_value' => $category->parent_id,
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
                       value="{{$category->image}}">
                @if($category->image)
                    <div id="textHelp" class="form-text">current image: {{$category->image}}</div>
                @endif
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div>
                    <img src="{{asset(env('BURGER_MENU_1ST_LEVEL_IMAGES_SHOW_PATH').$category->image)}}" alt="">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
        <div class="mt-3">
            <form action="{{route('admin.category.destroy-image', $category->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">destroy image</button>
            </form>
        </div>
        <div class="mt-3">
            @include('admin.category.parts.buttons.delete_button', ['id' => $category->id])
        </div>
    </div>

@endsection
