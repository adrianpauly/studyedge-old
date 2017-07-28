
// Site routing

function getParameter(parameterName) {
    var result = null,
        tmp = [];
    location.search
    .substr(1)
        .split("&")
        .forEach(function (item) {
        tmp = item.split("=");
        if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
    });
    return result;
}

var modal = false,
	domain = window.location.protocol + '//' + window.location.hostname,
	path = window.location.pathname.split('/'),
	site_handles = new Array('fsu','other');
	is_home = (!path[1] || site_handles.indexOf(path[path.length-1]) != -1)  && !window.location.search,
	get_school = getParameter('school');
	stored_school = localStorage.getItem('school');

if (get_school == 'uf') {
	localStorage.setItem('school',get_school);
} else if (get_school == 'select') {
	modal = true;
} else if (is_home) {
	if (stored_school) {
		if(stored_school !== 'uf') {
			localStorage.clear();
			window.location.replace( domain + '/landing');
		}
	} else {
		// First visit
		window.location.replace( domain + '/landing');
	}
} else {
	// Check if path[1] is site handle or regular page
	if (site_handles.indexOf(path[1]) != -1) {
		localStorage.setItem('school',path[1]);
	}
}

jQuery(document).ready(function(){
	if(!window.mobilecheck() && modal) {
		console.log('triggering modal');
		openModal('change-school');
		jQuery('.logo').addClass('something');
	}
});