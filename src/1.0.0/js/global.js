const clearUndefinedStorage = () => {
    if (localStorage.getItem('dplrid') === "undefined") {
        localStorage.clear();
    }
}

clearUndefinedStorage();
