'use strict';

import {
    customError,
    getUrlWithParams,
    submitFormFetch,
    submitWithoutForm,
} from './common/index.js';



document.addEventListener('DOMContentLoaded', () => {
    const digitalForm = document.getElementById('digitalForm');
    const digitalTrendsBtn = document.getElementById('digitalTrendsBtn');

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
    if (digitalTrendsBtn) {
        const submitEvent = async (e) => {
            e.preventDefault();
            await submitWithoutForm('digital-trends').then(({ fetchResp: resp }) => {
                if (!resp.ok) throw new Error('Server error on digital fetch', resp?.status);

                window.location.href = getUrlWithParams('/digital-trends-registrado.php');
                if (window.location.pathname === '/sponsors.php') {
                    window.location.href = getUrlWithParams('/sponsors-registrado.php');
                }
            });
        }
        digitalTrendsBtn.addEventListener('click', submitEvent);
    }
});
