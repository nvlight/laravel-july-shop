@if(isset($id))
    <form class="d-flex" action="{{route('category.destroy', $id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">delete</button>
    </form>
@endif