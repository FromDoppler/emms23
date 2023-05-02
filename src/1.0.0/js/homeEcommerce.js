'use strict';

import {
    customError,
    getUrlWithParams,
    submitFormFetch,
    submitWithoutForm,
} from './common/index.js';



document.addEventListener('DOMContentLoaded', () => {
    const ecommerceForm = document.getElementById('ecommerceForm');
    const ecommerceBtn = document.getElementById('ecommerceBtn');

    if (ecommerceForm) {
        const submitForm = async (e) => {

            e.preventDefault();

            await submitFormFetch(ecommerceForm, 'ecommerce').then(({ fetchResp: resp }) => {
                if (!resp.ok) throw new Error('Server error on eccomerce fetch', resp?.status);

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
    }
    if (ecommerceBtn) {
        const submitEvent = async (e) => {
            ecommerceBtn.classList.add('button--loading');
            e.preventDefault();
            await submitWithoutForm('ecommerce').then(({ fetchResp: resp }) => {
                if (!resp.ok) throw new Error('Server error on digital fetch', resp?.status);
                ecommerceBtn.classList.remove('button--loading');

                window.location.href = getUrlWithParams('/ecommerce-registrado.php');
                if (window.location.pathname === '/sponsors.php') {
                    window.location.href = getUrlWithParams('/sponsors-registrado.php');
                }
            });
        }
        ecommerceBtn.addEventListener('click', submitEvent);
    }

});
