'use strict';

import { submitCertificate } from "../common/certificate.js";

const startCertificateEcommerce = () => {

    document.addEventListener('DOMContentLoaded', () => {

        const certificateCtaEcommerce = document.getElementById('certificateEcommerceCta');
        certificateCtaEcommerce.addEventListener('click', async (e) => {
            let submitSucceeded = false;
            try {
                submitSucceeded = await submitCertificate(e, 'ecommerce', certificateCtaEcommerce);
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

startCertificateEcommerce();
