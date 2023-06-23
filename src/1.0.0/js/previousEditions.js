'use strict';

import {
    customError,
    getUrlWithParams,
    submitFormFetch,
} from './common/index.js';

document.addEventListener('click', (e) => {
    e = e || window.event;
    const target = e.target || e.srcElement;
    const editionsForm = document.getElementById('editionsForm');


    if (target.hasAttribute('data-toggle') && target.getAttribute('data-toggle') == 'emms__register-modal') {
        if (target.hasAttribute('data-target')) {
            const m_ID = target.getAttribute('data-target');
            document.getElementById(m_ID).classList.add('open');
            document.querySelector('body').style.overflowY = 'hidden';
            e.preventDefault();
        }
    }

    if ((target.hasAttribute('data-dismiss') && target.getAttribute('data-dismiss') == 'emms__register-modal') || target.classList.contains('emms__register-modal')) {
        const modal = document.querySelector('[class="emms__register-modal open"]');
        modal.classList.remove('open');
        document.querySelector('body').style.overflowY = 'scroll';
        e.preventDefault();
    }


    const submitForm = async (e) => {

        await submitFormFetch(editionsForm, 'digital-trends').then(({ fetchResp: resp, encodeEmail }) => {
            if (!resp.ok) throw new Error('Server error on Editions fetch', resp?.status);
            localStorage.setItem('dplrid', encodeEmail);
            localStorage.setItem('lastEventsUpdateTime', new Date());
            window.location.href = (`/ediciones-anteriores-registrado`);
        })
            .catch((error) => {
                customError('Editions post error', error);
            });


    }

    editionsForm.querySelector('button').addEventListener('click', submitForm);



});
