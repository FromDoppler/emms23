'use strict';

document.addEventListener('DOMContentLoaded', () => {

    const endPoint = '../services/getMediaPartners.php';



    const getMediaPartners = async (partnerType) => {

        const type = { 'type': partnerType }
        const params = {
            "method": "POST",
            "headers": {
                "Content-Type": "application/json"
            },
            "body": JSON.stringify(type)
        }
        const response = await fetch(endPoint, params);
        const mediaPartners = await response.json();
        return mediaPartners;
    }


    const printMediaPartners = (mediaPartners) => {
        const partnersStartersUl = document.getElementById('mediaPartenersStarters');

        // This function divides the entire group of mediaPartners into subgroups
        // to generate less load on the front when doing so many image requests
        let groupLength;
        let groupsOfMediaPartners = [];
        let flag = 0;
        let groupOfPartners = [];

        // We get a length for the subgroups of mediaPartners
        if (mediaPartners.length % 2 === 0) {
            groupLength = Math.ceil((mediaPartners.length) / 6)
        } else {
            groupLength = Math.ceil((mediaPartners.length) / 5);
        }

        // We generate the subgroups
        mediaPartners.forEach((mediaPartner, index) => {
            groupOfPartners.push(mediaPartner);
            if (flag === groupLength || (index === (mediaPartners.length - 1))) {
                flag = 0;
                groupsOfMediaPartners.push(groupOfPartners);
                groupOfPartners = [];
            }
            flag++;
        });

        // We send the subgroups to the front
        groupsOfMediaPartners.forEach((group, index) => {

            setTimeout(() => {
                group.forEach(mediaPartner => {
                    const li = document.createElement('li');
                    li.classList.add('emms__fade-in-animation');
                    li.classList.add('emms__companies__list__item');
                    const img = document.createElement('img');
                    img.src = `./adm23/server/modules/sponsors/uploads/${mediaPartner.logo_company}`;
                    img.alt = `${mediaPartner.alt_logo_company}`;
                    li.appendChild(img);
                    partnersStartersUl.appendChild(li);
                })
            }, 800 * index);
        })

    }

    getMediaPartners('starters').then(mediaPartnersStarters => printMediaPartners(mediaPartnersStarters));


});
