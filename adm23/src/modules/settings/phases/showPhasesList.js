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

const sendDataCurrentPhase = async (e, event) => {
    const selectedPhase = document.querySelector('input[name="'+event+'_phase"]:checked').getAttribute('data-phase');
    console.log(selectedPhase);
    e.preventDefault();
    await setPhase(event,selectedPhase);
    showAlert(event+'_current-alert-success');
}

const checkRadiosPhase = async (event) => {
    const currentPhase = await getPhase(event);
    console.log(event+'_'+currentPhase);
    document.getElementById(event+'_'+currentPhase).checked = true;
}
