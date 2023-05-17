'use strict';

import {
    customError,
    getUrlWithParams,
    submitFormFetch,
    submitWithoutForm,
} from './common/index.js';



document.addEventListener('DOMContentLoaded', () => {
    const ecommerceForm = document.getElementById('ecommerceForm');
    const ecommerceBtns = document.querySelectorAll('.ecommerceBtn');

    if (ecommerceForm) {
        const submitForm = async (e) => {

            e.preventDefault();

            await submitFormFetch(ecommerceForm, 'ecommerce').then(({ fetchResp: resp }) => {
                if (!resp.ok) throw new Error('Server error on eccomerce fetch', resp?.status);

                window.location.href = getUrlWithParams('/ecommerce-registrado');
                if (window.location.pathname === '/sponsors') {
                    window.location.href = getUrlWithParams('/sponsors-registrado');
                }
            })
                .catch((error) => {
                    customError('Eccomerce post error', error);
                });


        }

        ecommerceForm.querySelector('button').addEventListener('click', submitForm);
    }
    if (ecommerceBtns.length > 0) {
        const submitEvent = async (btn) => {
            btn.classList.add('button--loading');
            await submitWithoutForm('ecommerce').then(({ fetchResp: resp }) => {
                if (!resp.ok) throw new Error('Server error on digital fetch', resp?.status);
                btn.classList.remove('button--loading');

                window.location.href = getUrlWithParams('/ecommerce-registrado');
                if (window.location.pathname === '/sponsors') {
                    window.location.href = getUrlWithParams('/sponsors-registrado');
                }
            });
        }
        ecommerceBtns.forEach( btn => btn.addEventListener('click', () => {submitEvent(btn)}));
    }

});
