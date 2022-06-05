@if(session()->has('gallery_delete'))
    @if(session()->get('gallery_delete')['success'])
        <div class="alert alert-success" role="alert">
            {{session()->get('gallery_delete')['message']}}
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            {{session()->get('gallery_delete')['message']}}
        </div>
    @endif
@endif
