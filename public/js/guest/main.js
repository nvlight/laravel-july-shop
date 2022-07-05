console.log('guest - main.js');
let burgerMenuLastNormalLi = ""; // на mouseover - чтобы закрасить последний нормальный li нужным цветом!
let currentWindowPageYOffset = 0;
let bigCardIconStatus = false;

/**
 * Бургер-меню - открыть
 */
function burgerMenuOpen(){
    let btnSel = '.j-menu-burger-btn';
    let btn = document.querySelector(btnSel);

    btn.addEventListener('click', function (e) {
        console.log('click: '+burgerMenuOpen.name);
        // 1. к body добавляется класс .body--overflow (<body class="body--overflow">), если такого класса нет
        findAndAddClassesToTarget('body', "body--overflow");

        // 2. сразу после body добавляется div - <div class="overlay overlay--menu-burger j-overlay"></div>
        let body = document.querySelector('body');
        if (body){
            findAndDelete("div[class='overlay overlay--menu-burger j-overlay']");

            let div = document.createElement('div');
            div.classList.add('overlay', 'overlay--menu-burger', 'j-overlay');
            body.prepend(div); // appendChild
        }

        // 3. к div.menu-burger добавляется класс .menu-burger--active
        findAndAddClassesToTarget('div.menu-burger', "menu-burger--active");

        deleteHeaderFixedAnimate()

        showSearchIconRedWhenBurgerMenuIsOpen()
    });
}

/**
 * Бургер-меню - закрыть
 */
function burgerMenuClose(){
    let btnSel = '.menu-burger__close';
    let btn = document.querySelector(btnSel);
    btn.addEventListener('click', function (e) {
        console.log('click: '+burgerMenuClose.name);
        // 1. у body удаляется класс .body--overflow (<body class="body--overflow">), если такого класса нет
        findAndDeleteClassesToTarget('body', ['body--overflow']);

        // 2. сразу после body удаляется div - <div class="overlay overlay--menu-burger j-overlay"></div>
        let body = document.querySelector('body');
        if (body){
            findAndDelete("div[class='overlay overlay--menu-burger j-overlay']");
        }

        // 3. к div.menu-burger добавляется класс .menu-burger--active
        findAndDeleteClassesToTarget('div.menu-burger', ['menu-burger--active']);

        // 4 закрыть 2-й вложенный уровень бургера-меню
        hideSecondLevelBurgerMenu();

        hideSearchIconRedWhenBurgerMenuIsOpen();

        hideThirdLevelMenuOnHoverToMain();

        show2levelMenu(); // восстанавливает внешний вид 2-ого уровня меню, который был измененен нажатием
    });
}

/**
 * Закрывает бургер-меню, если нажать по элементу, который не является частью открытого бургер-меню
 */
function burgerMenuCloseWithAnatherAreaClickHandler(){
    document.addEventListener('click', function(event) {
        let e1 = document.getElementsByClassName('menu-burger');
        let e2 = document.getElementsByClassName('nav-element__burger');

        if (e1.length && e2.length){
            if (   !e1.item(0).contains(event.target)
                && !e2.item(0).contains(event.target) )
            {
                burgerMenuCloseClickHandle();
            }
        }

    });
}

/**
 * Инициировать нажатие закрытия бургера-меню
 */
function burgerMenuCloseClickHandle() {
    let btnSel = '.menu-burger__close';
    let btn = document.querySelector(btnSel);
    if (btn){
        btn.click();
    }
}

/**
 * Делает основную работу родителя по очищению класса от всех элементов и добавлению в нужный элемент
 * @param e
 */
