@if(session()->has('gallery_images_created'))
    @if(session()->get('gallery_images_created')['success'])
        <div class="alert alert-success" role="alert">
            {{session()->get('gallery_images_created')['message']}}
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            {{session()->get('gallery_images_created')['message']}}
        </div>
    @endif
@endif
