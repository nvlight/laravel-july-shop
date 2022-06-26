<div class="third_level_menu---{{$child->id}} hide">
    <div class="menu-burger__title">
        {{-- По клику должен исчезать 2-й уровень мобильного меню и появляться 3-й уровень, ага! --}}
        <button class="menu-burger__back j-menu-burger-mobile-back menu-burger__back__hide3rd_back_to2rd" type="button" aria-label="back-category">
            <span class="menu-burger__back-arrow"></span>
        </button>
        <a class="menu-burger__title-link j-menu-drop-link menu-burger__title-name"
           href="{{route('guest.category.show', $child->id)}}">{{$child->title}}</a>
    </div>
    <ul class="menu-burger__set">
        @foreach($childs3rd_level as $children)
            <li class="menu-burger__item">
                <a class="menu-burger__link j-menu-drop-link"
                   href="{{route('guest.category.show', $children->id)}}">{{$children->title}}
                </a>
            </li>
        @endforeach
    </ul>
</div>
