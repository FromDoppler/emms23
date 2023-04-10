export const getPhase = async (currentEvent) => {
    try {
        const getPhaseUrl = "/adm23/server/modules/settings/getPhase.php?";
        const response = await fetch(
            getPhaseUrl +
            new URLSearchParams({
                event: currentEvent,
            })
        );
        const result = await response.json();
        return result;
    } catch (error) {
        console.log(error);
    }
};
