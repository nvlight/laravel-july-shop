<div class="breadcrumbs">
    <div class="breadcrumbs__container">
        <ul class="breadcrumbs__list" itemscope="" itemtype="https://schema.org/BreadcrumbList">
            <li class="breadcrumbs__item" itemprop="itemListElement" itemscope=""
                itemtype="https://schema.org/ListItem">
                <a class="breadcrumbs__link" href="/" itemprop="item"> <span itemprop="name">Главная</span> </a>
                <meta itemprop="position" content="1">
            </li>
            @foreach($breadCrumbs as $key => $breadcrumb)
                @if($key == (count($breadCrumbs)-1) )
                    <li class="breadcrumbs__item"
                        itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                        <span itemprop="name">{{$breadcrumb->title}}</span>
                        <meta itemprop="position" content="2">
                    </li>
                @else
                    <li class="breadcrumbs__item"
                        itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                        <a class="breadcrumbs__link" href="{{route('guest.category.show', $breadcrumb->id)}}">
                            <span itemprop="name">{{$breadcrumb->title}}</span>
                        </a>
                        <meta itemprop="position" content="2">
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</div>
