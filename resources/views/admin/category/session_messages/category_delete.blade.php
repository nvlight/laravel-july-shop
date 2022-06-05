@if(session()->has('category_delete'))
    @if(session()->get('category_delete')['success'])
        <div class="alert alert-success" role="alert">
            {{session()->get('category_delete')['message']}}
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            {{session()->get('category_delete')['message']}}
        </div>
    @endif
@endif
