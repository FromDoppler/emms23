import {getPhase} from './services/getPhase.js'
import {setPhase} from './services/setPhase.js'

export const showPhasesListPage = async () => {
    const phasesListUrl = 'src/modules/settings/phases/phases-list.html';
    const response = await fetch(phasesListUrl);
    const phases = document.querySelector('phases')
    phases.innerHTML = await response.text();

    const ecommerceForm = document.getElementById('ecommerce_current_phase');
    ecommerceForm.addEventListener('submit', function (e) {
        sendDataCurrentPhase(e,"ecommerce");
    });

    const digitalTrendsForm = document.getElementById('digital-trends_current_phase');
    digitalTrendsForm.addEventListener('submit', function (e) {
        sendDataCurrentPhase(e,"digital-trends");
    });

    hideAlerts();
    checkRadiosPhase("ecommerce");
    checkRadiosPhase("digital-trends");
}


function hideAlerts() {
    const eco = document.getElementById('ecommerce_current-alert-success');
    eco.style.display = 'none';
    const dt = document.getElementById('digital-trends_current-alert-success');
    dt.style.display = 'none';
}

function showAlert(id) {
    const card = document.getElementById(id);
    card.style.display = 'block';
    setTimeout(() => {
        card.style.display = 'none';
    }, 2000)
}

const getTransition = (event) => {
    const isLive = document.getElementById(event+"_toggle-live").checked;
    if (isLive)
        return "live-on";
    return "live-off";
}

//setPhase
const sendDataCurrentPhase = async (e, event) => {
    const selectedPhase = document.querySelector('input[name="'+event+'_phase"]:checked').getAttribute('data-phase');

    let currentTransition;
    if (selectedPhase !=="during"){
        currentTransition = "live-off";
        document.getElementById(event+"_toggle-live").checked = false;
    }
    else
        currentTransition = getTransition(event);

    const transition = currentTransition;

    e.preventDefault();
    await setPhase(event, selectedPhase, transition);
    showAlert(event+'_current-alert-success');
}

//getPhase
const checkRadiosPhase = async (event) => {
    const objResult = await getPhase(event);

    document.getElementById(event+'_'+objResult.current_phase).checked = true;
    if (objResult.transition === "live-on")
        document.getElementById(event+"_toggle-live").checked = true;
    else
        document.getElementById(event+"_toggle-live").checked = false;
}
