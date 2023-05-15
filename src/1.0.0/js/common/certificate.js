'use strict';

document.addEventListener('DOMContentLoaded', () => {

    const checkQADomain = () => {
        return (window.location.host === 'qa.goemms.com' || window.location.host === 'localhost') ? true : false;
    }

    function submitCertificate(e) {
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
        forceDownload(fullname);
    }

    function forceDownload(fullname) {

        var xhr = new XMLHttpRequest(),
            encodeFullname = encodeURI(fullname),
            domainUrl = (checkQADomain()) ? 'certificate-emms2023qa.php' : 'certificate-emms2023.php',
            url = 'https://textify.fromdoppler.com/' + domainUrl + '?fullname=' + encodeFullname,
            fileName = 'certificacion-emms2023.png';


        xhr.open("GET", url, true);
        xhr.responseType = "blob";
        xhr.onload = function () {
            var urlCreator = window.URL || window.webkitURL;
            var imageUrl = urlCreator.createObjectURL(this.response);
            var tag = document.createElement('a');
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
    const certificateCta = document.getElementById('certificateCta');
    certificateCta.addEventListener('click', submitCertificate);

});
