'use strict';

import {
    customError,
    searchUrlParam,
    validateForm,
    toHex,
} from './index.js';

const submitFormFetch = async (form, fetchType) => {

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
        'events': ''
    };
    const isValidForm = validateForm(form);
    if (isValidForm) {
        form.querySelector('button').classList.add('button--loading');

        userData.events = setEventInLocalStorage(fetchType, encodeEmail);

        try {
            const fetchResp = await fetch(endPoint, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(userData),
            });
            return {
                fetchResp
            };
        } catch (error) {
            customError('Fetch error', error);
        }
        form.querySelector('button').classList.remove('button--loading');
    }

};

const setEventInLocalStorage = (fetchType, encodeEmail) => {
    let events;
    if (localStorage.getItem('events')) {
        events = JSON.parse(localStorage.getItem('events'));
        events.push(fetchType);
        localStorage.setItem('events', JSON.stringify(events));
    } else {
        events = [fetchType];
        localStorage.setItem('dplrid', encodeEmail);
        localStorage.setItem('events', JSON.stringify(events));
    }
    localStorage.setItem('lastEventsUpdateTime', new Date());
    return JSON.stringify(events);
}

export {
    submitFormFetch
};
