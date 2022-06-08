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
        findAndAddClassToTarget('body', "body--overflow");

        // 2. сразу после body добавляется div - <div class="overlay overlay--menu-burger j-overlay"></div>
        let body = document.querySelector('body');
        if (body){
            findAndDelete("div[class='overlay overlay--menu-burger j-overlay']");

            let div = document.createElement('div');
            div.classList.add('overlay', 'overlay--menu-burger', 'j-overlay');
            body.prepend(div); // appendChild
        }

        // 3. к div.menu-burger добавляется класс .menu-burger--active
        findAndAddClassToTarget('div.menu-burger', "menu-burger--active");

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
        findAndDeleteClassToTarget('body', ['body--overflow']);

        // 2. сразу после body удаляется div - <div class="overlay overlay--menu-burger j-overlay"></div>
        let body = document.querySelector('body');
        if (body){
            findAndDelete("div[class='overlay overlay--menu-burger j-overlay']");
        }

        // 3. к div.menu-burger добавляется класс .menu-burger--active
        findAndDeleteClassToTarget('div.menu-burger', ['menu-burger--active']);
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
function burgerHighLevelMenuMouseOverHandler(e)
{
    // todo - 1,2.2 пока не сделано, но сделано 2.1
    // 1. нужно добавить открытие второго уровня меню
    // 2. раз это ховер, при ховере
    // 2.1 нужно перекрасить цвет на li родителя добавить menu-burger__main-list-item--active
    // 2.2 :before-картинку категории

    // 2.0 сначала убрать красный цвет у всех тего А.
    let classToAdd = 'menu-burger__main-list-item--active';
    let classForStartRemove = classToAdd;
    deleteRedColorForBurgerHighLevelMenu(classForStartRemove);

    // 2.1
    let liParent = e.target.parentElement;
    if ( !liParent.classList.contains(classToAdd)){
        if (liParent.tagName === 'LI'){
            liParent.classList.add(classToAdd);
            burgerMenuLastNormalLi = liParent;
        }else{
            // если этот чел все таки убежал - делаем вот так!
            burgerMenuLastNormalLi.classList.add(classToAdd);
        }
    }
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

///////////////////////////////////////
/**
 * Helper Functions
 */
function findAndAddClassToTarget(targetElementSelector, classToAdd){
    let target = document.querySelector(targetElementSelector);
    if (target && !target.classList.contains(classToAdd)){
        target.classList.add(classToAdd);
    }
}
function findAndDeleteClassToTarget(targetElementSelector, classesToRemove){
    let target = document.querySelector(targetElementSelector);
    if (target){
        for(let i=0; i<classesToRemove.length; i++){
            target.classList.remove(classesToRemove[i]);
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
    return str.replace(/ {1,}/g," ").trim().split(' ');
}




///////////////////////////////////////
/**
 * Вызов всех обработчиков действий
 */
burgerMenuOpen();
burgerMenuClose();
burgerMenuCloseWithAnatherAreaClickHandler();
burgerHighLevelMenuMouseOver();
