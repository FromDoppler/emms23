
"use strict";
/*
import {
	getUrlWithParams
} from './modules/utm.js'; */

document.addEventListener('DOMContentLoaded', () => {

    const registerValue = localStorage.getItem("events");
    const streaming = document.getElementById('streaming');
    const registerForm = document.getElementById('registro');
    console.log(registerValue)

    if ( registerValue.includes('ecommerce', 'digital-trends') ){
        streaming.style.display = 'block';
        registerForm.style.display = 'none';
    }
});
