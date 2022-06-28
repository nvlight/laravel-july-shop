let filterShowHideList = ['.filter__title', ];

/**
 * Для всех фильтров-выпадашек сделать скрытие/показ
 */
function filtersShowHide() {
    for(let i=0; i<filterShowHideList.length; i++){
        let filter = document.querySelectorAll(filterShowHideList[i]);

        filter[i].addEventListener('click', function (e) {
            //console.log(e.target);
            const filterClassName = 'filter__btn-reset';
            if (e.target.tagName === 'BUTTON' && e.target.classList.contains(filterClassName)) {
                console.log('filter__btn-reset clicked!');
                return;
            }

            // j-filter-container filter filterblock render_type_7 fdlvr show filter-active
            const filterContainer = e.target.closest('.j-filter-container');
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
