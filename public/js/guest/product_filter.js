let filterShowHideList  = ['.render_type_7', '.render_type_1', '.render_type_5', '.render_type_6'];
let filterCheckboxClass = filterShowHideList[0];
let filterSelectClass   = [filterShowHideList[1], filterShowHideList[3]];

let sliderContentUlCurrentHeight = 0;
let sliderItemHeight = 104; // li + margin = 104

let lastAjaxRequestRs = null;

let sliderImgsArr = [];
let sliderItemCount = 0;
let sliderActiveItemId = 0;

let swHeight = 0;

let sliderTableStepOffset = 500;
let sliderTableCurrentOffset = 0;
let sliderTableWidth = 0;

/**
 * Для всех фильтров-выпадашек сделать скрытие/показ
 * бонусом тут также вызывается функция, сбрасывающая чекбоксы/селекты
 */
function showHideFilters() {
    const sel = filterShowHideList; // selector for all
    // + .j-filter-title
    let selTitle = [];
    for(let i=0; i<filterShowHideList.length; i++){
        let ssel = '.j-filter-container' + filterShowHideList[i] + ' .j-filter-title';
        selTitle.push(ssel);
    }
    //console.log(selTitle.join(', '));

    let filter = document.querySelectorAll(selTitle.join(', '));
    if (!filter.length){
        return;
    }
    //console.log(filter);

    for(let i=0; i<filter.length; i++){
        filter[i].addEventListener('click', function (e) {
            //console.log(e.target);
            //console.log(e.target.parentElement);
            const filterClassName = 'filter__btn-reset';
            if (e.target.tagName === 'BUTTON' && e.target.classList.contains(filterClassName)) {
                // console.log('filter__btn-reset clicked!');
                // delete all selected for closest j-filter-container .selected
                removeSelectedForClosestCheckBoxAndSelects(e.target);
                hideFilterBtnResetForCheckBoxAndSelect(e.target);
                return;
            }


            const target = e.target.parentElement;
            // j-filter-container filter filterblock render_type_7 fdlvr show filter-active
            const filterContainer = target.closest('.j-filter-container');
            if (!filterContainer){
                return;
            }

            // оказалось, что для некоторых фильтров при щелчке внутри срабатывает hide, надо поправить
            if ( !filterContainer.contains(e.target)){
                return;
            }

            const filterContent = filterContainer.querySelector('.filter__content')
            if (!filterContent){
                return;
            }
            filterContainer.classList.toggle('filter-active');
            filterContent.classList.toggle('hide');

            //console.log('e.target: ');
            //console.log(e.target);
            //console.log('filter-toggle clicked!');
        });
    }
}

/**
 * Обработчик нажатия на все фильтры-чекбоксы.
 */
function clickFilterCheckbox() {
    let labelClass = '.filter__item';
    let concatClasses = filterCheckboxClass + ' ' + labelClass;
    //console.log(concatClasses);

    const vv = document.querySelectorAll(concatClasses);
    for (let i=0; i<vv.length; i++) {
        vv[i].addEventListener('click', function(e){
            //console.log('label clicked!');

            // find closest
            let closestCont = e.target.closest('.j-filter-container');
            if (!closestCont){
                return;
            }
            // check selected item for them
            const selClass = 'selected'

            // remove selected if exists
            let isSelected = closestCont.querySelector('.'+selClass);
            if (isSelected){
                isSelected.classList.remove(selClass);
            }
            // add selected class for current item
            // first go to closest label
            let parLabel = e.target;
            //console.log(parLabel.tagName)
            if (parLabel.tagName !== 'LABEL'){
                let fLabel = parLabel.closest('label');
                if (fLabel){
                    parLabel = fLabel;
                }
            }
            if ( !parLabel.classList.contains(selClass)){
                parLabel.classList.add(selClass);
            }

            // show btn_reset for current checkbox container!
            showFilterBtnResetForClosetContainer(closestCont);
        })
    }
}

/**
 * Если нажали на сброс фильтра с чекбоксами/селектам, найти и удалить все активные - класс selected.
 * @param target
 */
function removeSelectedForClosestCheckBoxAndSelects(target) {
    const tg = target.closest('.j-filter-container')
    if (!tg){
        return;
    }
    const tgClass = 'selected';
    const sels = tg.querySelectorAll('.'+tgClass);
    //console.log(sels)
    if (!sels.length){
        return;
    }
    for(let i=0; i<sels.length; i++){
        if ( sels[i].classList.contains(tgClass)){
            sels[i].classList.remove(tgClass);
        }
    }
}

/**
 * При клике на сброс чекбокса/селекта - спрятать эту кнопку!
 */
