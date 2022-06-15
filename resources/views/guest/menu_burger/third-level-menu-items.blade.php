<div class="third_level_menu---{{$child->id}} hide">
    <div class="menu-burger__title">
        <a class="menu-burger__title-link j-menu-drop-link"
           href="https://www.wildberries.ru/catalog/{{$child->id}}">{{$child->title}}</a>
    </div>
    <ul class="menu-burger__set">
        @foreach($childs3rd_level as $children)
            <li class="menu-burger__item">
                <a class="menu-burger__link j-menu-drop-link"
                   href="https://www.wildberries.ru/catalog/{{$children->id}}">{{$children->title}}
                </a>
            </li>
        @endforeach
    </ul>
</div>