function burgerHighLevelMenuMouseOverHandler(e) {
    // 2. раз это ховер, при ховере
    // 2.0 сначала убрать красный цвет у всех тего А.
    let classToAdd = 'menu-burger__main-list-item--active';
    let classForStartRemove = classToAdd;
    deleteRedColorForBurgerHighLevelMenu(classForStartRemove);

    hideThirdLevelMenuOnHoverToMain();

    // 2.1 нужно перекрасить цвет на li родителя добавить menu-burger__main-list-item--active
    // дополнительное условие, нужно перекрасить, только если ширина >=1024, для иконки
    if (!window.matchMedia("(min-width: 1024px)").matches) {
        return;
    }
    let liParent = e.target.parentElement;
    if ( !liParent.classList.contains(classToAdd)){
        if (liParent.tagName === 'LI'){
            liParent.classList.add(classToAdd);
            burgerMenuLastNormalLi = liParent;
        }else{
            // если этот чел все таки убежал - делаем вот так!
            burgerMenuLastNormalLi.classList.add(classToAdd);
        }

        // todo - 1,2.2 пока не сделано, но сделано 2.1
        // 1. нужно добавить открытие второго уровня меню
        // 4 нужно добавить проверку, а есть ли вообще дочерние элементы для этого элемента меню 1-го уровня.
        let isExistChildrenMenuItems = toggleSecondLevelBurgerMenuByHover();
        if (isExistChildrenMenuItems){
            showSecondLevelBurgerMenu();
        }else{
            hideSecondLevelBurgerMenu();
        }
    }

    // todo - 2.2 :before-картинку категории. Похоже лишне, можно просто добавить на ховер картинку через css
}

/**
 * После наведения на элемент основного бергера-меню, сначала удаляет все цвета, потом добавляет цвет
 * по mouseover элемента (работает примерно как ховер ul>li>a )
 */
function burgerHighLevelMenuMouseOver() {
    // menu-burger__main-list > li
    let liSel = document.querySelectorAll(".menu-burger__main-list > li"); // nodeList
    if (liSel.length){
        for(let i=0; i<liSel.length; i++){
            //liSel[i].removeEventListener('mouseover', burgerHighLevelMenuMouseOver__eventHandler_001);
            liSel[i].addEventListener('mouseover', burgerHighLevelMenuMouseOverHandler);
        }
    }
}

/**
 * Удаляет у всех Li основго бургер меню нужный класс
 * @param classForStartRemove
 */
function deleteRedColorForBurgerHighLevelMenu(classForStartRemove) {
    let liSel = document.querySelectorAll(`.${classForStartRemove}`); // nodeList
    for(let i=0; i<liSel.length; i++){
        if (liSel[i].classList.contains(classForStartRemove)){
            liSel[i].classList.remove(classForStartRemove);
            //console.log('deleted!');
        }
    }
}

/**
 * Показывает второй уровень вложенности бергера-меню
 */
function showSecondLevelBurgerMenu() {
    let targetElement = ".menu-burger__drop.j-menu-burger-drop";
    let classesToAdd  = "menu-burger__drop--active j-menu-active menu-burger__drop--custom";

    // добавлю проверку на то, если есть элемент со всеми этими классами, то ничего делать не будем
    let classesArr = ['menu-burger__drop','j-menu-burger-drop','menu-burger__drop--active','j-menu-active','menu-burger__drop--custom']
    let isExists = document.querySelector('.'+classesArr.join('.'));
    if ( !isExists){
        console.log('event: '+showSecondLevelBurgerMenu.name)
        findAndAddClassesToTarget(targetElement, classesToAdd);
    }

    show2levelMenu();
}

/**
 * Скрывает второй уровень вложенности бергера-меню
 */
function hideSecondLevelBurgerMenu() {
    let targetElement = ".menu-burger__drop.j-menu-burger-drop";
    let classesToRemove  = "menu-burger__drop--active j-menu-active menu-burger__drop--custom";
    let normalizedClassesToRemove = normalizeClassListRowString(classesToRemove).split(' ');
    findAndDeleteClassesToTarget(targetElement, normalizedClassesToRemove);
}

/**
 * Показывает правильный блок 2-я уровня меню при ховере на элементы 1-о уровня меню
 */
function showRightBlockOnSecondLevelBurgerMenu() {
    if (!burgerMenuLastNormalLi) {
        //console.log('burgerMenuLastNormalLi exists')
        return null;
    }
    let sel = 'menu-burger__main-list-link--';
    let a = burgerMenuLastNormalLi.querySelector("a[class*=" + `${sel}` + "]");
    if (!a) {
        //console.log('burgerMenuLastNormalLi query selector')
        return null;
    }

    let cl = a.getAttribute('class');
    let clArr = normalizeClassListRowString(cl).split(' ');

    let find = null;
    let regExp = new RegExp("^"+sel+"(\\d+)");
    for(let i=0; i<clArr.length; i++){
        let res = clArr[i].match(regExp);
        if (res !== null){
            find = res;
            break;
        }
    }
    if (find===null){
        console.log('regexp is doesn work')
    }
    return find;
    //console.log('find need class: '+find[0]+' id='+find[1]);
}