function hideFilterBtnResetForCheckBoxAndSelect(target) {
    //console.log(target)
    const showClass = 'show';
    if (target.classList.contains(showClass)){
        target.classList.remove(showClass);
    }
}

/**
 * Обработчик нажатия на все фильтры-чекбоксы.
 */
function clickFilterSelect() {
    const checkBoxItemClass = '.filter__item--checkbox';
    let newSelClassArr = [];
    for(let i=0; i<filterSelectClass.length; i++){
        newSelClassArr.push(filterSelectClass[i] + ' ' + checkBoxItemClass);
    }
    let concatClasses = newSelClassArr.join(', ');
    //console.log(concatClasses);

    const vv = document.querySelectorAll(concatClasses);
    if (!vv.length){
        return;
    }
    //console.log(vv);

    for (let i=0; i<vv.length; i++) {
        vv[i].addEventListener('click', function(e){
            //console.log('label clicked!');

            const selClass = 'selected'

            // find closest
            let closestCont = e.target.closest('.j-filter-container');
            if (!closestCont){
                return;
            }

            // toggle selected
            e.target.classList.toggle(selClass);

            // show btn_reset for current checkbox container!
            showFilterBtnResetForClosetContainer(closestCont);
        })
    }
}

/**
 * Показать ближайшую кнопку для сброса элементво текущего контейнера
 * @param container
 */
function showFilterBtnResetForClosetContainer(container){
    const btn_sel = 'filter__btn-reset';
    const btn_reset = container.querySelector('.'+btn_sel);
    if (!btn_reset){
        return;
    }
    const showClass = 'show';
    if ( !btn_reset.classList.contains(showClass)){
        btn_reset.classList.add(showClass);
    }
}

/**
 * Обработчик нажатия на радио-бутоны и селекты в мобильном фильтре
 */
function clickMobileFilterSelectsAndCheckboxes() {
    const sel = '.filter-mobile__content .filterblock .j-list-item.filter__item';
    const selRs = document.querySelectorAll(sel);
    if ( !selRs.length){
        return;
    }

    const addSelectedClass = 'selected';
    // для каждого клика, нужно найти сначала родителя, чтобы понять с каким типом рендера имеем дело!
    for(let i=0; i<selRs.length; i++){

        selRs[i].addEventListener('click', function (e){
            let renderTypeContainer = selRs[i].closest('.filterblock');
            if ( !renderTypeContainer){
                return;
            }
            // узнаем тип
            let renderType = +getRenderTypeByContainer(renderTypeContainer);
            //console.log('renderType: '+renderType);

            // можно было и по другому узнать что за тип перед нами,
            // filter__item--checkbox - это чекбокс,  filter__item--radio - это селект . Классы у label

            // типы 7,6,1 = это норм, 7 - чекбокс, 1,6 - это селекты
            switch (renderType) {
                case 7:
                    // remove all selected classes for anather checkboxes
                    removeAllSelectedForContainer(renderTypeContainer);

                    // add selected class
                    let par = e.target;
                    if (e.target.tagName === 'SPAN'){
                        const lbl = e.target.closest('label');
                        if (!lbl){
                            return;
                        }
                        par = lbl;
                    }
                    if ( !par.classList.contains(addSelectedClass)){
                        par.classList.add(addSelectedClass)
                    }

                    // show apply filter button !
                    showApplyBtnForContainer(e.target);

                    break;
                case 1:
                case 6:
                    let per = e.target;
                    per.classList.toggle(addSelectedClass);
                    showApplyBtnForContainer(e.target);

                    break;
                default:
            }

        });
    }
}

/**
 * Узнать тип рендера контейнера!
 */
function getRenderTypeByContainer(cont) {
    //console.log(cont);
    let classes = cont.classList;
    //console.log(classes);

    let find = null;
    const selPattern = "render_type_";
    let regExp = new RegExp("^"+selPattern+"(\\d+)");
    for(let i=0; i<classes.length; i++){
        let res = classes[i].match(regExp);
        if (res !== null){
            find = res;
            break;
        }
    }
    if (find === null){
        return;
    }

    return find[1];
}

/**
 * Удалить все
 * @param renderTypeContainer
 */
function removeAllSelectedForContainer(renderTypeContainer) {
    const sel = 'selected';
    const rs  = renderTypeContainer.querySelectorAll('.j-list-item'+'.'+sel);
    if (!rs.length){
        return;
    }
    for(let i=0; i<rs.length; i++){
        rs[i].classList.remove(sel);
    }
}

/**
 * Показать кнопку - примернить фильтр для текущего контайнера
 * @param target
 */
