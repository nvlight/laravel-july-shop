@php
    $additClass = "";
@endphp
@if( count($category->children) )
    @php
        $additClass = " menu-burger__main-list-item--subcategory";
    @endphp
@endif
<li class="menu-burger__main-list-item j-menu-main-item {{$additClass}}" data-menu-id="{{$category->id}}">
    <a href="https://www.ildberries.ru/catalog/---{{$category->id}}"
       class="menu-burger__main-list-link menu-burger__main-list-link--{{$category->id}}">{{$category->title}}</a>
</li>
@if($category->svg1)
    <style>
    .menu-burger__main-list-link.menu-burger__main-list-link--{{$category->id}}::before {
        background-image: url({{asset(env('BURGER_MENU_1ST_LEVEL_SVGS_SHOW_PATH').$category->svg1)}});
    }
    .menu-burger__main-list-item--active .menu-burger__main-list-link.menu-burger__main-list-link--{{$category->id}}::before {
        background-image: url({{asset(env('BURGER_MENU_1ST_LEVEL_SVGS_SHOW_PATH').$category->svg2)}});
    }
    </style>
@endif

