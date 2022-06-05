@if(session()->has('gallery_update'))
    @if(session()->get('gallery_update')['success'])
        <div class="alert alert-success" role="alert">
            {{session()->get('gallery_update')['message']}}
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            {{session()->get('gallery_update')['message']}}
        </div>
    @endif
@endif