function showApplyBtnForContainer(target){
    //conlog(target)
    const applyBtnCont = target.closest('.filter-mobile__content'); //'+' .j-apply-btn');
    //conlog(applyBtn);
    if (!applyBtnCont){
        return
    }
    const applyBtn = applyBtnCont.querySelector('.j-apply-btn')
    if (!applyBtn){
        return;
    }

    const addCl = 'show';
    if (!applyBtn.classList.contains(addCl)){
        applyBtn.classList.add(addCl)
    }
}

/**
 * Спрятать кнопку - примернить фильтр для текущего контайнера
 * @param target
 */
function hideApplyBtnForContainer(target){
    const addCl = 'show';
    if (target.classList.contains(addCl)){
        target.classList.remove(addCl)
    }
}

/**
 * Обработчик щелчка на элемент группы фильтров
 */
function filtersGroupItemClick() {
    const sel = '.j-mobile-filters-list > .filter-mobile__category';
    const rs  = document.querySelectorAll(sel);
    if (!rs.length){
        return;
    }
    for(let i=0; i<rs.length; i++){
        rs[i].addEventListener('click', function (e) {
            //conlog('filter group item clicked!');

            const filterBId = getFilterBlockId(rs[i]);
            //conlog(filterBId);
            if (!filterBId){
                return;
            }
            addHideClassForAllFilterBlocks();
            showMobileWrapperMoved(filterBId);
        });
    }
}

/**
 * Показать блок-фильтра по ИД
 */
function showMobileWrapperMoved(filterBId) {
    const selq = ".filter-mobile.j-wrapper";
    const selAdd = "moved";
    const selqRs = document.querySelector(selq);
    //conlog(showMobileWrapperMoved.name)
    if (!selqRs){
        return;
    }
    if (!selqRs.classList.contains(selAdd)){
         selqRs.classList.add(selAdd);
    }
    // show filter block by id
    //<div class="filter-mobile__main" id="selectedCategoryContainer">
    //  <div class="hide h100p" data-filter-show-id="500">
    const fBlockSel = `#selectedCategoryContainer >div[data-filter-show-id='${filterBId}']`;
    //conlog(fBlockSel);
    const fBlockRs = document.querySelector(fBlockSel);
    if (!fBlockRs){
        return;
    }

    const hideCl = 'hide';
    if (fBlockRs.classList.contains(hideCl)){
        fBlockRs.classList.remove(hideCl);
    }
}

/**
 * Спрятать блок-фильтра, т.е. кнопка назад
 */
function hideMobileWrapperMoved(target) {
    const selq = ".filter-mobile.j-wrapper.moved"
    const selAdd = "moved";
    const selqRs = document.querySelector(selq);
    if (!selqRs){
        return;
    }
    if (selqRs.classList.contains(selAdd)){
        selqRs.classList.remove(selAdd);
    }
    // todo: спрятать по ид именно текущий фильтр-блок
    //const fBlockSel = `#selectedCategoryContainer >div[data-filter-show-id='${filterBId}']`;
    findAndAddClassesToTargetArray('#selectedCategoryContainer>div', ['hide'])

    // спрятать у текущего блока кнопку "применить"
    hideApplyBtnForContainer(target);
}

/**
 * Обработчик нажатия на стрелку назад в блоке-фильтре
 */
function mobileWrapperBackArrowClick() {
    const sel = '.filter-mobile__back';
    const rs  = document.querySelectorAll(sel);
    if (!rs.length){
        return;
    }
    for(let i=0; i<rs.length; i++){
        rs[i].addEventListener('click', function (e) {

            // найти блок, где содержится кнопка применить
            const applyBtnBlock = findBlockWithApplyButton(rs[i]);
            if (!applyBtnBlock){
                return;
            }

            hideMobileWrapperMoved(applyBtnBlock);
        });
    }
}

/**
 * Получить ид блока фильтра, который нужно развернуть
 */
function getFilterBlockId(target) {
    const filterBlockIdSel = ".j-filter-category"
    const filterBlockIdRs  = target.querySelector(filterBlockIdSel);
    if (!filterBlockIdRs){
        return;
    }
    const filterBlockIdRsData = filterBlockIdRs.dataset.filterBlockId;
    //console.log(filterBlockIdRsData)
    return filterBlockIdRsData;
}

/**
 * До открытия нужного блока, сначала нужно скрыть все предыдущие, добавив нужный класс
 */
function addHideClassForAllFilterBlocks() {
    findAndAddClassesToTargetArray('#selectedCategoryContainer>.hide', ['hide'])
}

/**
 * Найти элемент, в котором есть кнопка применить и вернуть его
 * @param target
 */
