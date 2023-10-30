'use strict';

import { submitCertificate } from "../common/certificate.js";

const startCertificateDT = () => {

    document.addEventListener('DOMContentLoaded', () => {

        const certificateCtaDT = document.getElementById('certificateDT');
        certificateCtaDT.addEventListener('click', async (e) => {
            let submitSucceeded = false;
            try {
                submitSucceeded =  await submitCertificate(e, 'digital-trends', certificateCtaDT);
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

startCertificateDT();
