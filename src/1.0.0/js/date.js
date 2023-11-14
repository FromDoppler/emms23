"use strict";

document.addEventListener('DOMContentLoaded', () => {
    const dateStr = '2023-05-16 10:30:00';
    const utcDate = '2023-05-16T13:30:00.000Z';
    var eventDate = new Date(utcDate);
    // const dateStrNetworking = '2023-05-16 14:00:00';
    const utcDateNetworking = '2023-05-16T17:00:00.000Z';
    var eventDateNetworking = new Date(utcDateNetworking);
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

    const addHoursToDate = (date, hours) => {
        return new Date(new Date(date).setHours(date.getHours() + hours));
    }

    const checkUserDts = () => {
        if (today.isDstObserved()) {
            eventDate = addHoursToDate(eventDate, 1);
        }
    }
    const checkUserDtsSpeakers = (date) => {
        if (today.isDstObserved()) {
            date = addHoursToDate(eventDate, 1);
            return date;
        }
        return date;
    }

    const getCountryAndCode = async () => {
        try {
            const response = await fetch('/services/getCountryNameAndCode.php');
            const countryResponse = await response.json();
            return countryResponse;
        } catch (error) {
            console.error(error);
            throw error;
        }
    };

    const checkTargetCountry = ({ countryName, countryCode }) => {
        const targetCountries = ['AR', 'BO', 'CL', 'CO', 'CR', 'CU', 'DO', 'EC', 'ES', 'GD', 'GF', 'GY', 'HN', 'HT', 'JM', 'MX', 'NI', 'PA', 'PE', 'PR', 'PY', 'SR', 'SV', 'UY', 'VE'];
        if (!targetCountries.includes(countryCode)) {
            eventDate = new Date(dateStr);
            return false;
        }
        return true;
    }

    const changeCountryHour = (countryCode, flagContainers, img, printType) => {
        if (countryCode === "MX") {
            const fullTime = (printType === 'networking') ? '07:30(CDMX)' : '11:00(CDMX)';
            flagContainers.forEach(flagContainer => {
                flagContainer.innerHTML = '';
                flagContainer.appendChild(img);
                flagContainer.innerHTML += '(' + countryCode + ') ' + fullTime;
            });
        } else if (countryCode === "ES") {
            const fullTime = (printType === 'networking') ? '18:00 (Madrid)' : '14:30 (Madrid)';
            flagContainers.forEach(flagContainer => {
                flagContainer.innerHTML = '';
                flagContainer.appendChild(img);
                flagContainer.innerHTML += '(' + countryCode + ') ' + fullTime;
            });
        }

    }

    const createImgElement = (countryName, countryCode) => {
        const img = document.createElement("img");
        img.src = `src/img/flags/${countryCode}.png`;
        img.alt = countryName;
        img.title = countryName;

        return img;
    }

    const printCountryHourSpeakers = (eventHours, countryName, countryCode, filterEventDateContainer) => {

        filterEventDateContainer.forEach((container, index) => {
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

    const setCountryDateGeneric = (countryCode, filterFlagContainers, img, date, printType) => {
        const hours = date.getHours().toString().padStart(2, '0');
        const minutes = date.getMinutes().toString().padStart(2, '0');


        if (countryCode === "ES") {
            changeCountryHour(countryCode, filterFlagContainers, img, printType);
        } else {
            filterFlagContainers.forEach(flagContainer => {
                flagContainer.innerHTML = '';
                flagContainer.appendChild(img);
                flagContainer.innerHTML += `(${countryCode === 'AR' ? 'ARG' : countryCode}) ${hours}:${minutes}`;
            });
        }
    }

    const setCountryAndDateSpeakers = ({ countryName, countryCode }, date, target) => {
        const flagContainers = document.querySelectorAll('.emms__calendar__date__country span');
        // Filtra los elementos flagContainers que no tienen la clase hermana "networking"
        const speakersFlagsContainers = Array.from(flagContainers).filter(flagContainer => {
            return !flagContainer.parentElement.classList.contains('networking');
        });

        if (!target) {
            countryCode = 'AR';
            countryName = 'Argentina';
        }

        const img = createImgElement(countryName, countryCode);
        setCountryDateGeneric(countryCode, speakersFlagsContainers, img, date, 'speaker');
    }

    const setCountryAndDateNetworking = ({ countryName, countryCode }, date, target) => {
        const flagNetworkingContainers = document.querySelectorAll('.emms__calendar__date__country.networking span');

        if (!target) {
            countryCode = 'AR';
            countryName = 'Argentina';
        }

        const img = createImgElement(countryName, countryCode);
        setCountryDateGeneric(countryCode, flagNetworkingContainers, img, date, 'networking');
    }



    const changeSpeakerHoursGeneric = (countryCode, countryName, eventDateContainers) => {
        const eventHours = [];
        eventDateContainers.forEach(container => {
            const txt = container.querySelector('span').innerHTML;
            let numb = txt.match(/\d/g);
            numb = numb.join("");
            let hourAndMin = numb.match(/.{1,2}/g);
            if (countryCode==="ES") {
                hourAndMin[0] = hourAndMin[0]-1;
            }
            let newDate = new Date(`2023-05-16T${hourAndMin[0]}:${hourAndMin[1]}:00.000-03:00`);
            eventHours.push(structuredClone(newDate));
        });

        /*
         Queda desactivado de momento hasta analizar el por que detecta el cambio de zona horaria en españa cuando no lo es
         eventHours.forEach(date => {
                    date = checkUserDtsSpeakers(date);
            });
        */
        printCountryHourSpeakers(eventHours, countryName, countryCode, eventDateContainers);
    }

    const changeSpeakerHoursSpeakers = ({ countryName, countryCode }) => {
        const eventDateContainers = document.querySelectorAll('.emms__calendar__list__item__country');
        // Filtra los elementos eventDateContainers que no tienen la clase hermana "workshop"
        const filterEventDateContainers = Array.from(eventDateContainers).filter(container => {
            return !container.classList.contains('workshop');
        });

        changeSpeakerHoursGeneric(countryCode, countryName, filterEventDateContainers);
    }

    const changeSpeakerHoursWorkshops = ({ countryName, countryCode }) => {
        const eventDateContainers = document.querySelectorAll('.emms__calendar__list__item__country.workshop');
        changeSpeakerHoursGeneric(countryCode, countryName, eventDateContainers);
    }


    const initDateChanges = async () => {

        // Checkeamos si pertenece a Daylight saving time (DST) (horario de verano)
        //Queda desactivado de momento hasta analizar el por que detecta el cambio de zona horaria en españa cuando no lo es
        // checkUserDts();
        // Obtenemos el pais del usuario
        const countryResponse = await getCountryAndCode();
        // Checkeamos si es un pais target
        const target = checkTargetCountry(countryResponse);
        // Ponemos el horarios en las banderitas de los dias
        setCountryAndDateSpeakers(countryResponse, eventDate, target);
        setCountryAndDateNetworking(countryResponse, eventDateNetworking, target);
        // Adapta la hora de cada speaker al pais correspondiente y lo imprime en su contenedor
        changeSpeakerHoursSpeakers(countryResponse);
        changeSpeakerHoursWorkshops(countryResponse);
    }

    initDateChanges();

});

