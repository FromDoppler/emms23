'use strict';

import {
    customError,
    getEncodeURLEmail,
    getUrlWithParams,
    submitFormFetch,
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


        submitFormFetch(ecommerceForm, 'ecommerce').then(({ fetchResp: resp, encodeEmail }) => {

            if (!resp.ok) throw new Error('Server error on eccomerce fetch', resp?.status);

            const events = ['ecommerce'];

            localStorage.setItem('dplrid', encodeEmail);
            localStorage.setItem('events', JSON.stringify(events));
            localStorage.setItem('lastEventsUpdateTime', new Date());
            window.location.href = getUrlWithParams('/ecommerce-registrado.php');
            if (window.location.pathname === '/sponsors.php') {
                window.location.href = getUrlWithParams('/sponsors-registrado.php');
            }
        })
            .catch((error) => {
                customError('Eccomerce post error', error);
            });


    }

    ecommerceForm.querySelector('button').addEventListener('click', submitForm);
});