/**
 * Меняет активный элемент 2-о уровня бургера-меню
 */
function toggleSecondLevelBurgerMenuByHover() {
    let rs = showRightBlockOnSecondLevelBurgerMenu()
    if (!rs) return;
    // rs[1] ---> data-menu-id="576" e.g.
    let dm = document.querySelector('.j-menu-drop-item-'+rs[1]);
    //console.log('dataMenuId: '+rs[1] + '.j-menu-drop-item: '+dm)
    if (dm){
        // 1 - сначала убрать текущий
        let activeClass = '.menu-burger__drop-list-item--active';
        let sdArr = document.querySelectorAll(activeClass);
        if (sdArr.length){
            for(let i=0; i<sdArr.length; i++){
                sdArr[i].classList.remove(activeClass.substring(1));
            }
        }
        // 2 - потом добавить на текущий
        if ( !dm.classList.contains(activeClass.substring(1))){
            dm.classList.add(activeClass.substring(1));
        }
        return true;
    }
    return false;
}

/**
 * Просмотр и скрытие элементов выпадающего меню футера по клику
 */
function footerDropdownMenuHandler() {
    //
    let mns = document.querySelectorAll('.footer__header-wrap.j-dropdown-title');
    if (mns.length){
        for(let i=0; i<mns.length;i++){
            mns[i].addEventListener('click', function (e) {
                mns[i].parentElement.classList.toggle('dropdown-open');
                //console.log('click: '+footerDropdownMenuHandler.name);
            });
        }
    }
}

/**
 * Показ и скрытие мобильное меню при скролле
 */
function burgerMenuMobileScrollAnimateHandle() {
    let log = false;
    let scrolledBot = function (){
        let tmp = window.pageYOffset;
        if (tmp > currentWindowPageYOffset){
            currentWindowPageYOffset = tmp;
            return true;
        }
        currentWindowPageYOffset = tmp;
        return false;
    }

    if (scrolledBot()){
        if (log){
            console.log('scrolled bot: '+window.pageYOffset)
        }
        if (window.pageYOffset > 72){
            findAndAddClassesToTarget('.header.j-header', 'header--fixed')
            deleteHeaderFixedAnimate()
        }
    }else{
        if (log){
            console.log('scrolled top: '+window.pageYOffset)
        }
        if (window.pageYOffset > 72){
            addHeaderFixedAnimate()
        }else{
            findAndDeleteClassesToTarget('.header.j-header', ['header--fixed', 'header--fixed-animate']);
        }
    }
}

/**
 * Обработчик события скролла
 */
function burgerMenuMobileScrollAnimateHandler() {
    window.addEventListener('scroll', burgerMenuMobileScrollAnimateHandle);
}

/**
 * Добавить к бургеру-меню фиксацию
 */
function addHeaderFixedAnimate() {
    findAndAddClassesToTarget('.header.j-header', 'header--fixed-animate')
}

/**
 * Удалить из бургера-меню фиксацию
 */
function deleteHeaderFixedAnimate() {
    findAndDeleteClassesToTarget('.header.j-header', ['header--fixed-animate']);
}

/**
 * Обработка щелчка по элемету бургера-меню 2-го уровня сложности, если у него есть элементы-потомки, то блок-баннер
 * пропадает и появляются его элеметы-меню потомки
 */
