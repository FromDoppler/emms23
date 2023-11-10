'use strict';

import { submitCertificate, submitCertificateWithoutForm } from '../common/certificate.js';

const startCertificateWorkshop = () => {

    document.addEventListener('DOMContentLoaded', async () => {

        const updateUserName = async (userName) => {
            const userEmail = getEmailFromUrl();
            const currentDomain = window.location.hostname;
            const endPoint = `https://${currentDomain}/wix/v1/api/update_contact_name.php`;
            const userData = {
                'name': userName,
                'email': userEmail
            };
            const options = {
                method: 'POST',
                body: JSON.stringify(userData),
                headers: {
                    'Content-Type': 'application/json',
                },
            };

            try {
                const response = await fetch(endPoint, options);
                const data = await response.json();
                return data;

            } catch (error) {
                console.error('Error en la solicitud Fetch:', error);
                return null;
            }
        }

        const toggleSpinner = () => {
            const spinner = document.getElementById('spinner');
            spinner.classList.toggle('visible');
        };

        const getEmailFromUrl = () => {
            const url = window.location.href;
            const regex = /email=([^&]+)/;
            const match = url.match(regex);
            const emailValue = match ? match[1] : null;
            return emailValue;
        }

        const getUserNameWithEmail = async () => {
            const userEmail = encodeURIComponent(getEmailFromUrl());
            const currentDomain = window.location.hostname;
            const endPoint = `https://${currentDomain}/wix/v1/api/find_contact_by_email.php?email=${userEmail}`;
            const options = {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                }
            };

            try {
                const response = await fetch(endPoint, options);
                const data = await response.text();
                if (data === 'email_not_found') {
                    console.log('El usuario no fue encontrado');
                    return null;
                } else {
                    const { contact_name: userName } = JSON.parse(data);
                    console.log('Nombre de usuario:', userName);
                    return userName;
                }
            } catch (error) {
                console.error('Error en la solicitud Fetch:', error);
                return null;
            }
        };

        const changeUserMessage = (userName, certificateContainer) => {
            const messageElement = certificateContainer.querySelector('p');
            messageElement.innerHTML = `Hola <strong>${userName}!</strong> Haz clic en el siguiente botón para <br> comenzar la descarga`;
        };

        const hideInput = (certificateContainer) => {
            const inputElement = certificateContainer.querySelector('#certificateForm input');
            inputElement.style.display = 'none';
        };

        const changeUserUI = (userName) => {
            const certificateContainer = document.querySelector('.emms__certificate-download');
            changeUserMessage(userName, certificateContainer);
            hideInput(certificateContainer);
        };

        const initializeUI = (userName) => {


            const certificateWorkshopButton = document.getElementById('certificateWorkshop');

            if (userName) {
                changeUserUI(userName);
                certificateWorkshopButton.addEventListener('click', async (e) => {
                    await submitCertificateWithoutForm(e, 'workshop', certificateWorkshopButton, userName);
                });
            } else {
                certificateWorkshopButton.addEventListener('click', async (e) => {
                    const certificateForm = document.getElementById('certificateForm');
                    const formData = new FormData(certificateForm);
                    const userName = formData.get('fullname');
                    await updateUserName(userName);
                    changeUserUI(userName);
                    await submitCertificate(e, 'workshop', certificateWorkshopButton);
                });
            }
            toggleSpinner();
        };
        toggleSpinner();
        const userName = await getUserNameWithEmail();
        initializeUI(userName);
    });
};

startCertificateWorkshop();

