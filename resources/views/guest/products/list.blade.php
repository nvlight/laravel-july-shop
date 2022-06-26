<h3>Products list</h3>

@php
    //dump($products->toArray());
@endphp
@foreach($products as $product)
    <p>
        {{$product->title}} - {{$product->price}}
        @if(count($product->images))
            <div>
                <span>images: </span>
                @foreach($product->images as $image)
                    <p>
                        {{$image->image}} --- {{$image->is_main}}
                    </p>
                @endforeach
            </div>
        @endif
    </p>
    <hr>
@endforeach
