<div class="menu-burger__drop-list-item j-menu-drop-item j-menu-drop-item-{{$category->id}}"
     data-menu-id="{{$category->id}}">
    <div class="menu-burger__wrap">
        <div class="menu-burger__first j-menu-inner-column">
            <div class="menu-burger__title">
                <a class="menu-burger__title-link j-menu-drop-link"
                   href="https://www.ildberries.ru/catalog/---{{$category->id}}">{{$category->title}}</a>
            </div>
            {{-- тут идет список с линками или с выпадашками --}}
            <ul class="menu-burger__set">
                @foreach($category->children as $child)
                    <li class="menu-burger__item">
                        <a class="menu-burger__link j-menu-drop-link"
                           href="https://www.ildberries.ru/catalog/---{{$child->id}}">{{$child->title}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        {{-- тут будет либо красивая большая картинка верхнего меню либо список 3-го уровня бургера-меню  --}}
        <div class="menu-burger__second j-menu-inner-column">
            <div class="j-menu-banner">
                <div class="menu-burger__banner"><a
                        class="menu-burger__banner-link j-banner j-banner-click-stat j-banner-wba"
                        href="/catalog/---{{$child->id}}"
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
    </div>
</div>
