/*global require, module*/

const pkgInfo   = require('../package.json');
const messenger = require('cd-messenger');

messenger.info('=== ' + pkgInfo.name + ' v' + pkgInfo.version + ' ===');

const baseURL = 'http://localhost:7000/api/v1/';

let items = $('.btn-endpoint');
$('.btn-endpoint').on('click', (evt) => {

	// convert this to baseURL (remove up to endpoint)
	let domain = evt.target.baseURI;
	evt.preventDefault();

	let req = evt.target.getAttribute('x-data-request');
	if(!req) {
		req = evt.target.innerHTML;
	}
	let url = baseURL + req.toLowerCase();

	url = addQueryStringItem(url, 'token=mkjbbtrsh10');
	url = addQueryStringItem(url, 'limit=3');
	url = addQueryStringItem(url, 'debug=true');

	if ((/POST|PUT|PATCH|DELETE/.test(req))) {
		$('#response').text(req + ' Action Not Supported In Demo');
	}
	else {
		$.get(url, (data) => {
			let output = JSON.stringify(data, null, 2);
			output = syntaxHighlight(output);
			$('#response').html(output);
		});
	}
});

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
