document.addEventListener('click', function (e) {
    e = e || window.event;
    var target = e.target || e.srcElement;

    if (target.hasAttribute('data-toggle') && target.getAttribute('data-toggle') == 'emms__certificate-modal') {
        if (target.hasAttribute('data-target')) {
            var m_ID = target.getAttribute('data-target');
            document.getElementById(m_ID).classList.add('open');
            document.querySelector('body').style.overflowY = 'hidden';
            e.preventDefault();
        }
    }

    // Close modal window with 'data-dismiss' attribute or when the backdrop is clicked
    if ((target.hasAttribute('data-dismiss') && target.getAttribute('data-dismiss') == 'emms__certificate-modal') || target.classList.contains('emms__certificate-modal')) {
        var modal = document.querySelector('[class="emms__certificate-modal open"]');
        modal.classList.remove('open');
        document.querySelector('body').style.overflowY = 'scroll';
        e.preventDefault();
    }
}, false);
