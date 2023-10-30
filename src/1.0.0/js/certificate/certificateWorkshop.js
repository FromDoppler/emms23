'use strict';

import { submitCertificate } from "../common/certificate.js";


const startCertificateWorkshop = () => {

    document.addEventListener('DOMContentLoaded', () => {

        const certificateWorkshopButton = document.getElementById('certificateWorkshop');
        certificateWorkshopButton.addEventListener('click', async (e) => {
            await submitCertificate(e, 'workshop', certificateWorkshopButton);
        }
        );

    });

}
startCertificateWorkshop();
