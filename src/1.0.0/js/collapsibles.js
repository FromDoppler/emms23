document.addEventListener('DOMContentLoaded', () => {

    // Collapsible Questions
    const collapsiblesQuestionsListeners = () => {

        const accItem = document.querySelectorAll('.emms__frequentquestions__list__item');
        const accHD = document.querySelectorAll('.emms__frequentquestions__list__item__head');
        const toggleQuestionItem = (itemCta) => {
            const itemClass = itemCta.parentNode.className;
            accItem.forEach(item => {
                item.className = 'emms__frequentquestions__list__item close';
            });
            if (itemClass == 'emms__frequentquestions__list__item close') {
                itemCta.parentNode.className = 'emms__frequentquestions__list__item open';
            }
        }
        accHD.forEach(itemCta => {
            itemCta.addEventListener('click', () => { toggleQuestionItem(itemCta) });
        });
    }

    // Collapsible Legal
    const collapsibleLegalListeners = () => {
        const legalBtn = document.getElementById('legalBtn');
        const toggleItemLegal = () => {
            legalBtn.parentNode.classList.toggle('open');
        }
        if (legalBtn) legalBtn.addEventListener('click', () => { toggleItemLegal() });
    }

    // Collapsible List
    const collapsiblesListListeners = () => {

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
    }


    collapsiblesQuestionsListeners();
    collapsibleLegalListeners();
    collapsiblesListListeners();
});