function secondLevelBurgerMenuItemClickHandler() {
    /**
     * <li class="menu-burger__item">
     *   <span class="menu-burger__next j-menu-drop-open">Белье</span>
     * </li>
     */
    const sel = document.querySelectorAll("li[class='menu-burger__item']>span[class~='j-menu-drop-open']");
    if (sel.length){
        for(let i=0; i<sel.length; i++){
            sel[i].addEventListener('click', function (e) {
                const targetId = sel[i].dataset.thirdButtonOpenId; // data-third-button-open-id="189"
                console.log('click: '+secondLevelBurgerMenuItemClickHandler.name + ' ' + targetId); //console.log(targetId);

                const hideClass='hide';
                const targetClass = ".third_level_menu---"+targetId;
                const listForShow = document.querySelector(targetClass);
                const bannerForHide = document.querySelector('.menu-burger__drop-list-item--active .menu-burger__second');
                const menuBurgerThird = document.querySelector('.menu-burger__drop-list-item--active .menu-burger__third'); // menu-burger__third

                if ( !(listForShow && bannerForHide && menuBurgerThird)) {
                    return;
                }

                // #1 при обычном разрешении >= 1024 пикселя нужно отобразить вместо баннера 3-й уровень меню
                if (window.matchMedia("(min-width: 1024px)").matches) {
                    // спрятать все меню 3-го уровня, чтобы не показывались лишние
                    hideAll3rdLevelSubmenu();
                    // спрятать баннер блок-баннер
                    if (!bannerForHide.classList.contains(hideClass)){
                        bannerForHide.classList.add(hideClass);
                    }
                    menuBurgerThird.classList.remove(hideClass); // показать враппер для менюшки
                    listForShow.classList.remove(hideClass);     // показать нажатую менюшку
                    return;
                }

                // сам меню 2-го уровня тоже нужно скрыть!
                // dd = document.querySelectorAll('.menu-burger__drop-list-item--active .menu-burger__first.j-menu-inner-column')
                //findAndAddClassesToTarget('.menu-burger__drop-list-item--active .menu-burger__first.j-menu-inner-column', 'hide');

                // #2 при мобильном разрешении нужно 3-й уровень отобразить поверх 2-ого уровня
                if (window.matchMedia("(max-width: 1023px)").matches) {
                    //console.log('max-width: 1023px')
                    menuBurgerThird.classList.remove(hideClass);
                    listForShow.classList.remove(hideClass);

                    hide2levelActiveMenu();
                }

            });
        }
    }
}

/**
 * Прячет все меню 3-го уровня для меню 2-го уровня, добавляя класс hide
 */
function hideAll3rdLevelSubmenu() {
    let liSel = document.querySelectorAll(".menu-burger__third div[class*='third_level_menu---']"); // nodeList
    //console.log(liSel.length)
    const hideClass = 'hide';
    for(let i=0; i<liSel.length; i++){
        if (!liSel[i].classList.contains(hideClass)){
            liSel[i].classList.add(hideClass);
        }
    }
}

/**
 * Удаляет классы, чтобы в меню-бергере 2-го уровня показывались менюшки только текущего нажатого элемента
 */
function deleteClassForMobileBurgerMenuSecondLevel() {
    const tgClass = "menu-burger__drop-list-item--active";
    const findDoubles = document.querySelectorAll('.'+'menu-burger__drop-list-item--active');
    if (findDoubles.length){
        for(let i=0; i<findDoubles.length; i++){
            if (findDoubles[i].classList.contains(tgClass)){
                findDoubles[i].classList.remove(tgClass);
            }
        }
    }
}

/**
 * Остановить переход по ссылке при щелчке на 1-й уровень меню и показать 2-й уровень меню (Мобильное разрешение)
 *
 */
function stopTagAPropogationForMenuBurgerMobile1stLevelAndShow2LevelMenu() {
    const sel = 'menu-burger__main-list-item--subcategory';
    const res = document.querySelectorAll(`li[class*=${sel}]>a`);
    if (!res.length) return;

    for(let i=0; i<res.length; i++){
        //console.log('im here '+i)
        res[i].addEventListener('click', function (e) {

            if (window.matchMedia("(min-width: 1024px)").matches) {
               return;
            }

            e.preventDefault();
            Show2LevelMenuDesktop(res[i])
        });
    }
}

/**
 * По щелчку показать 2-й уровень меню (Десктоп разрешение)
 * @param tagAasArray
 * @constructor
 */
