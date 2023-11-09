export const getErrors = async () => {
    const getErrorsUrl = "/adm23/server/modules/doppler_list_errors/getDopplerListErrors.php";
    const response = await fetch(
        getErrorsUrl
    );
    const result = await response.json();
    return result;
};
