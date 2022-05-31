@if(session()->has('category_update'))
    @if(session()->get('category_update')['success'])
        <div class="alert alert-success" role="alert">
            {{session()->get('category_update')['message']}}
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            {{session()->get('category_update')['message']}}
        </div>
    @endif
@endif
