@extends('_layouts.admin_main')

@section('title', 'Product - create')

@section('sidebar')
    sidebar
@endsection

@section('content')
    <h2>Тестирование сжатия картинки продукта</h2>

    <div class="mb-3">
        <a href="{{route('admin.gallery.index')}}" class="">Gallery list</a>
    </div>
    <div class="mb-3">
        @include('admin.gallery.session_messages.gallery_update')
    </div>

    <div class="card p-3">
        <div class="row">

            <div class="col-md-12">
                <div>
                    <p>Image orig</p>
                    <div>
                        <table class="table table-responsive table-bordered table-striped ">
                            <tr>
                                <th>path</th>
                                <th>img</th>
                                <th>size</th>
                            </tr>
                            <tr>
                                <td>orig</td>
                                <td>
                                    <img src="{{$fullImgPathAsset}}" style="" alt="">
                                </td>
                                <td>
                                    {{filesize($fullImgPath)}}
                                </td>
                            </tr>
                            @foreach($imgPresetsPath as $key => $image)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>
                                        <img src="{{asset($image['src'])}}" style="width: {{$image['width']}}px; height: auto;" alt="">
                                    </td>
                                    <td>
                                        {{filesize($image['src'])}}
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
