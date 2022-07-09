@extends('_layouts.admin_main')

@section('title', 'Laravel - July shop!')

@section('sidebar')
    <p>Sidebar</p>
@endsection

@section('content')
    <h2>Galleries</h2>
    <div class="mb-3">
        <a href="{{route('admin.gallery.create')}}" class="btn btn-primary">Create new</a>
    </div>
    <div class="mb-3">
        @include('admin.gallery.session_messages.default_message')
    </div>
    <div class="mb-3">
        @include('admin.gallery.session_messages.gallery_delete')
    </div>
    <div class="mb-3">
        @include('admin.gallery.session_messages.gallery_images_created')
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
            <?php $start = 0; ?>
            @foreach($galleries as $key => $gallery)

                    @if(!$start)
                        <tr>
                            <td>{{ $gallery->id }}</td>
                            <td>{{ $gallery->title}}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <img src="{{asset('storage/'.$gallery->image)}}" alt="" width="100px" height="100px">
                                <br>
                                {{ $gallery->image }}
                            </td>
                            <td>{{ $gallery->is_main }}</td>
                            <td>
                                @include('admin.gallery.parts.buttons.actions_buttons', ['gallery' => $gallery])
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <img src="{{asset('storage/'.$gallery->image)}}" alt="" width="100px" height="100px">
                                <br>
                                {{ $gallery->image }}
                            </td>
                            <td>{{ $gallery->is_main }}</td>
                            <td>
                                @include('admin.gallery.parts.buttons.actions_buttons', ['gallery' => $gallery])
                            </td>
                        </tr>
                    @endif

                <?php
                    isset($galleries[$key+1]) && $galleries[$key+1]->parent_id != $galleries[$key]->parent_id ?
                        $start = 0 :
                        $start++;
                ?>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
