'use strict';

import {
    getUrlWithParams,
} from './common/index.js';


document.addEventListener('DOMContentLoaded', () => {

    const redirectRegisterButton = document.getElementById('redirectRegisterButton');

    redirectRegisterButton.addEventListener('click', () => {
        window.location.href = getUrlWithParams('/ecommerce.php');
    });

});
