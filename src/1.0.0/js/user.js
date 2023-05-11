'use strict';
import { toHex, getEncodeURLEmail } from "./common/index.js";

const encodeUser = getEncodeURLEmail();
let localStorageEvents = localStorage.getItem('events');



const checkEncodeUrl = () => {
    if (encodeUser) {
        //Check if it is an old user that was saved before the new JSON logic
        if (encodeUser.includes('{')) {
            const userData = JSON.parse(encodeUser);
            const userEvents = JSON.parse(userData.userEvents);
            // Check localStorage
            if (localStorageEvents) {
                localStorageEvents = JSON.parse(localStorageEvents);
                if (userEvents.length > localStorageEvents.length) {
                    localStorage.setItem('events', JSON.stringify(userEvents));
                    localStorage.setItem('lastEventsUpdateTime', new Date());
                }
            } else {
                localStorage.setItem('dplrid', toHex(user.email));
                localStorage.setItem('events', JSON.stringify(events));
                localStorage.setItem('lastEventsUpdateTime', new Date());
            }
        } else {
            //If it is false, we know that its only event to save was ecommerce
            const oldEcommerce = ['ecommerce'];
            localStorage.setItem('dplrid', toHex(encodeUser));
            localStorage.setItem('events', JSON.stringify(oldEcommerce));
            localStorage.setItem('lastEventsUpdateTime', new Date());
        }
    }
}


const userRegisteredInEvent = (event) => {
    const userEvents = localStorage.getItem('events');
    if (userEvents) {
        const searchedEvent = JSON.parse(userEvents).find(userEvent => userEvent === event);
        return (searchedEvent === undefined ? false : true);
    }
    return false;
}

const hiddenOrShowUserUI = (event) => {
    const hiddenElements = document.querySelectorAll('.eventHiddenElements');
    const showElements = document.querySelectorAll('.eventShowElements');
    showElements.forEach(element => element.style.display = 'none');
    if (!userRegisteredInEvent(event)) return;
    hiddenElements.forEach(element => element.style.display = 'none');
    showElements.forEach(element => element.style.display = 'block');
}

const registerEventsCardsCheck = () => {

    const ecommerceCards = document.querySelectorAll('.ecommerceCard');
    const digitalTCards = document.querySelectorAll('.digitalTCard');

    if (userRegisteredInEvent('ecommerce')) {
        ecommerceCards.forEach(ecommerceCard => {
            ecommerceCard.querySelector('.not--loged').classList.add('nodisplay--card');
            ecommerceCard.querySelector('.loged').classList.add('display--card');
        });
    }

    if (userRegisteredInEvent('digital-trends')) {
        digitalTCards.forEach(digitalTCard => {
            digitalTCard.querySelector('.not--loged').classList.add('nodisplay--card');
            digitalTCard.querySelector('.loged').classList.add('display--card');
        });
    }

}

export {
    checkEncodeUrl,
    userRegisteredInEvent,
    hiddenOrShowUserUI,
    registerEventsCardsCheck
};
