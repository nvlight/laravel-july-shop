<div class="navbar-mobile hide-desktop j-navbar-mobile">
    <a class="navbar-mobile__link" data-link-type="home" href="/" aria-label="Главная страница">
        <span class="navbar-mobile__icon navbar-mobile__icon--home" data-link=""></span>
    </a>
    <span id="catalogNavbarLink" class="navbar-mobile__link" data-link-type="catalog" aria-label="Каталог">
                <span class="navbar-mobile__icon navbar-mobile__icon--catalog" data-link="class{merge:catalogState toggle='navbar-mobile__icon--active'}"></span>
            </span>
    <a class="navbar-mobile__link" href="/lk/basket" aria-label="Корзина">
            <span class="navbar-mobile__icon navbar-mobile__icon--basket" data-link="">
                <span class="navbar-mobile__notify hide" data-link="{:basketCount}class{merge:!basketCount toggle='hide'}">0</span>
            </span>
    </a>
    <a class="navbar-mobile__link" href="/lk/favorites" aria-label="Избранные товары">
        <span class="navbar-mobile__icon navbar-mobile__icon--favorites" data-link=""></span>
    </a>
    <a class="navbar-mobile__link" href="/lk" aria-label="Личный кабинет">
            <span class="navbar-mobile__icon navbar-mobile__icon--profile" data-link="">
                <span class="navbar-mobile__notify hide" data-link="{:(eventsModel &amp;&amp; eventsModel^eventsCount)}class{merge:!(eventsModel &amp;&amp; eventsModel^eventsCount) toggle='hide'}">0</span>
            </span>
    </a>
</div>
