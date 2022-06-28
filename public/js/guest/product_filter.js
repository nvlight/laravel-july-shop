let filterShowHideList = ['.render_type_7', '.render_type_1', '.render_type_5', '.render_type_6'];

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
            const filterClassName = 'filter__btn-reset';
            const target = e.target.parentElement;
            if (target.tagName === 'BUTTON' && target.classList.contains(filterClassName)) {
                console.log('filter__btn-reset clicked!');
                return;
            }

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

////////////////////////////
filtersShowHide();
