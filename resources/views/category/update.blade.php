@extends('_layouts.main')

@section('title', 'Product - create')

@section('sidebar')
    sidebar
@endsection

@section('content')
    <h2>Create Category</h2>

    <div class="mb-3">
        <a href="{{route('category.index')}}" class="">Category list</a>
    </div>

    <div class="mb-3">
        @php
            //dump(session()->all())
        @endphp
    </div>

    <div class="mb-3">
        @include('category.session_messages.category_update')
        @include('category.session_messages.category_delete')
    </div>

    <div class="card p-3">
        <form action="{{route('category.update', $category->id)}}" method="POST">
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
                    @include('category.parts.recursive_children_select_part', [
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

            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
        <div class="mt-3">
            @include('category.parts.buttons.delete_button', ['id' => $category->id])
        </div>
    </div>

@endsection
