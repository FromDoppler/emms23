// Show/Hide Biography Speaker

const btnsBio = document.querySelectorAll(".emms__calendar__list__item__card__btn-bio");
const btnBioHide = document.querySelectorAll(".emms__calendar__list__item__card__btn-bio-hide");
const classBioShow = "emms__calendar__list__item__card__bio--show";

btnsBio.forEach(btn => {
    btn.addEventListener("click", () => {
        hideAllBios();
        btn.parentNode.querySelector(".bio-speaker").classList.toggle(classBioShow);
    });
})

btnBioHide.forEach(btnHide => {
    btnHide.addEventListener("click", () => {
        btnHide.parentNode.classList.toggle(classBioShow);
    });
})

function hideAllBios() {
    document.querySelectorAll(".bio-speaker").forEach(bio => {
        bio.classList.remove(classBioShow);
    })
}
