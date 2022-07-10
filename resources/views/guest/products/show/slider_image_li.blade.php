@foreach($sliderImages as $key => $image)
    <li class="swiper-slide slide @if($key==0) active @endif" data-image-index="{{$key+1}}" style="height: 96px; margin-bottom: 8px;">
        <div class="slide__content img-plug j-wba-card-item">
            <img src="{{$image}}" alt="Вид {{$key+1}}.">
        </div>
    </li>
@endforeach
