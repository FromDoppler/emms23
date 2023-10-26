"use strict";

document.addEventListener('DOMContentLoaded', () => {
    const dateStr = '2023-05-16 11:00:00';
    const utcDate = '2023-05-16T14:00:00.000Z';
    var eventDate = new Date(utcDate);
    const today = new Date();

    // Este código utiliza el hecho de que getTimezoneOffsetdevuelve un valor mayor durante la hora estándar frente al horario de verano (DST).
    // Por lo tanto, determina la salida esperada durante la hora estándar y compara si la salida de la fecha dada es igual (estándar) o menor (DST).
    // Tener en cuenta que getTimezoneOffset devuelve números positivos de minutos para las zonas al oeste de UTC,
    // que generalmente se indican como horas negativas (ya que están "detrás" de UTC). Por ejemplo, Los Ángeles es UTC–8h estándar, UTC-7h DST.
    // getTimezoneOffset regresa 480(480 minutos positivos) en diciembre (invierno, hora estándar), en lugar de -480. Devuelve números negativos
    // para el hemisferio oriental (como -600 Sydney en invierno, a pesar de estar "adelante" ( UTC+10h ).

    Date.prototype.stdTimezoneOffset = function () {
        const jan = new Date(this.getFullYear(), 0, 1);
        const jul = new Date(this.getFullYear(), 6, 1);
        return Math.max(jan.getTimezoneOffset(), jul.getTimezoneOffset());
    }

    Date.prototype.isDstObserved = function () {
        return this.getTimezoneOffset() < this.stdTimezoneOffset();
    }

    function addHoursToDate(date, hours) {
        return new Date(new Date(date).setHours(date.getHours() + hours));
    }

    function checkUserDts() {
        if (today.isDstObserved()) {
            eventDate = addHoursToDate(eventDate, 1);
        }
    }
    function checkUserDtsSpeakers(date) {
        if (today.isDstObserved()) {
            date = addHoursToDate(eventDate, 1);
            return date;
        }
        return date;
    }

    // Checkeamos si pertenece a Daylight saving time (DST) (horario de verano)
    checkUserDts();


    fetch('/services/getCountryNameAndCode.php')
        .then((response) => {
            return response.json();
        })
        .then(countryResponse => {
            //  ZONA HORARIA: ' + 'UTC-' + new Date().getTimezoneOffset() / 60 '
            const target = checkTargetCountry(countryResponse);
            setCountryAndDate(countryResponse, eventDate, target);
        });

    function checkTargetCountry({ countryName, countryCode }) {
        const targetCountries = ['AR', 'BO', 'CL', 'CO', 'CR', 'CU', 'DO', 'EC', 'ES', 'GD', 'GF', 'GY', 'HN', 'HT', 'JM', 'MX', 'NI', 'PA', 'PE', 'PR', 'PY', 'SR', 'SV', 'UY', 'VE'];
        if (!targetCountries.includes(countryCode)) {
            eventDate = new Date(dateStr);
            return false;
        }
        return true;
    }

    const changeCountryHour = (countryCode, flagContainers, img) => {
        if (countryCode === "MX") {
            flagContainers.forEach(flagContainer => {
                flagContainer.innerHTML = '';
                flagContainer.appendChild(img);
                flagContainer.innerHTML += '(' + countryCode + ') ' + '09' + ':00 (CDMX)';
            });
        } else if (countryCode === "ES") {
            flagContainers.forEach(flagContainer => {
                flagContainer.innerHTML = '';
                flagContainer.appendChild(img);
                flagContainer.innerHTML += '(' + countryCode + ') ' + '17' + ':00 (Madrid)';
            });
        }

    }

    function setCountryAndDate({ countryName, countryCode }, date, target) {

        const flagContainers = document.querySelectorAll('.emms__calendar__date__country span');


        if (!target) {
            countryCode = 'AR';
            countryName = 'Argentina';
        }

        const img = createImgElement(countryName, countryCode);
        let hours = date.getHours().toString();
        hours = (hours.length < 2) ? '0' + hours : hours;

        if (countryCode === "ES") {
            changeCountryHour(countryCode, flagContainers, img)
        } else {
            flagContainers.forEach(flagContainer => {
                flagContainer.innerHTML = '';
                flagContainer.appendChild(img);
                flagContainer.innerHTML += '(' + (countryCode === 'AR' ? 'ARG' : countryCode) + ') ' + hours + ':00';
            });
        }
        changeSpeakerHours(countryName, countryCode);
    }

    function createImgElement(countryName, countryCode) {
        const img = document.createElement("img");
        img.src = `src/img/flags/${countryCode}.png`;
        img.alt = countryName;
        img.title = countryName;

        return img;
    }



    const printCountryHourSpeakers = (eventHours, countryName, countryCode) => {

        const eventDateContainer = document.querySelectorAll('.emms__calendar__list__item__country');
        eventDateContainer.forEach((container, index) => {
            const span = container.querySelector('span');
            span.innerHTML = '';
            const img = createImgElement(countryName, countryCode);
            span.appendChild(img)
            let hour = eventHours[index].getHours().toString();
            hour = (hour.length < 2) ? '0' + hour : hour;
            let min = eventHours[index].getMinutes().toString();;
            min = (min.length < 2) ? min + '0' : min;
            span.innerHTML += '(' + (countryCode === 'AR' ? 'ARG' : countryCode) + ')' + ' ' + hour + ':' + min;
        });
    }

    const changeSpeakerHours = (countryName, countryCode) => {

        const eventDateContainer = document.querySelectorAll('.emms__calendar__list__item__country');
        let eventHours = [];

        eventDateContainer.forEach(container => {
            const txt = container.querySelector('span').innerHTML;
            let numb = txt.match(/\d/g);
            numb = numb.join("");
            let hourAndMin = numb.match(/.{1,2}/g);
            let newDate = new Date(`2023-05-16T${hourAndMin[0]}:${hourAndMin[1]}:00.000-03:00`);
            eventHours.push(structuredClone(newDate));
        });

        eventHours.forEach(date => { date = checkUserDtsSpeakers(date) });
        printCountryHourSpeakers(eventHours, countryName, countryCode);

    }


});

