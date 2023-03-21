'use strict';

import {
    customError,
    getUrlWithParams,
    searchUrlParam,
    validateForm,
    toHex,
} from './common/index.js';

document.addEventListener('click', function (e) {
    e = e || window.event;
    const target = e.target || e.srcElement;
    const slug = target.getAttribute('slug');
    const sponsorsForm = document.getElementById('sponsorsForm');


    if (target.hasAttribute('data-toggle') && target.getAttribute('data-toggle') == 'emms__register-modal') {
        if (target.hasAttribute('data-target')) {
            const m_ID = target.getAttribute('data-target');
            document.getElementById(m_ID).classList.add('open');
            this.body.style.overflow = 'hidden';
            e.preventDefault();
        }
    }

    if ((target.hasAttribute('data-dismiss') && target.getAttribute('data-dismiss') == 'emms__register-modal') || target.classList.contains('emms__register-modal')) {
        const modal = document.querySelector('[class="emms__register-modal open"]');
        modal.classList.remove('open');
        this.body.style.overflow = 'scroll';
        e.preventDefault();
    }


    const submitForm = async (e) => {

        e.preventDefault();
        const endPoint = './services/register.php';
        const formData = new FormData(sponsorsForm);
        const encodeEmail = toHex(formData.get('email'));
        const userData = {
            'name': formData.get('name'),
            'email': formData.get('email'),
            'encodeEmail': encodeEmail,
            'acceptPolicies': (formData.get('privacy') === 'true') ? true : null,
            'acceptPromotions': (formData.get('promotions') === 'true') ? true : null,
            'utm_source': (searchUrlParam('utm_source') === '') ? 'direct' : searchUrlParam('utm_source'),
            'utm_campaign': searchUrlParam('utm_campaign'),
            'utm_content': searchUrlParam('utm_content'),
            'utm_term': searchUrlParam('utm_term'),
            'utm_medium': searchUrlParam('utm_medium'),
            'origin': searchUrlParam('origin'),
        };
        const isValidForm = validateForm(sponsorsForm);
        if (isValidForm) {
            sponsorsForm.querySelector('button').classList.add('button--loading');
            try {
                await fetch(endPoint, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(userData),
                })
                    .then(resp => {
                        if (!resp.ok) throw new Error('Server error on eccomerce fetch', resp?.status);
                        localStorage.setItem('dplrid', encodeEmail);
                        localStorage.setItem('lastEventsUpdateTime', new Date());
                        if (slug) {
                            const url = window.location.host;
                            window.open(`${url}/sponsors-interna/?slug=${slug}`, '_blank').focus();
                        }
                        window.location.href = getUrlWithParams('/sponsors-registrado');
                    })
                    .catch((error) => {
                        customError('Eccomerce post error', error);
                    });
            } catch (error) {
                customError('Eccomerce fetch error', error);
            }
            sponsorsForm.querySelector('button').classList.remove('button--loading');
        }

    }

    sponsorsForm.querySelector('button').addEventListener('click', submitForm);



}, false);
