'use strict';

import { submitCertificate } from "../common/certificate.js";
import { searchUrlParam } from "../common/utm.js";

const startCertificate = () => {

    document.addEventListener('DOMContentLoaded', () => {

        const certificateCta = document.getElementById('certificateCta');
        certificateCta.addEventListener('click', async (e) => {
            let submitSucceeded = false;
            const eventType = searchUrlParam('event');
            try {
                submitSucceeded = await submitCertificate(e, eventType, certificateCta);
            } catch (error) {
                console.error(error);
            }
            if (submitSucceeded) {
                document.getElementById('certificateModal').classList.toggle('open');
                document.body.style.overflowY = 'scroll';
            }
        }
        );


    });

}

startCertificate();
