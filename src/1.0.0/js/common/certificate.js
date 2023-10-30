'use strict';


const isQADomain = () => {
    return window.location.host === 'qa.goemms.com' || window.location.host === 'localhost';
}

const forceDownload = async (fullname, type) => {
    //FIXME: BOrrar el B cuando pase el PR
    const encodeFullname = encodeURI(fullname);
    const domainUrl = (isQADomain()) ? `certificate-emms2023qab.php` : `certificate-emms2023.php`;
    const url = `https://textify.fromdoppler.com/${domainUrl}?fullname=${encodeFullname}&type=${type}`;
    const fileName = `certificacion-emms2023-${type}.png`;

    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error("Error during file download");
        }

        const blob = await response.blob();
        const urlCreator = window.URL || window.webkitURL;
        const imageUrl = urlCreator.createObjectURL(blob);
        const tag = document.createElement('a');
        tag.href = imageUrl;
        tag.download = fileName;
        document.body.appendChild(tag);
        tag.click();
        document.body.removeChild(tag);
    } catch (error) {
        console.error('Error:', error);
        throw error;
    }
}

const handleButtonState = (submitButton, enable, showError) => {
    submitButton.setAttribute('data-disabled', enable ? 'true' : 'false');
    submitButton.classList.toggle('button--loading', enable);
    const errorSpan = document.querySelector('#certificateForm span');
    errorSpan.classList.toggle('showError', showError);
};



const submitCertificate = async (e, type, submitButton) => {
    e.preventDefault();
    const certificateForm = document.getElementById('certificateForm');
    const formData = new FormData(certificateForm);
    const fullname = formData.get('fullname');
    const isDisabled = submitButton.getAttribute('data-disabled') === 'true';
    if (isDisabled) {
        return false;
    }
    handleButtonState(submitButton, true, false); // Deshabilita el boton y elimina el mensaje de error

    if (fullname.length < 2) {
        handleButtonState(submitButton, false, true); // Habilita el boton y muestra el mensaje de error
        return false;
    }

    try {
        await forceDownload(fullname, type);
        certificateForm.reset();
        return true;
    } catch (error) {
        console.error(error);
        return;
    } finally {
        handleButtonState(submitButton, false, false);
    }
};




export { submitCertificate }
