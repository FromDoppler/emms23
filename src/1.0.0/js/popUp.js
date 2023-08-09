'use strict';

import {
    customError,
    submitFormFetch,
} from './common/index.js';

document.addEventListener('DOMContentLoaded', () => {

    const activeFormButton = document.querySelectorAll('.activeFormButton');
    const modal = document.getElementById('modalRegister');
    const popUpForm = document.getElementById('popUpForm');


    activeFormButton.forEach(btn => {
        btn.addEventListener('click', () => {
            modal.classList.toggle('open');
        })
    });

    const submitForm = async (e) => {

        await submitFormFetch(popUpForm, 'digital-trends').then(({ fetchResp: resp, encodeEmail }) => {
            popUpForm.querySelector('button').classList.add('button--loading');
            if (!resp.ok) throw new Error('Server error on Sponsor fetch', resp?.status);
            localStorage.setItem('dplrid', encodeEmail);
            localStorage.setItem('lastEventsUpdateTime', new Date());
            window.location.href = (`/digital-trends-registrado`);
        })
            .catch((error) => {
                popUpForm.querySelector('button').classList.remove('button--loading');
                customError('Sponsor post error', error);
            });


    }

    popUpForm.querySelector('button').addEventListener('click', submitForm);
});
