<div class="menu-burger__drop-list-item j-menu-drop-item j-menu-drop-item-{{$category->id}}"
     data-menu-id="{{$category->id}}">
    <div class="menu-burger__wrap">
        <div class="menu-burger__first j-menu-inner-column">
            {{-- По клику должен исчезать 2-й уровень мобильного меню --}}
            <button class="menu-burger__back j-menu-burger-mobile-back menu-burger__back__hide2rd" type="button" aria-label="back-category">
                <span class="menu-burger__back-arrow"></span>
            </button>
            <div class="menu-burger__title">
                <a class="menu-burger__title-link j-menu-drop-link menu-burger__title-name"
                   href="{{route('guest.category.show', $category->id)}}">{{$category->title}}</a>
            </div>
            {{-- тут идет список с линками или с выпадашками --}}
            <ul class="menu-burger__set">
                @foreach($category->children as $child)
                    <li class="menu-burger__item">
                        @if(count($child->children) )
                            <span class="menu-burger__next j-menu-drop-open" data-third-button-open-id="{{$child->id}}">
                                {{$child->title}}</span>
                        @else
                            <a class="menu-burger__link j-menu-drop-link"
                               href="{{route('guest.category.show', $child->id)}}">{{$child->title}}</a>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        {{-- тут будет либо красивая большая картинка верхнего меню либо список 3-го уровня бургера-меню  --}}
        <div class="menu-burger__second j-menu-inner-column">
            {{-- hide на этот див, чтобы спрятать его - бугага --}}
            <div class="j-menu-banner">
                <div class="menu-burger__banner"><a
                        class="menu-burger__banner-link j-banner j-banner-click-stat j-banner-wba"
                        href="/catalog/{{$child->id}}"
                        target="_self" title="Игровые консоли" rel="true" data-banner-index="0">
                        <div class="menu-burger__banner-photo img-plug">
                            <img class="j-menu-image" alt=""
                                 src="{{asset(env('BURGER_MENU_1ST_LEVEL_IMAGES_SHOW_PATH').$category->image)}}"
                                 data-src="{{asset(env('BURGER_MENU_1ST_LEVEL_IMAGES_SHOW_PATH').$category->image)}}"
                                 width="352" height="428"/>
                        </div>
                        <h3 class="menu-burger__banner-title">Fixed - fav menu url</h3>
                        <p class="menu-burger__banner-text"></p>
                    </a></div>
            </div>
        </div>

        <div class="menu-burger__third j-menu-inner-column hide">
            @foreach($category->children as $child)
                @if(count($child->children) )
                    @include('guest.menu_burger.third-level-menu-items', ['child' => $child, 'childs3rd_level' => $child->children])
                @endif
            @endforeach
        </div>
    </div>
</div>