function findBlockWithApplyButton(target) {
    let result = false;

    const h100pSel = ".h100p";
    const h100pRs  = target.closest(h100pSel)
    if (!h100pRs){
        return;
    }
    const jApplyBtnSel = ".j-apply-btn";
    const jApplyBtnRs  = document.querySelector(jApplyBtnSel);
    if (!jApplyBtnRs){
        return;
    }
    result = jApplyBtnRs

    return result;
}

/**
 * Закрыть блок мобильного фильтра, если нажата одна из кнопок, его закрывающих
 */
function closeMobileFiltersBlockHandler() {
    const sel   = ".filter-mobile__close.j-close";
    const selRs = document.querySelectorAll(sel);
    //conlog(selRs);
    if (!selRs.length){
        return;
    }
    for (let i=0; i<selRs.length; i++){
        selRs[i].addEventListener('click', function (e){
            //conlog('im here '+i)
            const classesForRemove = ['body--overflow','catalogFilterShow'];
            findAndDeleteClassesToTarget('body', classesForRemove);
            findAndDeleteClassesToTarget('body >.filters-mobile.shown', ['shown']);
            findAndAddClassesToTarget('body >.filters-mobile', 'hide');
        });
    }

}

/**
 * Показать блок мобильного фильтра
 */
function showMobileFiltersBlockHandler() {
    const sel = '.sorter-mobile__filter.show-numb';
    const rs  = document.querySelector(sel);
    if (!rs){
        return;
    }

    rs.addEventListener('click', function (e) {
        const classesForAdd = ['body--overflow','catalogFilterShow'];
        findAndAddClassesToTargetArray('body', classesForAdd);
        findAndAddClassesToTargetArray('body >.filters-mobile', ['shown']);
        findAndDeleteClassesToTargetArray('body >.filters-mobile', ['hide']);

        hideMobileWrapperMovedStandalone();
    });
}

/**
 * Спрятать кнопку - примернить фильтр для всех контайнеров
 */
function hideApplyBtnForAllContainers(){
    const sel = ".filter-mobile__content > .j-apply-btn";
    const rs  = document.querySelectorAll(sel);
    if (!rs.length){
        return;
    }

    const remCl = 'show';
    for (let i=0; i<rs.length; i++){
        if (rs[i].classList.contains(remCl)){
            rs[i].classList.remove(remCl)
        }
    }
}

/**
 * Спрятать блок-фильтра и привезти все в состояние по умолчанию
 */
function hideMobileWrapperMovedStandalone() {
    const selq = ".filter-mobile.j-wrapper.moved"
    const selAdd = "moved";
    const selqRs = document.querySelector(selq);
    if (!selqRs){
        return;
    }
    if (selqRs.classList.contains(selAdd)){
        selqRs.classList.remove(selAdd);
    }
    // todo: спрятать по ид именно текущий фильтр-блок, пока прячем у всех - ага!
    //const fBlockSel = `#selectedCategoryContainer >div[data-filter-show-id='${filterBId}']`;
    findAndAddClassesToTargetArray('#selectedCategoryContainer>div', ['hide'])

    hideApplyBtnForAllContainers();
}

/**
 * Нажматие на кнопку свернуть/развернуть описание
 */
function toggleProductDescription() {
    const sel = ".j-description + .collapsible__bottom button.collapsible__toggle";
    const rs  = document.querySelector(sel);
    if (!rs) return;

    rs.addEventListener('click', function (e) {
        if ( !window.matchMedia("(max-width: 1023px)").matches) {
            const detailsContent = rs.closest('.details__content');
            if (!detailsContent) return;
            const jDescription = detailsContent.querySelector('.j-description');
            if (!jDescription) return;
            //conlog(jDescription.style.maxHeight)
            if (jDescription.style.maxHeight == '80px'){
                jDescription.style.maxHeight = "none";
            }else{
                jDescription.style.maxHeight = "80px";
            }

            const text1 = "Развернуть описание";
            const text2 = "Свернуть описание";
            if ( rs.innerHTML.trim() == text1 ){
                rs.innerHTML = text2;
            }else{
                rs.innerHTML = text1;
            }
        }else{
            // тут будет пусто, т.к. я уже разобрался с текстом
        }
    });
}

/**
 * Нажматие на кнопку свернуть/развернуть Дополнительную информацию
 */
