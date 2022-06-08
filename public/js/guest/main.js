console.log('guest - main.js');

/**
 * Обработчик нажатия на бургер-меню
 */
function burgerMenuClick(){
    let btnSel = '.j-menu-burger-btn';
    let btn = document.querySelector(btnSel);

    btn.addEventListener('click', function (e) {
        console.log('click: '+burgerMenuClick.name);
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
burgerMenuClick();
burgerMenuClose();
