// Header Animation

let scrollpos = window.scrollY;
const header = document.querySelector('.emms__header');
const header_height = header.offsetHeight;
const add_class_on_scroll = () => header.classList.add('emms__header-scroll');
const remove_class_on_scroll = () => header.classList.remove('emms__header-scroll');

window.addEventListener('scroll', function () {
    scrollpos = window.scrollY;
    if (scrollpos >= 100) {
        add_class_on_scroll();
    } else {
        remove_class_on_scroll();
    }
});


// Animation viewport scroll

(function () {
    var elements;
    var elements2;
    var windowHeight;

    function init() {
        elements = document.querySelectorAll('.emms__fade-in');
        elements2 = document.querySelectorAll('.emms__fade-top');
        windowHeight = window.innerHeight;
    }

    function checkPosition() {
        for (var i = 0; i < elements.length; i++) {
            var element = elements[i];
            var positionFromTop = elements[i].getBoundingClientRect().top;

            if (positionFromTop - windowHeight <= 0) {
                element.classList.add('emms__fade-in-animation');
                element.classList.remove('emms__fade-in');

            }
            else {
                element.classList.remove('emms__fade-in-animation');
                element.classList.add('emms__fade-in');
            }
        }
    }

    function checkPosition2() {
        for (var i = 0; i < elements2.length; i++) {
            var element2 = elements2[i];
            var positionFromTop = elements2[i].getBoundingClientRect().top;

            if (positionFromTop - windowHeight <= 0) {
                element2.classList.add('emms__fade-top-animation');
                element2.classList.remove('emms__fade-top');
            }
            else {
                element2.classList.remove('emms__fade-top-animation');
                element2.classList.add('emms__fade-top');
            }
        }
    }

    window.addEventListener('scroll', checkPosition, checkPosition2);
    window.addEventListener('resize', init);

    init();
    checkPosition();
    checkPosition2();
})();


// Flickity Carousel

if (flkty != undefined) {
    var elem = document.querySelector('.main-carousel');
    var flkty = new Flickity(elem, {
        // options
        cellAlign: 'left',
        contain: true,
        prevNextButtons: false,
        fade: true,
        wrapAround: true
    });
}


// Mobile nav

const heading = document.getElementById('nav-mb');
const btn = document.getElementById('btn-burger');
if (btn != undefined && btn != null) {
    btn.addEventListener('click', (e) => {
        heading.classList.toggle('emms__header__nav--hidden');
        btn.classList.toggle('emms__header__nav--mb--active');
    });
}



// Share social network

const shareList = document.getElementById('list-share');
const share = document.getElementById('btn-share');
if (share != undefined && share != null) {
    share.addEventListener('click', (e) => {
        shareList.classList.toggle('emms__share__list--active');
        share.classList.toggle('emms__share--active');
    });
}



// Collapsible

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



// Number counter animation

const boxNumber = document.querySelector('#boxNumber');

const observerBoxNumber = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            // Counter animation
            const counterAnim = (qSelector, start = 0, end, duration = 1000) => {
                const target = document.querySelector(qSelector);
                let startTimestamp = null;
                const step = (timestamp) => {
                    if (!startTimestamp) startTimestamp = timestamp;
                    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                    target.innerText = Math.floor(progress * (end - start) + start);
                    if (progress < 1) {
                        window.requestAnimationFrame(step);
                    }
                };
                window.requestAnimationFrame(step);
            };
            counterAnim("#count1", 0, 200000, 1000);
            counterAnim("#count2", 0, 15, 1200);
            counterAnim("#count3", 0, 10, 1400);
            counterAnim("#count4", 0, 150, 1600);
            // End number counter animation
        } else {
            false
        }
    });
});
observerBoxNumber.observe(boxNumber);