function toggleAddInfoSection() {
    const sel = ".j-add-info-section + .collapsible__bottom button.collapsible__toggle";
    const rs  = document.querySelector(sel);
    if (!rs) return;

    rs.addEventListener('click', function (e) {

        const detailsContent = rs.closest('.details__content');
        if (!detailsContent) return;
        const jDescription = detailsContent.querySelector('.j-add-info-section');
        if (!jDescription) return;
        //conlog(jDescription.style.maxHeight)

        if ( !window.matchMedia("(max-width: 1023px)").matches) {
            if (jDescription.style.maxHeight == '224px'){
                jDescription.style.maxHeight = "none";
            }else{
                jDescription.style.maxHeight = "224px";
            }
        }else{
            if (jDescription.style.maxHeight == '76px'){
                jDescription.style.maxHeight = "none";
            }else{
                jDescription.style.maxHeight = "76px";
            }
        }

        const text1 = "Развернуть характеристики";
        const text2 = "Свернуть характеристики";
        if ( rs.innerHTML.trim() == text1 ){
            rs.innerHTML = text2;
        }else{
            rs.innerHTML = text1;
        }

        // collapsible__gradient
        const selGrad   = ".j-add-info-section + .collapsible__bottom .collapsible__gradient";
        const selGradRs = document.querySelector(selGrad);
        if (!selGradRs) return;
        const toggleHideClass = 'hide';
        selGradRs.classList.toggle(toggleHideClass);

    });
}

/**
 * Нарисовали для Большой картинки слайдера через канвас картиночку.
 */
function drawZoomImage(inputImgId) {
    let imgsArr = sliderImgsArr;
    //conlog(typeof imgsArr);
    //conlog(imgsArr);
    if (!imgsArr.length) return;

    let currentImgId = inputImgId;
    let currentImgName = imgsArr.find(item => item.id == currentImgId).name;
    //conlog(currentImgName);
    let img = new Image();
    img.src = currentImgName;

    img.addEventListener("load", function () {
        //conlog('img loaded!');
        let ctx = document.querySelector(".photo-zoom__preview.j-image-canvas")
        if (!ctx) return;
        ctx = ctx.getContext("2d");
        ctx.drawImage(img, 0, 0);

        sliderActiveItemId = inputImgId;
    });
}

/**
 * Большой рисунок слайдера - нажали на стрелку вперед
 */
function mixBlockSliderBtnNextHandler() {
    const sel = '.mix-block__slider-btn--next';
    const rs  = document.querySelector(sel);
    if (!rs){
        return;
    }
    rs.addEventListener('click', function (e) {
        //conlog(mixBlockSliderBtnNextHandler.name + ' clicked!');

        if ( (sliderActiveItemId+1) > sliderItemCount){
            sliderActiveItemId = 1;
            sliderScrollFullTop();
        }else{
            sliderActiveItemId += 1;
            sliderScrollBottom();
        }
        setActiveItemOnImageSlider(sliderActiveItemId);
        drawZoomImage(sliderActiveItemId);

        // if ( (sliderActiveItemId == 1)){
        //     // переместиться наверх!
        //     sliderTransformTranslate(0);
        //     sliderContentUlCurrentHeight = 0;
        // }else{
        //     sliderScrollBottom(sliderItemHeight);
        // }
    });
}

/**
 * Большой рисунок слайдера - нажали не стрелку назад
 */
function mixBlockSliderBtnPrevHandler() {
    const sel = '.mix-block__slider-btn--prev';
    const rs  = document.querySelector(sel);
    if (!rs){
        return;
    }

    rs.addEventListener('click', function (e) {
        //conlog(mixBlockSliderBtnPrevHandler.name + ' clicked!');

        if ( (sliderActiveItemId-1) < 1){
            sliderActiveItemId = sliderItemCount;
            sliderScrollFullBottom();
        }else{
            sliderActiveItemId -= 1;
            sliderScrollTop();
        }
        setActiveItemOnImageSlider(sliderActiveItemId);
        drawZoomImage(sliderActiveItemId);

        // if ( sliderActiveItemId == sliderItemCount){
        //     // переместиться вниз!
        //     sliderTransformTranslate(sliderContentUlHeight);
        //     sliderContentUlCurrentHeight = sliderContentUlHeight;
        // }else{
        //     sliderScrollTop(sliderItemHeight);
        // }
    });
}

/**
 * Инициализировать массив картинок Зум-слайдера статическими рисунками
 */
function imgsinitSliderZoomImgsArrayWithStaticValues() {
    let n = 11;
    for (let i=1; i<=n; i++){
        let imgId = i;
        let imgName = `//images.wbstatic.net/big/new/9410000/9414496-${imgId}.jpg`;
        sliderImgsArr.push( {id:imgId, name:imgName})
    }
    sliderItemCount = n;
    sliderActiveItemId = 1;
    return sliderImgsArr;
}

/**
 * Наведение мышки на картинки слайдера продукта
 */
