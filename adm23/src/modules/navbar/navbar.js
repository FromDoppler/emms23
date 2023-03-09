const navbarUrl = "src/modules/navbar/navbar.html";
import { showSponsorsPage } from "./../sponsors/components/sponsors-list/sponsorsList.js";

export const shownavbar = async () => {
    const response = await fetch(navbarUrl);
    document.querySelector("nav").innerHTML = await response.text();

    addSponsorTypeLink("SPONSOR", "sponsorsLink");
    addSponsorTypeLink("STARTER", "starterLink");
    addSponsorTypeLink("PREMIUM", "premiumLink");
    collapseNavBar();
};

const addSponsorTypeLink = (currentSponsorType, sponsorLinkId) => {
    openNavOnClickMenu();
    const sponsorLink = document.getElementById(sponsorLinkId);
    sponsorLink.addEventListener("click", async () => {
        await showSponsorsPage(currentSponsorType);
        collapseNavBar();
    });
};

const openNavOnClickMenu = () => {
    const menu = document.getElementById("menuLink");
    menu.addEventListener("click", async () => {
        collapseNavBar();
    });
};

const collapseNavBar = () => {
    const menuToggle = document.getElementById("navbarNavAltMarkup");
    const bsCollapse = new bootstrap.Collapse(menuToggle);
    bsCollapse.toggle();
};
