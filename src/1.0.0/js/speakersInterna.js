
"use strict";
import {
    customError,
    submitFormFetch,
} from './common/index.js';

import {
    userRegisteredInEvent
} from './user.js';


document.addEventListener('DOMContentLoaded', () => {

    const speakerVideo = document.getElementById('speakerVideo');
    const speakerFormContainer = document.getElementById('formContainer');
    const speakerForm = document.getElementById('speakerForm');

    const checkUserUI = () => {
        if (userRegisteredInEvent('ecommerce') || userRegisteredInEvent('digital-trends')) {
            speakerVideo.classList.remove('dp--none');
            speakerFormContainer.classList.add('dp--none');
        } else {
            speakerFormContainer.classList.remove('dp--none');
            speakerVideo.classList.add('dp--none');
            addEventSubmit();
        }
    }

    const addEventSubmit = () => {
        const submitForm = async (e) => {

            e.preventDefault();

            await submitFormFetch(speakerForm, 'ecommerce').then(({ fetchResp: resp }) => {
                if (!resp.ok) throw new Error('Server error on speaker fetch', resp?.status);
                checkUserUI();
            })
                .catch((error) => {
                    customError('Speaker post error', error);
                });


        }

        speakerForm.querySelector('button').addEventListener('click', submitForm);
    }



    checkUserUI();


});