function Show2LevelMenuDesktop(tagAasArray) {
    // возникли две проблемы и 1 задача
    // 1 нужно с каждым разом подчищать за собой все классы menu-burger__drop-list-item--active, которые я добавил
    deleteClassForMobileBurgerMenuSecondLevel();

    const classes = tagAasArray.classList;
    let find = null;
    let regExp = new RegExp('menu-burger__main-list-link--'+"(\\d+)");
    for(let i=0; i<classes.length; i++){
        let rs = classes[i].match(regExp);
        if (rs !== null){
            find = rs;
            break;
        }
    }
    if (!find) {
        return
    }

    //console.log('we find: '+find[1]);
    const findId = find[1];

    showSecondLevelBurgerMenu();

    // теперь нужно найти класс с j-menu-drop-item-{нужный мне ид в findId} и добавить ему класс
    // menu-burger__drop-list-item--active
    findAndAddClassesToTarget('.j-menu-drop-item-'+findId, 'menu-burger__drop-list-item--active');

    // 2 также при показе нужны скрыть баннер - :smirk
    // 3 ну и показать стрелку тоже нужно
}

/**
 * Закрывает 2-й уровень мобильного бургера-меню по щелчку на кнопку назад
 */
function hideMobileSecondLevelBurgerMenuByBackClick() {
    const bSel = document.querySelectorAll('.menu-burger__back.menu-burger__back__hide2rd');
    if (bSel.length){
        for(let i=0; i<bSel.length; i++){
            bSel[i].addEventListener('click', function (e){
                hideSecondLevelBurgerMenu();
            })
        }
    }
}

/**
 * Показать иконку поиска (закрепленный снизу при мобильном виде )красивым красным цветом, когда открыт бурер-меню
 */
function showSearchIconRedWhenBurgerMenuIsOpen() {
    const sel = ".navbar-mobile__icon.navbar-mobile__icon--catalog";
    const cl  = "navbar-mobile__icon--active"
    findAndAddClassesToTarget(sel, cl)
}

/**
 * Спрятать иконку поиска (закрепленный снизу при мобильном виде ) когда закрыли бурер-меню
 */
function hideSearchIconRedWhenBurgerMenuIsOpen() {
    const sel = ".navbar-mobile__icon.navbar-mobile__icon--catalog.navbar-mobile__icon--active";
    const cl  = ["navbar-mobile__icon--active"];
    findAndDeleteClassesToTarget(sel, cl)
}

/**
 * Показывает баннер и скрывает 3-й уровень бургера меню, нужно для ховера на 1-й уровень меню
 * для разрешения > 1024 px
 */
function hideThirdLevelMenuOnHoverToMain() {
    const hideClass = 'hide';
    const bannerForHide = document.querySelectorAll('.menu-burger__second');
    const menuBurgerThird = document.querySelectorAll('.menu-burger__third'); // menu-burger__third

    hideAll3rdLevelSubmenu();

    if (menuBurgerThird.length){
        for(let i=0;i<menuBurgerThird.length;i++){
            if ( !menuBurgerThird[i].classList.contains(hideClass))
                menuBurgerThird[i].classList.add(hideClass);
        }
    }

    if (bannerForHide.length){
        for(let i=0;i<bannerForHide.length;i++){
            bannerForHide[i].classList.remove(hideClass);
        }
    }
}

/**
 * Скрыть 2-й уровень меню, например это актуально при разрешении
 */
function hide2levelActiveMenu() {
    findAndAddClassesToTarget('.menu-burger__drop-list-item--active .menu-burger__first','hide')
}

/**
 * Показывает 2-й уровень меню, который был уже скрыт при мобильном разрешении
 */
function show2levelMenu() {
    const q = document.querySelectorAll(".menu-burger__first.hide")
    const hideClass ='hide';
    if (q.length){
        for(let i=0;i<q.length; i++){
            q[i].classList.remove(hideClass)
        }
    }
}

/**
 * Закрывает 2-й уровень мобильного бургера-меню по щелчку на кнопку назад
 */
function hideMobile3rdLevelBurgerMenuAndShow2rdByBackClick() {
    const bSel = document.querySelectorAll('.menu-burger__back.menu-burger__back__hide3rd_back_to2rd');
    if (bSel.length){
        for(let i=0; i<bSel.length; i++){
            bSel[i].addEventListener('click', function (e){
                hideAll3rdLevelSubmenu();
                show2levelMenu();
                findAndAddClassesToTarget('.menu-burger__drop-list-item--active .menu-burger__third', 'hide');
            })
        }
    }
}

/**
 * Add hide class for .sidemenu-overflow > div
 */
function hideSlidemenuOverflow() {
    const s = document.querySelector('.sidemenu-overflow > div');
    if (!s){
        return;
    }
    const tgClass = 'hide'
    if ( !s.classList.contains(tgClass)){
        s.classList.add(tgClass)
    }
}