function slideContentImgMouseOverHandler() {
    // .slide__content.img-plug.j-wba-card-item
    const sel = '.slide__content.img-plug.j-wba-card-item';
    const rs  = document.querySelectorAll(sel);
    if (!rs) return;
    for(let i=0; i<rs.length; i++){
        rs[i].addEventListener('mouseover', function (e) {
            //console.log(e.target);
            const tg = e.target;
            const actLiRs = tg.closest('li.swiper-slide');
            //conlog(actLiRs)
            if (!actLiRs) return;

            // получили индекс, по индексу изменим главное большое фото!
            let imageIndex = +(actLiRs.dataset.imageIndex);
            //conlog('slider li hove - imageIndex: '+imageIndex);

            sliderActiveItemId = imageIndex;
            drawZoomImage(sliderActiveItemId);

            // reset all active slide images
            const activeCl = 'active';
            findAndDeleteClassesToTargetArray('li.slide.active', [activeCl])

            // set new active mini_slide_image !
            if (!actLiRs.classList.contains(activeCl)){
                 actLiRs.classList.add(activeCl);
            }

        });
    }
}

/**
 * Установить активную картинку для Слайдера, т.е. сделать ободок-бордер
 */
function setActiveItemOnImageSlider(zoomId) {
    const activeCl = 'active';
    findAndDeleteClassesToTargetArray('li.slide.active', [activeCl]);

    const rs = document.querySelector(`li[class~='slide'][data-image-index='${zoomId}']`);
    if (!rs) return;

    if (!rs.classList.contains(activeCl)){
        rs.classList.add(activeCl);
    }
}

/**
 * Нажатие на стрелку вверх на слейдера слева большой картинки
 */
function slideContentImgTopArrow() {
    const topBtn = document.querySelector('.swiper-button-prev');
    if (!topBtn) return;
    topBtn.addEventListener('click', function (e) {
        //conlog('click: ' + slideContentImgBottomArrow.name);
        sliderScrollTop();
    });
}

/**
 * Нажатие на стрелку вниз на слейдера слева большой картинки
 */
function slideContentImgBottomArrow() {
    const topBtn = document.querySelector('.swiper-button-next');
    if (!topBtn) return;
    topBtn.addEventListener('click', function (e) {
        //conlog('click: ' + slideContentImgBottomArrow.name);
        sliderScrollBottom();
    });
}

/**
 * Устанавливает нужный translate для элемента UL-слайдера
 * @param needHeight
 */
function sliderTransformTranslate(needHeight) {
    const swSlider = document.querySelector('ul.swiper-wrapper');
    if (!swSlider) return;

    swSlider.style.transform = `translate3d(0px, -${needHeight}px, 0px)`;
    swSlider.style.transitionDuration  = `300ms`;
}

/**
 * Прокручивает слайдер вверх через транслейт
 * @param jumpOffset
 */
function sliderScrollTop(jumpOffset=sliderItemHeight) {
    const swSlider = document.querySelector('ul.swiper-wrapper');
    if (!swSlider) return;
    const height = swSlider.offsetHeight;
    sliderContentUlHeight = height;

    if ( (sliderContentUlCurrentHeight - jumpOffset) > 0 ){
        sliderContentUlCurrentHeight -= jumpOffset;
    }else{
        sliderContentUlCurrentHeight = 0;
    }

    sliderTransformTranslate(sliderContentUlCurrentHeight);
}

/**
 * Прокручивает слайдер вниз транслейт
 * @param jumpOffset
 */
function sliderScrollBottom(jumpOffset=sliderItemHeight)
{
    let swSlider = document.querySelector('ul.swiper-wrapper')
    if (!swSlider) return;
    //let liCount = document.querySelector('ul.swiper-wrapper').getElementsByTagName("li").length;
    if (swSlider) {
        //swHeight = liCount * sliderItemHeight + liCount * 8;
        swHeight = swSlider.offsetHeight;
        //conlog(swHeight);
    }

    let liVmCount = swHeight / sliderItemHeight;
    //conlog(liVmCount);
    let liCntCeil = Math.ceil(liVmCount);
    //conlog(liCntCeil);

    if (sliderItemCount > liCntCeil){
        //sliderContentUlCurrentHeight = sliderItemHeight * sliderItemCount;
        let heightDiff = sliderItemHeight * sliderItemCount - swHeight;
        if ( (sliderContentUlCurrentHeight + jumpOffset) < (heightDiff) ){
            sliderContentUlCurrentHeight += jumpOffset;
        }else{
            sliderContentUlCurrentHeight = heightDiff;
        }
        //conlog(sliderContentUlCurrentHeight);
        sliderTransformTranslate(sliderContentUlCurrentHeight);
    }
}

