@if(session()->has('default_message'))
    @if(session()->get('default_message')['success'])
        <div class="alert alert-success" role="alert">
            {{session()->get('default_message')['message']}}
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            {{session()->get('default_message')['message']}}
        </div>
    @endif
@endif
