'use strict';

import {
    customError,
    getEncodeURLEmail,
    getUrlWithParams,
    searchUrlParam,
    validateForm,
    toHex,
    fromHex
} from './common/index.js';



document.addEventListener('DOMContentLoaded', () => {

    const ecommerceForm = document.getElementById('ecommerceForm');
    const userEmail = getEncodeURLEmail();

    // if (userEmail) {
    //     const endPoint = 'exampleEndPointForGetUserEvents';
    //     const userData = {
    //         email: fromHex(userEmail)
    //     }

    //     const getUserEvents = async () => {
    //         //TODO: Poner el endPoint correspondiente cuando este listo
    //         const resp = await fetch(endPoint, {
    //             method: 'POST',
    //             headers: {
    //                 'Content-Type': 'application/json'
    //             },
    //             body: JSON.stringify(userData),
    //         });
    //         const userEvents = await resp.json()
    //         return userEvents;
    //     }

    //     const loadUserInterface = (userEvents) => {
    //         //TODO: Interactuar con la maqueta cuando este lista
    //         console.log('Cargando interfaz');
    //     };

    //     getUserEvents().then(userEvents => {
    //         loadUserInterface(userEvents);
    //     });
    // }


    const submitForm = async (e) => {

        e.preventDefault();
        const endPoint = './services/register.php';
        const formData = new FormData(ecommerceForm);
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
        const isValidForm = validateForm(ecommerceForm);
        if (isValidForm) { //TODO: Agregar logica en el boton del form cuando este lista la maqueta
            ecommerceForm.querySelector('button').classList.add('button--loading');
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

                        const events = ['ecommerce'];

                        localStorage.setItem('dplrid', encodeEmail);
                        localStorage.setItem('events', JSON.stringify(events));
                        localStorage.setItem('lastEventsUpdateTime', new Date());
                        window.location.href = getUrlWithParams('/ecommerce-registrado.php');
                    })
                    .catch((error) => {
                        customError('Eccomerce post error', error);
                    });
            } catch (error) {
                customError('Eccomerce fetch error', error);
            }
            ecommerceForm.querySelector('button').classList.remove('button--loading');
        }

    }

    ecommerceForm.querySelector('button').addEventListener('click', submitForm);

});