/**
 * Проскроллить вверх немедленно!
 */
function sliderScrollFullTop()  {
    sliderContentUlCurrentHeight = 0;
    sliderTransformTranslate(sliderContentUlCurrentHeight);
}

/**
 * Проскроллить вниз немедленно!
 */
function sliderScrollFullBottom() {
    let swSlider = document.querySelector('ul.swiper-wrapper')
    if (!swSlider) return;
    swHeight = swSlider.offsetHeight;

    let heightDiff = sliderItemHeight * sliderItemCount - swHeight;
    sliderContentUlCurrentHeight = heightDiff;
    sliderTransformTranslate(sliderContentUlCurrentHeight);
}

/**
 * Установить значение высоты слайдера в глобальную переменную.
 */
function initSliderContentUlHeight() {
    const swSlider = document.querySelector('ul.swiper-wrapper');
    if (!swSlider) return;
    sliderContentUlHeight = swSlider.offsetHeight;
}

// ####################
// теперь идут функции для ширины меньше 1024px

/**
 * Показать закрепленную линию с текущим продуктом и кнопкой добавить в корзину
 */
function productLineFixedTopShow(){
    findAndAddClassesToTarget('.product-line.j-product-card-line.product-line--invisible', 'show')
}

/**
 * Спрятать закрепленную линию с текущим продуктом и кнопкой добавить в корзину
 */
function productLineFixedTopHide(){
    findAndDeleteClassesToTargetArray('.product-line.j-product-card-line.product-line--invisible.show', ['show']);
}

/**
 * При изменении клиентской высоты спрятать/показать верхнюю линию с продуктом и корзиной.
 */
function productLineFixedTopWithScrollHandler(){
    if (window.scrollY >= 960){
        productLineFixedTopShow();
    }else{
        productLineFixedTopHide();
    }
}


/**
 * Перехватить событие скролла и выполнить нужные действия.
 */
function scrollWindowHandler(){
    window.addEventListener('scroll', productLineFixedTopWithScrollHandler);
}

/**
 * Получить ширину элементов слайдера
 * мобильная версия
 * @param swSlider
 * @returns {number}
 */
function getSliderTabletLiMaxWidth(swSlider) {
    let li = swSlider.querySelector('li');
    if (!li) return;
    let liAdditionOffset = 24;
    sliderTableStepOffset = li.offsetWidth + liAdditionOffset; // e.g. 24
    return (sliderItemCount -1) * (li.offsetWidth + liAdditionOffset); // e.g. 24
}

/**
 * Кнопка вперед, слайдера для таблетов - обработчик-исполнитель
 * @constructor
 */
function SliderTabletWidthRightBtnHandle() {
    const swSlider = document.querySelector('ul.swiper-wrapper');
    if (!swSlider) return;
    //conlog('clicked: '+SliderTabletWidthRightBtnHandle.name);

    let liRes = getSliderTabletLiMaxWidth(swSlider);
    if (!liRes) return;
    sliderTableWidth = liRes;

    if ( (sliderTableCurrentOffset + sliderTableStepOffset) > sliderTableWidth){
        sliderTableCurrentOffset = sliderTableWidth;
    }else{
        sliderTableCurrentOffset += sliderTableStepOffset;
        swSlider.style.transform = `translate3d(-${sliderTableCurrentOffset}px, 0px, 0px)`;
    }

    //conlog(sliderTableCurrentOffset);
}

/**
 * Кнопка назад, слайдера для таблетов - обработчик-исполнитель
 * @constructor
 */
function SliderTabletWidthLeftBtnHandle() {
    const swSlider = document.querySelector('ul.swiper-wrapper');
    if (!swSlider) return;
    //conlog('clicked: '+SliderTabletWidthLeftBtnHandle.name);

    let liRes = getSliderTabletLiMaxWidth(swSlider);
    if (!liRes) return;
    sliderTableWidth = liRes;

    if ( (sliderTableCurrentOffset - sliderTableStepOffset) < 0){
        sliderTableCurrentOffset = 0;
    }else{
        sliderTableCurrentOffset -= sliderTableStepOffset;
        swSlider.style.transform = `translate3d(-${sliderTableCurrentOffset}px, 0px, 0px)`
    }

    //conlog(sliderTableCurrentOffset);
}

/**
 * Кнопка назад, слайдера для таблетов - обработчик
 * @constructor
 */
function SliderTabletWidthLeftBtnHandler() {
    const btn = document.querySelector('.mix-block__slider-btnCustom.btn--prev');
    if (!btn) return;

    btn.addEventListener('click', function (e) {
        SliderTabletWidthLeftBtnHandle();
    });
}

