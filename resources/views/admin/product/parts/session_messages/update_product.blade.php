@if(session()->has('update_product'))
    @if(session()->get('update_product')['success'])
        <div class="alert alert-success" role="alert">
            {{session()->get('update_product')['message']}}
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            {{session()->get('update_product')['message']}}
        </div>
    @endif
@endif
