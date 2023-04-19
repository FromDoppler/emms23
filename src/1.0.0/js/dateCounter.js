// Date Counter

const utcDate = '2023-05-16T12:00:00.000Z';
var target_date = new Date(utcDate).getTime();

let days, hours, minutes, seconds;

const daysContainer = document.getElementById("d");
const hoursContainer = document.getElementById("h");
const minutesContainer = document.getElementById("m");
const secondsContainer = document.getElementById("s");

if (daysContainer != null) {
    function update() {
        const currentDate = new Date().getTime();
        let secondsLeft = (target_date - currentDate) / 1000;

        days = parseInt(secondsLeft / 86400);
        secondsLeft = secondsLeft % 86400;

        hours = parseInt(secondsLeft / 3600);
        secondsLeft = secondsLeft % 3600;

        minutes = parseInt(secondsLeft / 60);
        seconds = parseInt(secondsLeft % 60);

        daysContainer.innerHTML = pad(days, 2);
        hoursContainer.innerHTML = pad(hours, 2);
        minutesContainer.innerHTML = pad(minutes, 2);
        secondsContainer.innerHTML = pad(seconds, 2);
    }
    update();
}

setInterval(update, 1000);

function pad(num, size) {
    var s = num + "";
    while (s.length < size) s = "0" + s;
    return s;
}
