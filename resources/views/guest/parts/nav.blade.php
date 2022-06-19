<nav>
    {{--<div class="menu-burger j-menu-burger menu-burger--active" data-link="--}}
    <div class="menu-burger j-menu-burger">
        <div class="menu-burger__mobile-header hide-desktop">
            <input class="menu-burger__btn-search j-search-input-mobile" type="search" placeholder="Я ищу...">
        </div>
        {{-- это само меню верхнего уровня, который выезжает слева --}}
        <div class="menu-burger__main j-menu-burger-main j-menu-active">
            <ul class="menu-burger__main-list">
                @foreach($categories as $category)
                    @include('guest.menu_burger.menu-burger__main-list-item')
                @endforeach
            </ul>
            <div class="menu-burger__geo">
                <div class="menu-burger__geo-item menu-burger__geo-item--country">
                    <span class="menu-burger__geo-flag flag-ru"></span>Россия
                    <span class="hide" data-link="">/ русский</span>
                </div>
                <div class="menu-burger__geo-item menu-burger__geo-item--city j-geocity-link">Москва</div>
            </div>
        </div>
        {{-- по ховеру на меню верхнего уровня, должен открыть соответствующий ему меню нижнего уровня --}}
        {{-- также должны добавиться классы с menu-burger__drop--active j-menu-active menu-burger__drop--custom --}}
        {{-- menu-burger__drop--active j-menu-active menu-burger__drop--custom --}}
        {{-- Это 2-й уровень меню, появляется по клику на элемет первого меню --}}
        <div class="menu-burger__drop j-menu-burger-drop" data-link="">
            <div class="menu-burger__drop-list j-menu-drop-list">

                @foreach($categories as $category)
                    @if(count($category->children))
                        @include('guest.menu_burger.menu-burger__drop-list-item')
                    @endif
                @endforeach
            </div>
        </div>
        <button class="menu-burger__close j-close-menu-mobile" type="button">Закрыть меню</button>
    </div>
</nav>