/**
 * Remove hide class for .sidemenu-overflow > div
 */
function showSlidemenuOverflow() {
    const s = document.querySelector('.sidemenu-overflow > div');
    if (!s){
        return;
    }
    const tgClass = 'hide'
    if ( s.classList.contains(tgClass)){
        s.classList.remove(tgClass)
    }
}

/**
 * В зависимости от ширины окна, спрятать или показать lidemenuOverflow
 */
function showHideSlidemenuOverflowHandler() {
    const width = document.documentElement.clientWidth;
    if (width >= 1024){
        showSlidemenuOverflow();
    }else{
        hideSlidemenuOverflow()
    }
}

/**
 * Изменяет инлайн-стили для li свипера.
 */
function changeSwiperSLiderLiStyleOnScreenWidth() {
    const sel = 'li.swiper-slide';
    const rs  = document.querySelectorAll(sel);
    if (!rs.length) return;

    if ( !window.matchMedia("(max-width: 1023px)").matches) {
        for(let i=0; i<rs.length; i++) {
            // height: 96px;
            // margin-bottom: 8px;
            rs[i].style.marginRight = "";
            rs[i].style.height = `96px`;
            rs[i].style.marginBottom = ` 8px`;
        }

        return;
    }

    for(let i=0; i<rs.length; i++) {
        // 	margin-right: 24px;
        rs[i].style.marginRight = `24px`;
        rs[i].style.height = "";
        rs[i].style.marginBottom = "";
    }
}

/**
 * Установление высоты по умолчанию для Дополнительной информации продукта.
 */
function setDefaultHeightForAddInfoSection() {
    const sel = ".j-add-info-section + .collapsible__bottom button.collapsible__toggle";
    const rs  = document.querySelector(sel);
    if (!rs) return;

    const detailsContent = rs.closest('.details__content');
    if (!detailsContent) return;
    const jDescription = detailsContent.querySelector('.j-add-info-section');
    if (!jDescription) return;

    if ( !window.matchMedia("(max-width: 1023px)").matches) {
        jDescription.style.maxHeight = "224px";
        // тут еще можно проверить, если оно развернуто, то нужно сбросить...
    }else{
        jDescription.style.maxHeight = "76px";
        // тут еще можно проверить, если оно развернуто, то нужно сбросить...
    }
}

/**
 * Перехватить изменение размера окна и выполнить нужные действия
 */
function resizeWindowHandler() {

    function displayWindowSize(){
        const w = document.documentElement.clientWidth;
        const h = document.documentElement.clientHeight;

        // Display result inside a div element
        console.log("Width: " + w + ", " + "Height: " + h);
    }

    // Attaching the event listener function to window's resize event
    window.addEventListener("resize", displayWindowSize);
    window.addEventListener('resize', showHideSlidemenuOverflowHandler);
    window.addEventListener('resize', setRightBigCardIconStatus);
    window.addEventListener('resize', changeSwiperContainerHorizontalVerticalClassOnScreenWidth);
    window.addEventListener('resize', changeSwiperSLiderLiStyleOnScreenWidth);
    window.addEventListener('resize', setDefaultHeightForAddInfoSection);
}

/**
 * Скрывает или показывает выпадающее меню для фильтра товаров
 */
function selectFilterMobileToggle(){
    const sel = '.select-filter';
    const f = document.querySelector(sel);
    if (!f){
        return;
    }
    const tgClass = 'open'
    f.addEventListener('click', function (e) {
        f.classList.toggle(tgClass);
    });
}

/**
 * Обработчик нажатия на кнопку показа карточек товаров (сделать большими или маленькими)
 * мобильное разрешение
 */
function catalogBigCardEnabledClickHandler() {
    catalogBigCardEnabledClickHandle();
}

/**
 * Обработчик (исполнитель) нажатия на кнопку показа карточек товаров (сделать большими или маленькими)
 * мобильное разрешение
 */
