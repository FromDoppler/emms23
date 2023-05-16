// Date Counter

const utcDate = '2023-05-16T15:00:00.000Z';
const targetDate = new Date(utcDate).getTime();

let days, hours, minutes, seconds;

const daysContainers = document.querySelectorAll(".d");
const hoursContainers = document.querySelectorAll(".h");
const minutesContainers = document.querySelectorAll(".m");
const secondsContainers = document.querySelectorAll(".s");

if (daysContainers != null) {
    function update() {
        const currentDate = new Date().getTime();
        let secondsLeft = (targetDate - currentDate) / 1000;

        days = parseInt(secondsLeft / 86400);
        secondsLeft = secondsLeft % 86400;

        hours = parseInt(secondsLeft / 3600);
        secondsLeft = secondsLeft % 3600;

        minutes = parseInt(secondsLeft / 60);
        seconds = parseInt(secondsLeft % 60);

        printTimeInContainers(daysContainers, days);
        printTimeInContainers(hoursContainers, hours);
        printTimeInContainers(minutesContainers, minutes);
        printTimeInContainers(secondsContainers, seconds);

    }
    update();
}

setInterval(update, 1000);

function pad(num, size) {
    var s = num + "";
    while (s.length < size) s = "0" + s;
    return s;
}

function printTimeInContainers(containers, time) {
    containers.forEach(container => { container.innerHTML = pad(time, 2) });
}
