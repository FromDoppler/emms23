'use strict';

document.addEventListener('DOMContentLoaded', () => {

    const partnersExclusiveUl = document.getElementById('mediaPartenersExclusive');
    const partnersStartersUl = document.getElementById('mediaPartenersStarters');
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


    const printMediaPartners = (mediaPartners, container) => {

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
            if (flag === groupLength || (index === (mediaPartners.length - 1))) {
                flag = 0;
                groupsOfMediaPartners.push(groupOfPartners);
                groupOfPartners = [];
            }
            groupOfPartners.push(mediaPartner);
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
                    img.src = `/admin/aliados_media_partner/uploads/${mediaPartner.image_home}`;
                    img.alt = `${mediaPartner.alt_image_home}`;
                    li.appendChild(img);
                    container.appendChild(li);
                })
            }, 800 * index);
        })

    }

    getMediaPartners('exclusive').then(mediaPartnersExclusive => printMediaPartners(mediaPartnersExclusive, partnersExclusiveUl));
    getMediaPartners('starters').then(mediaPartnersStarters => printMediaPartners(mediaPartnersStarters, partnersStartersUl));


});