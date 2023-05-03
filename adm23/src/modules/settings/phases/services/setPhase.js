export const setPhase = async (currentEvent, selectedPhase, transition) => {
    try {
        const setPhaseUrl = '/adm23/server/modules/settings/setPhase.php';
        const formData = new FormData();
        formData.append("event", currentEvent);
        formData.append("phase", selectedPhase);
        formData.append("transition", transition);

        await fetch(setPhaseUrl, {
            method: "post",
            body: formData
        });
    } catch (error) {
        console.log(error);
    }
};
