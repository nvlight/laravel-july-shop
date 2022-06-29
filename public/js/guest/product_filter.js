let filterShowHideList  = ['.render_type_7', '.render_type_1', '.render_type_5', '.render_type_6'];
let filterCheckboxClass = filterShowHideList[0];
let filterSelectClass   = [filterShowHideList[1], filterShowHideList[3]];

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

////////////////////////////
showHideFilters();
clickFilterCheckbox();
clickFilterSelect();
