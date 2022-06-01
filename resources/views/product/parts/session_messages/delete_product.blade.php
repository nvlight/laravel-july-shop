@if(session()->has('product_delete'))
    @if(session()->get('product_delete')['success'])
        <div class="alert alert-success" role="alert">
            {{session()->get('product_delete')['message']}}
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            {{session()->get('product_delete')['message']}}
        </div>
    @endif
@endif
