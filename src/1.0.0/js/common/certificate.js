'use strict';

document.addEventListener('DOMContentLoaded', () => {

    const checkQADomain = () => {
        return (window.location.host === 'qa.goemms.com' || window.location.host === 'localhost') ? true : false;
    }

    function submitCertificate(e, type) {
        const certificateForm = document.getElementById('certificateForm');
        e.preventDefault();
        const formData = new FormData(certificateForm);
        const fullname = formData.get('fullname');
        if (fullname.length < 2) {
            certificateForm.querySelector('span').classList.add('showError');
            return;
        } else {
            certificateForm.querySelector('span').classList.remove('showError');
        }

        forceDownload(fullname, type);
    }

    function forceDownload(fullname, type) {

        const xhr = new XMLHttpRequest(),
            encodeFullname = encodeURI(fullname),
            domainUrl = (checkQADomain()) ? `certificate-emms2023qa.php` : `certificate-emms2023.php`,
            url = 'https://textify.fromdoppler.com/' + domainUrl + '?fullname=' + encodeFullname + '&type=' + type,
            fileName = `certificacion-emms2023-${type}.png`;


        xhr.open("GET", url, true);
        xhr.responseType = "blob";
        xhr.onload = function () {
            const urlCreator = window.URL || window.webkitURL;
            const imageUrl = urlCreator.createObjectURL(this.response);
            const tag = document.createElement('a');
            tag.href = imageUrl;
            tag.download = fileName;
            document.body.appendChild(tag);
            tag.click();
            document.body.removeChild(tag);
        }
        xhr.send();
        document.getElementById('certificateModal').classList.toggle('open');
        document.body.style.overflowY = 'scroll';
    }
    const certificateCtaEcommerce = document.getElementById('certificateEcommerceCta');
    certificateCtaEcommerce.addEventListener('click', (e) => submitCertificate(e, 'ecommerce'));

});