/**
 * Кнопка вперед, слайдера для таблетов - обработчик-исполнитель
 * @constructor
 */
function SliderTabletWidthRightBtnHandler(){
    const btn = document.querySelector('.mix-block__slider-btnCustom.btn--next');
    if (!btn) return;

    btn.addEventListener('click', function (e) {
        SliderTabletWidthRightBtnHandle();
    });
}

/**
 * Получить Csrf token из хедера
 * @returns {string}
 */
function getCsrfToken(){
    let token = document.head.querySelector('meta[name="csrf-token"]');
    if (!token) return;
    if ( !token.hasAttribute('content')) return;

    return token.getAttribute('content');
}

/**
 * Получить рисунки продукта аяксом
 */
function getProductImagesAjax(productId) {
    return new Promise(function (resolve, reject) {
        const xhr = new XMLHttpRequest();
        const method = "GET";
        const url = "/product/productImagesAjax/"+productId;
        let params = "";
        xhr.open(method, url);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onload = function () {
            // if (xhr.readyState === 4 && xhr.status === 200) {
            if (this.status >= 200 && this.status < 300) {
                let rs = JSON.parse(xhr.responseText);
                lastAjaxRequestRs = rs;
                //resolve(xhr.response);
                resolve(rs);
            } else {
                reject({
                    status: this.status,
                    statusText: xhr.statusText
                });
            }
        };
        xhr.onerror = function () {
            reject({
                status: this.status,
                statusText: xhr.statusText
            });
        };
        xhr.send(params);
    });
}

/**
 * Получить картинки продукта и выполнить необходимые действия
 */
async function getProductImagesHandler() {
    // <main class="main left-bg" role="main" id="body-layout" data-product-id="{{$product->id}}">
    const productSel = "main[class*='main'][data-product-id]";
    const productRs = document.querySelector(productSel);
    if (!productRs) return;

    const productId = +productRs.dataset.productId;

    const rs = await getProductImagesAjax(productId);
    // заполнить массив sliderImgsArr
    if (!rs.images.length) return;
    let n = rs.images.length
    //conlog(rs.images)
    for(let i=1; i<=n; i++){
        let imgId = i;
        //let imgName = `//images.wbstatic.net/big/new/9410000/9414496-${imgId}.jpg`;
        let imgName = rs.images[i-1].image;
        sliderImgsArr.push( {id:imgId, name:imgName})
    }
    sliderItemCount = n;
    sliderActiveItemId = 1;
    drawZoomImage(sliderActiveItemId);

    //conlog(rs);
    return rs;
}

/**
 * Инициализировать массив картинок Зум-слайдера статическими рисунками
 */
function imgsinitSliderZoomImgsArrayWithStaticValues() {
    let n = 11;
    for (let i=1; i<=n; i++){
        let imgId = i;
        let imgName = `//images.wbstatic.net/big/new/9410000/9414496-${imgId}.jpg`;
        sliderImgsArr.push( {id:imgId, name:imgName})
    }
    sliderItemCount = n;
    sliderActiveItemId = 1;
    return sliderImgsArr;
}

/**
 * Инициализировать массив картинок Зум-слайдера
 */
function imgsinitSlidersliderImgsArrayHandler() {
    //imgsinitSliderZoomImgsArrayWithStaticValues();
    //imgsinitSliderZoomImgsArray();
    //drawZoomImage(1);
    let rs = getProductImagesHandler();
    if (!rs) return;
    //conlog(rs);
    // sliderImgsArr
    //drawZoomImage(1);
}

////////////////////////////////////////////////////////
showHideFilters();
clickFilterCheckbox();
clickFilterSelect();
clickMobileFilterSelectsAndCheckboxes();
filtersGroupItemClick();
mobileWrapperBackArrowClick();
closeMobileFiltersBlockHandler();
showMobileFiltersBlockHandler();
initSliderContentUlHeight();
mixBlockSliderBtnNextHandler();
mixBlockSliderBtnPrevHandler();
slideContentImgMouseOverHandler();
slideContentImgTopArrow();
slideContentImgBottomArrow();
changeSwiperContainerHorizontalVerticalClassOnScreenWidth();
changeSwiperSLiderLiStyleOnScreenWidth();
toggleProductDescription();
toggleAddInfoSection();
setDefaultHeightForAddInfoSection();
scrollWindowHandler();
SliderTabletWidthRightBtnHandler();
SliderTabletWidthLeftBtnHandler();
setSliderTabletButtonsHeight();
imgsinitSlidersliderImgsArrayHandler();
