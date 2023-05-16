'use strict';

import {
    customError,
    getUrlWithParams,
    submitFormFetch,
    submitWithoutForm,
} from './common/index.js';



document.addEventListener('DOMContentLoaded', () => {
    const digitalForm = document.getElementById('digitalForm');
    const digitalTrendsBtns = document.querySelectorAll('.digitalTrendsBtn');

    if (digitalForm) {
        const submitForm = async (e) => {

            e.preventDefault();

            await submitFormFetch(digitalForm, 'digital-trends').then(({ fetchResp: resp }) => {
                if (!resp.ok) throw new Error('Server error on digital fetch', resp?.status);

                window.location.href = getUrlWithParams('/digital-trends-registrado.php');
                if (window.location.pathname === '/sponsors.php') {
                    window.location.href = getUrlWithParams('/sponsors-registrado.php');
                }
            })
                .catch((error) => {
                    customError('Digital post error', error);
                });


        }

        digitalForm.querySelector('button').addEventListener('click', submitForm);
    }
    if (digitalTrendsBtns.length > 0) {
        const submitEvent = async (btn) => {
            btn.classList.add('button--loading');
            await submitWithoutForm('digital-trends').then(({ fetchResp: resp }) => {
                btn.classList.remove('button--loading');
                if (!resp.ok) throw new Error('Server error on digital fetch', resp?.status);

                window.location.href = getUrlWithParams('/digital-trends-registrado.php');
                if (window.location.pathname === '/sponsors.php') {
                    window.location.href = getUrlWithParams('/sponsors-registrado.php');
                }
            });
        }
        digitalTrendsBtns.forEach( btn => btn.addEventListener('click', () => {submitEvent(btn)}));
    }
});
