function confirmation (msg) {
	var result;
	if (window.confirm(msg)) {
		result = true;
	}
	else {
		result = false;
	}
	return result;
}