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


// Collapsible List

const listItem = document.getElementsByClassName('emms__collapse__list');
const listBtn = document.getElementsByClassName('emms__collapse-btn');
for (i = 0; i < listBtn.length; i++) {
    listBtn[i].addEventListener('click', toggleItem, false);
}
function toggleItem() {
    const itemClass = this.parentNode.className;
    for (i = 0; i < listItem.length; i++) {
        listItem[i].className = 'emms__collapse__list close';
    }
    if (itemClass == 'emms__collapse__list close') {
        this.parentNode.className = 'emms__collapse__list open';
    }
    if (itemClass == 'emms__collapse__list open') {
        this.parentNode.className = 'emms__collapse__list close';
    }
}
