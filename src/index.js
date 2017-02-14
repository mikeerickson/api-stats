/*global require, module*/

const pkgInfo   = require('../package.json');
const messenger = require('cd-messenger');
const core      = require('cd-core');

messenger.info('=== ' + pkgInfo.name + ' v' + pkgInfo.version + ' ===');


let items = $('.btn-endpoint');
$('.btn-endpoint').on('click', (evt) => {
	evt.preventDefault();
	handleRequest(evt);
});

function handleRequest(evt) {

	// convert this to baseURL (remove up to endpoint)
	let baseURL = 'http://' + extractDomain(evt.target.baseURI) + '/api/v1/';

	let req = evt.target.getAttribute('x-data-request');
	if(!req) {
		req = evt.target.innerHTML;
	}

	// do not globally lowercase, causes issues with `sqlite` database (case-sensitivity)
	// let url = baseURL + req.toLowerCase();
  let url = baseURL + req;

	url = addQueryStringItem(url, 'token=c3be77b4-c9f1-3109-8729-e6704c93ef41');
	url = addQueryStringItem(url, 'limit=3');
	url = addQueryStringItem(url, 'debug=true');

	if ((/POST|PUT|PATCH|DELETE/.test(req))) {
		$('#response')
			.html(req + ' Action Not Supported In Demo')
			.removeClass('hide')
			.addClass('show');
	}
	else {
		$.get(url, (data) => {
			let output = JSON.stringify(data, null, 2);
			output = syntaxHighlight(output);
			$('#response')
				.html(output)
				.removeClass('hide')
				.addClass('show');
		});
	}

}

// UTILS

function addQueryStringItem(req, item) {
	return req += (req.indexOf('?') > 0) ? '&' + item : '?' + item;
}

function syntaxHighlight(json) {
	json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
	return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
		var cls = 'number';
		if (/^"/.test(match)) {
			if (/:$/.test(match)) {
				cls = 'key';
			} else {
				cls = 'string';
			}
		} else if (/true|false/.test(match)) {
			cls = 'boolean';
		} else if (/null/.test(match)) {
			cls = 'null';
		}
		return '<span class="' + cls + '">' + match + '</span>';
	});
}

function extractDomain(url, options = {removePort: false}) {
	var domain;
	//find & remove protocol (http, ftp, etc.) and get domain
	if (url.indexOf("://") > -1) {
		domain = url.split('/')[2];
	}
	else {
		domain = url.split('/')[0];
	}

	//find & remove port number
	if(options.removePort) {
		domain = domain.split(':')[0];
	}

	return domain;
}