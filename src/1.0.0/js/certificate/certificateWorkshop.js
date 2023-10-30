'use strict';

import { submitCertificate } from "../common/certificate.js";


const startCertificateWorkshop = () => {

    document.addEventListener('DOMContentLoaded', () => {

        const certificateWorkshopButton = document.getElementById('certificateWorkshop');
        //FIXME: Cambiar ecommerce por digital-trends
        certificateWorkshopButton.addEventListener('click', async (e) => {
            await submitCertificate(e, 'ecommerce', certificateWorkshopButton);
        }
        );

    });

}
startCertificateWorkshop();
