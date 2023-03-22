'use strict';

import {
    customError,
    searchUrlParam,
    validateForm,
    toHex,
} from './index.js';

const submitFormFetch = async (form, fetchType = null) => {

    const endPoint = './services/register.php';
    const formData = new FormData(form);
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
        'type': fetchType,
    };
    const isValidForm = validateForm(form);
    if (isValidForm) {
        form.querySelector('button').classList.add('button--loading');
        try {
            const fetchResp = await fetch(endPoint, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(userData),
            });
            return {
                fetchResp,
                encodeEmail
            };
        } catch (error) {
            customError('Eccomerce fetch error', error);
        }
        form.querySelector('button').classList.remove('button--loading');
    }

};

export {
    submitFormFetch
};
