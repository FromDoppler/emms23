function getURLParam(searchedParam) {
	const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);
	return urlParams.get(searchedParam);

}

// Function to decode email
function fromHex(hex) {
	var str = '';
	for (var i = 0; i < hex.length; i += 2) {
		var v = parseInt(hex.substr(i, 2), 16);
		if (v) str += String.fromCharCode(v);
	}
	return str;
}



const getEncodeURLEmail = () => {
	const urlParamHash = getURLParam('dplrid')

	if (urlParamHash) {
		let urlEmailDecode = fromHex(urlParamHash);
		return urlEmailDecode;
	}

	return false;

}

const loadEmail = (urlEmailDecode) => {
	if (urlEmailDecode) {
		document.querySelectorAll('form').forEach(form => {
			form.querySelector('input[name="email"]').value = urlEmailDecode
		});
	};
}


export {
	getEncodeURLEmail,
	loadEmail
};