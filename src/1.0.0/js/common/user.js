'use strict';

import { getEncodeURLEmail } from "./index.js";


const isUserLogged = () => {

    const loggedLocalStorage = (getUserLoggedFromLocalStorage() === false) ? false : true;
    const loggedInUrl = (getEncodeURLEmail() === false) ? false : true;

    return (loggedLocalStorage || loggedInUrl);

}

const getUserLoggedFromLocalStorage = () => {
    return (localStorage.getItem('dplrid') === null ? false : localStorage.getItem('dplrid'));
}


const diffHours = (date2, date1) => {

    let diff = (date2.getTime() - date1.getTime()) / 1000;
    diff /= (60 * 60);
    return Math.abs(Math.round(diff));

}

const loadInterface = (events) => {

}

// if (getUserLoggedFromLocalStorage()) {
//     //Si tenemos los datos en local
//     let userLastUpdateTime = localStorage.getItem('lastEventsUpdateTime');
//     userLastUpdateTime = new Date(userLastUpdateTime);
//     let userEvents;

//     if (diffHours(new Date(), userLastUpdateTime) > 24) {
//         // Mandamos el fetch para traer los datos de los cursos del usuario
//     } else {
//         userEvents = localStorage.getItem('events');
//         userEvents = JSON.parse(userEvents);
//     }

//     console.log({ userEvents });

// } else if (getEncodeURLEmail()) {
//     //Si tenemos el email en la url
// } else {
//     //No esta loguado de ninguna manera
// }


export {
   isUserLogged,
};
