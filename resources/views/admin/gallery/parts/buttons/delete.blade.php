@if(isset($id))
    <form class="" action="{{route('admin.gallery.destroy', $id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">delete</button>
    </form>
@endif
