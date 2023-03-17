// Collapsible Questions

var accItem = document.getElementsByClassName('emms__frequentquestions__list__item');
var accHD = document.getElementsByClassName('emms__frequentquestions__list__item__head');
for (i = 0; i < accHD.length; i++) {
    accHD[i].addEventListener('click', toggleItem, false);
}
function toggleItem() {
    var itemClass = this.parentNode.className;
    for (i = 0; i < accItem.length; i++) {
        accItem[i].className = 'emms__frequentquestions__list__item close';
    }
    if (itemClass == 'emms__frequentquestions__list__item close') {
        this.parentNode.className = 'emms__frequentquestions__list__item open';
    }
}


// Collapsible Legal

var legalBtn = document.getElementById('legalBtn');
if (legalBtn) legalBtn.addEventListener('click', toggleItemLegal);
function toggleItemLegal() {
    var legalClass = this.parentNode.className;

    if (legalClass == 'emms__form__legal close') {
        this.parentNode.className = 'emms__form__legal open';
    }
    else {
        this.parentNode.className = 'emms__form__legal close';
    }
}
