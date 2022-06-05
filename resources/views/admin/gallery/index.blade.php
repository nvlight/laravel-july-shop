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
        @include('gallery.session_messages.default_message')
    </div>
    <div class="mb-3">
        @include('gallery.session_messages.gallery_delete')
    </div>
    <div class="mb-3">
        @include('gallery.session_messages.gallery_images_created')
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
                    <td>
                        <img src="{{asset('storage/'.$gallery->image)}}" alt="" width="100px" height="100px">
                        <br>
                        {{ $gallery->image }}
                    </td>
                    <td>{{ $gallery->is_main }}</td>
                    <td>
                        @include('gallery.parts.buttons.actions_buttons', ['gallery' => $gallery])
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
