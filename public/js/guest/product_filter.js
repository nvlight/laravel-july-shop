let filterShowHideList = ['.render_type_7', '.render_type_1', '.render_type_5', '.render_type_6'];
let filterCheckboxClass = filterShowHideList[0];
let labelClass = '.filter__item';

/**
 * Для всех фильтров-выпадашек сделать скрытие/показ
 */
function filtersShowHide() {
    const sel = filterShowHideList; // selector for all
    let filter = document.querySelectorAll(sel);
    if (!filter.length){
        return;
    }

    for(let i=0; i<filter.length; i++){
        filter[i].addEventListener('click', function (e) {
            //console.log(e.target);
            //console.log(e.target.parentElement);
            const filterClassName = 'filter__btn-reset';
            if (e.target.tagName === 'BUTTON' && e.target.classList.contains(filterClassName)) {
                // console.log('filter__btn-reset clicked!');
                // delete all selected for closest j-filter-container .selected
                removeSelectedForClosestCheckBox(e.target);
                hideFilterBtnResetForCheckBox(e.target);
                return;
            }

            const target = e.target.parentElement;
            // j-filter-container filter filterblock render_type_7 fdlvr show filter-active
            const filterContainer = target.closest('.j-filter-container');
            if (!filterContainer){
                return;
            }
            const filterContent = filterContainer.querySelector('.filter__content')
            if (!filterContent){
                return;
            }
            filterContainer.classList.toggle('filter-active');
            filterContent.classList.toggle('hide');

            //console.log('filter-toggle clicked!');
        });
    }
}

/**
 * Обработчик нажатия на все фильтры-чекбоксы.
 */
function filterCheckbox() {
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
            const btn_sel = 'filter__btn-reset'
            const btn_reset = closestCont.querySelector('.'+btn_sel);
            if (!btn_reset){
                return
            }
            const showClass = 'show';
            if ( !btn_reset.classList.contains(showClass)){
                btn_reset.classList.add(showClass);
            }

        })
    }
}

/**
 * Если нажали на сброс фильтра с чекбоксами, найти сам чекбокс и удалить все активный чекбокс с селектом.
 * @param target
 */
function removeSelectedForClosestCheckBox(target) {
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
 * Как только был произведен сброс элементов чекбокса - спрятать эту кнопку
 */
function hideFilterBtnResetForCheckBox(target) {
    //console.log(target)
    const showClass = 'show';
    if (target.classList.contains(showClass)){
        target.classList.remove(showClass);
    }
}

////////////////////////////
filtersShowHide();
filterCheckbox();
