console.log('guest - main.js');
let burgerMenuLastNormalLi = ""; // на mouseover - чтобы закрасить последний нормальный li нужным цветом!

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
    let classesArr = ['menu-burger__drop','j-menu-burger-drop','menu-burger__drop--active','j-menu-active.menu-burger__drop--custom']
    let isExists = document.querySelector('.'+classesArr.join('.'));
    if ( !isExists){
        console.log('event: '+showSecondLevelBurgerMenu.name)
        findAndAddClassesToTarget(targetElement, classesToAdd);
    }
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

function footerDropdownMenuHandler() {
    //
    let mns = document.querySelectorAll('.footer__header-wrap.j-dropdown-title');
    if (mns.length){
        for(let i=0; i<mns.length;i++){
            mns[i].addEventListener('click', function (e) {
                mns[i].parentElement.classList.toggle('dropdown-open');
                console.log('click: '+footerDropdownMenuHandler.name);
            });
        }
    }
}

///////////////////////////////////////
/**
 * Helper Functions
 */
function findAndAddClassesToTarget(targetElementSelector, classesToAdd){
    let target = document.querySelector(targetElementSelector);
    let normalizedClasses = normalizeClassListRowString(classesToAdd).split(' ');
    if (target){
        for(let i=0; i<normalizedClasses.length; i++){
            if ( !target.classList.contains(normalizedClasses[i]) ){
                target.classList.add(normalizedClasses[i]);
            }
        }
    }
}
function findAndDeleteClassesToTarget(targetElementSelector, classesToRemove){
    let target = document.querySelector(targetElementSelector);
    if (target){
        for(let i=0; i<classesToRemove.length; i++){
            if ( target.classList.contains(classesToRemove[i]) ){
                target.classList.remove(classesToRemove[i]);
            }
        }
    }
}
function findAndDelete(targetElementSelector) {
    let target = document.querySelector(targetElementSelector);
    if (target){
        target.remove();
    }
}
function normalizeClassListRowString(str) {
    return str.replace(/ {1,}/g," ").trim(); // .split(' ') .join('')
}

///////////////////////////////////////
/**
 * Вызов всех обработчиков действий
 */
burgerMenuOpen();
burgerMenuClose();
burgerMenuCloseWithAnatherAreaClickHandler();
burgerHighLevelMenuMouseOver();
footerDropdownMenuHandler();
