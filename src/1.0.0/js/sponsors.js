document.addEventListener('click', function (e) {
    e = e || window.event;
    var target = e.target || e.srcElement;

    if (target.hasAttribute('data-toggle') && target.getAttribute('data-toggle') == 'emms__register-modal') {
        if (target.hasAttribute('data-target')) {
            var m_ID = target.getAttribute('data-target');
            document.getElementById(m_ID).classList.add('open');
            this.body.style.overflow = 'hidden';
            e.preventDefault();
        }
    }

    if ((target.hasAttribute('data-dismiss') && target.getAttribute('data-dismiss') == 'emms__register-modal') || target.classList.contains('emms__register-modal')) {
        var modal = document.querySelector('[class="emms__register-modal open"]');
        modal.classList.remove('open');
        this.body.style.overflow = 'scroll';
        e.preventDefault();
    }
}, false);