function catalogBigCardEnabledClickHandle(){
    const sel = ".sorter-mobile__card-refresh";
    const f = document.querySelector(sel);
    if (!f){
        return;
    }
    f.addEventListener('click', function (e) {
        const tgCardsSel = document.querySelector('.catalog-page__main')
        if (!tgCardsSel){
            return;
        }
        const addClass = 'catalog-big-card';
        tgCardsSel.classList.toggle(addClass);
        const tgClass = 'big';
        e.target.classList.toggle(tgClass);

        if (bigCardIconStatus){
            bigCardIconStatus = false;
        }else{
            bigCardIconStatus = true;
        }
        setRightBigCardIconStatus();
    });
}

/**
 * Является ли показ карточки товаров большими для мобильного разрешения
 */
function isShowBigCardEnabledInMobile() {
    return bigCardIconStatus;
}

/**
 * Выполняет показ больших карточек товаров, из состояния показа маленьких
 * мобильное разрешение
 */
function showCatalogWithBigImageInMobile() {
    const sel = ".sorter-mobile__card-refresh";
    const addClass = 'catalog-big-card';
    const tgCardsSel = document.querySelector('.catalog-page__main')
    const f = document.querySelector(sel);
    const tgClass = 'big';

    if (!f || !tgCardsSel){
        return;
    }

    if (!tgCardsSel.classList.contains(addClass)){
        tgCardsSel.classList.add(addClass);
    }
    if (!f.classList.contains(tgClass)){
        f.classList.add(tgClass);
    }
}

/**
 * Скрывает показ больших карточек товаров, возвращая его в показ маленьких
 * мобильное разрешение
 */
function hideCatalogWithBigImageInMobile() {
    const sel = ".sorter-mobile__card-refresh";
    const addClass = 'catalog-big-card';
    const tgCardsSel = document.querySelector('.catalog-page__main')
    const f = document.querySelector(sel);
    const tgClass = 'big';

    if (!f || !tgCardsSel){
        return;
    }

    if (tgCardsSel.classList.contains(addClass)){
        tgCardsSel.classList.remove(addClass);
    }
    if (f.classList.contains(tgClass)){
        f.classList.remove(tgClass);
    }
}

/**
 * Является ли показ карточки товаров большими для десктопного разрешения
 */
function isShowBigCardEnabledInDesktop() {
    return bigCardIconStatus;
}

/**
 * Выполняет показ больших карточек товаров, из состояния показа маленьких
 * десктопное разрешение
 */
function showCatalogWithBigImageInDesktop() {
    const addClass = 'active';
    const smallIconSel = '.card-sizes-link.card-sizes-link--c516x688'; // .active
    const bigIconSel   = '.card-sizes-link.card-sizes-link--big';
    findAndDeleteClassesToTarget(smallIconSel, [addClass])
    findAndAddClassesToTarget(bigIconSel, addClass);
}

/**
 * Выполняет скрытие больших карточек товаров
 * десктопное разрешение
 */
function hideCatalogWithBigImageInDesktop() {
    const addClass = 'active';
    const smallIconSel = '.card-sizes-link.card-sizes-link--c516x688'; // .active
    const bigIconSel   = '.card-sizes-link.card-sizes-link--big';
    findAndDeleteClassesToTarget(bigIconSel, [addClass])
    findAndAddClassesToTarget(smallIconSel, addClass);
}

/**
 * Устанавливает активную иконку показа карточки товара исходя из состояния на мобильном разрешении
 * для десктопного и мобильного разрешения
 */
function setRightBigCardIconStatus() {
    if (bigCardIconStatus){
        showCatalogWithBigImageInMobile();
        showCatalogWithBigImageInDesktop();
    }else{
        hideCatalogWithBigImageInMobile();
        hideCatalogWithBigImageInDesktop();
    }
}

/**
 * Обработчик нажатия на кнопку - сделать карточки товаров большими
 */
function clickDoBigCardInDesktop() {
    const sel = '.card-sizes-link.card-sizes-link--big'
    let find = document.querySelector(sel);
    if (!find){
        return;
    }
    find.addEventListener('click', function (e) {
        e.preventDefault();
        bigCardIconStatus = true;
        setRightBigCardIconStatus();
    });
}

/**
 * Обработчик нажатия на кнопку - сделать карточки товаров маленькими
 */
function clickDoSmallCardInDesktop() {
    const sel = '.card-sizes-link.card-sizes-link--c516x688';
    let find = document.querySelector(sel);
    if (!find){
        return;
    }
    find.addEventListener('click', function (e) {
        e.preventDefault();
        bigCardIconStatus = false;
        setRightBigCardIconStatus();
    });
}

