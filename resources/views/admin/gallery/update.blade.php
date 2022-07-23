@extends('_layouts.admin_main')

@section('title', 'Product - create')

@section('sidebar')
    sidebar
@endsection

@section('content')
    <h2>Редактирование картинки продукта</h2>

    <div class="mb-3">
        <a href="{{route('admin.gallery.index')}}" class="">Gallery list</a>
    </div>
    <div class="mb-3">
        @include('admin.gallery.session_messages.gallery_update')
    </div>
    <div class="mb-3">
        @include('admin.gallery.parts.buttons.show', ['id' => $gallery->id, 'class' => ''])
    </div>

    <div class="card p-3">
        <div class="row">
            <div class="col-md-4">
                <form action="{{route('admin.gallery.update', $gallery->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <input type="hidden" name="parent_id" value="{{$gallery->parent_id}}">
                    @error('parent_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="id"
                               disabled value="{{$gallery->id}}">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">image</label>
                        <input type="file" class="form-control" name="image[]" placeholder="type image here" id="image"
                               value="{{$gallery->image}}">
                        <div class="form-text">{{$gallery->image}}</div>
                        <div id="imageHelp" class="form-text">Выберите новую картинку, чтобы обновить текущую</div>
                        @error('image.0')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    @if( $gallery->is_main)
                        <div class="mb-3">
                            <strong disabled="">Картинка является главной</strong>
                        </div>
                    @else
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="is_main" name="is_main">
                            <label class="form-check-label" for="is_main">
                                Сделать картинку главной!
                            </label>
                        </div>
                    @endif

                    @error('is_main')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Обновить</button>
                </form>
            </div>

            <div class="col-md-8">
                <div>
                    @php
                        $preset = config('product.gallery.paths.big');
                        $imgPathPartsArr = explode('/', $gallery->image);
                        $imgName = $imgPathPartsArr[count($imgPathPartsArr)-1];
                        $imgFullName = config('product.gallery.paths.products_show_path') . '/' . $gallery->parent_id . '/'
                            . $preset . '/' . $imgName . '.webp';
                    @endphp
                    <p>preset: {{$preset}}</p>
                    <p>Size: {{filesize($imgFullName)}}</p>
                    <img src="{{ asset($imgFullName) }}"
                         style="width: 100%; height: auto;" alt="">
                </div>
            </div>
        </div>
    </div>

@endsection
