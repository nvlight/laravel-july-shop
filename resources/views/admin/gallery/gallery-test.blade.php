@extends('_layouts.main')

@section('title', 'Laravel - July shop!')

@section('sidebar')
    <p>Sidebar</p>
@endsection

@section('content')
    <h1>Test work with uploads</h1>

    <form action="{{route('gallery-test-get')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image[]">

        <button type="submit">upload file</button>
    </form>
@endsection