/**
 * При наведении на карточку товара добавляет класс hover - обработчик-исполнитель
 */
function productCardMouseOverHandle(e) {
    //console.log('hovered');
    //console.log('e: '+e);
    const classToAdd = 'hover';

    if (!window.matchMedia("(min-width: 1024px)").matches) {
        return;
    }

    // first, we need to clear all active classes
    removeProductCardsHoverClass();

    // second, need to add active class to closest .product-card
    const tg = e.target;
    //console.log('e.target: '+e.target);
    //console.log(e.target);

    const sel = '.product-card';
    const card = tg.closest(sel);
    if (!card){
        return;
    }
    if ( !card.classList.contains(classToAdd)){
        card.classList.add(classToAdd);
    }
}

/**
 * При наведении на карточку товара добавляет класс hover - обработчик
 */
function productCardMouseOverHandler() {
    let sel = document.querySelectorAll(".product-card");
    if (!sel.length){
        return;
    }
    for(let i=0; i<sel.length; i++){
        sel[i].addEventListener('mouseover', productCardMouseOverHandle);
    }
}

/**
 * Очистить все за ховеренные продукты
 */
function removeProductCardsHoverClass() {
    const tgClass = 'hover';
    const sel = document.querySelectorAll(".product-card.hover");
    if (!sel.length){
        return;
    }
    for(let i=0; i<sel.length; i++){
        if (sel[i].classList.contains(tgClass)){
            sel[i].classList.remove(tgClass);
        }
    }
}

/**
 * Если под мышкой не находится карточка товара и ширина >1024 очищается все заховеренные продукты - обработчик-исполнитель
 * @param e
 */
function removeProductCardsHoveredOnMouseHoverAnatherPlaceHandle(e){

    if (!window.matchMedia("(min-width: 1024px)").matches) {
        return;
    }

    const tg = e.target;
    const sel = '.product-card';
    const card = tg.closest(sel);
    if (!card){
        removeProductCardsHoverClass();
    }
}

/**
 * Если под мышкой не находится карточка товара и ширина >1024 очищается все заховеренные продукты - обработчик
 */
function removeProductCardsHoveredOnMouseHoverAnatherPlaceHandler() {
    document.addEventListener('mouseover', removeProductCardsHoveredOnMouseHoverAnatherPlaceHandle);
}

/**
 * .swiper-container >
 * If screen.width >= 1024 add class .swiper-container-vertical
 * else add class .swiper-container-horizontal
 */
function changeSwiperContainerHorizontalVerticalClassOnScreenWidth() {
    const rs =  document.querySelector('.swiper-container');
    //conlog(rs);
    const addHorizontalClass = 'swiper-container-horizontal';
    const addVerticalClass = 'swiper-container-vertical';
    if (!rs) return;
    if (window.matchMedia("(max-width: 1023px)").matches) {
        rs.classList.remove(addVerticalClass);
        if (!rs.classList.contains(addHorizontalClass)){
            rs.classList.add(addHorizontalClass);
        }
        return;
    }

    rs.classList.remove(addHorizontalClass);
    if (!rs.classList.contains(addVerticalClass)){
        rs.classList.add(addVerticalClass);
    }
}

//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
/**
 * Вызов всех обработчиков действий
 */
burgerMenuOpen();
burgerMenuClose();
burgerMenuCloseWithAnatherAreaClickHandler();
burgerHighLevelMenuMouseOver();
footerDropdownMenuHandler();
burgerMenuMobileScrollAnimateHandler();
secondLevelBurgerMenuItemClickHandler();
stopTagAPropogationForMenuBurgerMobile1stLevelAndShow2LevelMenu();
hideMobileSecondLevelBurgerMenuByBackClick();
hideMobile3rdLevelBurgerMenuAndShow2rdByBackClick();
resizeWindowHandler();
showHideSlidemenuOverflowHandler();
selectFilterMobileToggle();
catalogBigCardEnabledClickHandler();
clickDoBigCardInDesktop();
clickDoSmallCardInDesktop();
productCardMouseOverHandler();
removeProductCardsHoveredOnMouseHoverAnatherPlaceHandler();
