export const setPhase = async (currentEvent, selectedPhase) => {
    try {
        const setPhaseUrl = '/adm23/server/modules/settings/setPhase.php';
        const formData = new FormData();
        formData.append("event", currentEvent);
        formData.append("phase", selectedPhase);

        await fetch(setPhaseUrl, {
            method: "post",
            body: formData
        });
    } catch (error) {
        console.log(error);
    }
};
