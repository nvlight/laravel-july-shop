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
function findAndDelete(targetElementSelector) {
    let target = document.querySelector(targetElementSelector);
    if (target){
        target.remove();
    }
}
function normalizeClassListRowString(str) {
    return str.replace(/ {1,}/g," ").trim(); // .split(' ') .join('')
}
