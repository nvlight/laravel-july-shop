@if(isset($id))
    <div class="">
        <a href="{{route('product.show', $id)}}" class="d-flex btn btn-success">show</a>
    </div>
@endif
