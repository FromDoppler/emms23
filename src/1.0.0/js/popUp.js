'use strict';

import {
    customError,
    getUrlWithParams,
    submitFormFetch,
    submitWithoutForm,
} from './common/index.js';

document.addEventListener('DOMContentLoaded', () => {

    const activeFormButton = document.querySelectorAll('.activeFormButton');
    const activeButtonWithoutForm = document.querySelectorAll('.activeButtonWithoutForm');


    if (activeButtonWithoutForm) {
        const withoutFormListeners = () => {

            const activeButtonsSpinners = () => {
                activeButtonWithoutForm.forEach(btn => {
                    btn.classList.add('button--loading');
                });
            }

            const submitEvent = async (btn) => {
                activeButtonsSpinners();
                await submitWithoutForm('digital-trends').then(({ fetchResp: resp }) => {
                    btn.classList.remove('button--loading');
                    if (!resp.ok) throw new Error('Server error on digital fetch', resp?.status);

                    window.location.href = getUrlWithParams('/digital-trends-registrado');
                    if (window.location.pathname === '/sponsors') {
                        window.location.href = getUrlWithParams('/sponsors-registrado');
                    }
                });
            }


            activeButtonWithoutForm.forEach(btn => {
                btn.addEventListener('click', () => { submitEvent(btn) });
            });



        }
        withoutFormListeners();
    }

    if (activeFormButton) {

        const formListeners = () => {

            const modal = document.getElementById('modalRegister');
            // const popUpForm = document.getElementById('popUpForm');
            const popUpForms = document.querySelectorAll('.popUpForm');

            activeFormButton.forEach(btn => {
                btn.addEventListener('click', () => {
                    modal.classList.toggle('open');
                    document.querySelector('body').classList.toggle('hidden');
                })
            });

            const submitForm = async (form) => {

                await submitFormFetch(form, 'digital-trends').then(({ fetchResp: resp, encodeEmail }) => {
                    const button = form.querySelector('button');
                    button.classList.add('button--loading');
                    button.disabled = true;
                    if (!resp.ok) throw new Error('Server error on Sponsor fetch', resp?.status);
                    localStorage.setItem('dplrid', encodeEmail);
                    localStorage.setItem('lastEventsUpdateTime', new Date());
                    window.location.href = (`/digital-trends-registrado`);
                })
                    .catch((error) => {
                        const button = form.querySelector('button');
                        button.classList.remove('button--loading');
                        button.disabled = false;
                        customError('Sponsor post error', error);
                    });


            }

            popUpForms.forEach(form => {
                form.querySelector('button').addEventListener('click', () => {
                    submitForm(form)
                });
            })

        }
        formListeners();
    }



});
