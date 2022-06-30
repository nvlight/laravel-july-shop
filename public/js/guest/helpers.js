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
        //console.log('im find him!')
        for(let i=0; i<classesToRemove.length; i++){
            if ( target.classList.contains(classesToRemove[i]) ){
                target.classList.remove(classesToRemove[i]);
            }
        }
    }
}
function findAndDeleteClassesToTargetArray(targetElementSelector, classesToRemove){
    let target = document.querySelectorAll(targetElementSelector);
    if (!target.length) {
        return;
    }
    for(let j=0; j<target.length; j++){
        for(let i=0; i<classesToRemove.length; i++){
            if ( target[j].classList.contains(classesToRemove[i]) ){
                target[j].classList.remove(classesToRemove[i]);
            }
        }
    }
}

/**
 * findAndAddClassesToTargetArray
 * @param targetElementSelector
 * @param classesToAdd
 */
function findAndAddClassesToTargetArray(targetElementSelector, classesToAdd){
    let target = document.querySelectorAll(targetElementSelector);
    if (!target.length) {
        return;
    }
    //conlog(target);
    for(let j=0; j<target.length; j++){
        for(let i=0; i<classesToAdd.length; i++){
            if ( !target[j].classList.contains(classesToAdd[i]) ){
                target[j].classList.add(classesToAdd[i]);
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

/**
 * Обертка над console.log
 * @param value
 */
function conlog(value){
    console.log(value);
}
