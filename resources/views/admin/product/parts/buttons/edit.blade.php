@if(isset($id))
    <div class="">
        <a href="{{route('admin.product.edit', $id)}}" class="d-flex btn btn-primary">edit</a>
    </div>
@endif
