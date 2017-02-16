/*global require, module*/

const axios = require('axios');
const $     = require('jquery');

let endpoint = {
	init: () => {
		$('.btn-endpoint').on('click', (evt) => {
			evt.preventDefault();
			endpoint.handleRequest(evt);
		});
	},
	addQueryStringItem: (req, item) => {
		return req += (req.indexOf('?') > 0) ? '&' + item : '?' + item;
	},
	handleRequest: (evt) => {
		// convert this to baseURL (remove up to endpoint)
		let baseURL = 'http://' + endpoint.extractDomain(evt.target.baseURI) + '/api/v1/';

		let req = evt.target.getAttribute('x-data-request');
		if (!req) {
			req = evt.target.innerHTML;
		}

		// do not globally lowercase, causes issues with `sqlite` database (case-sensitivity)
		let url = baseURL + req;

		url = endpoint.addQueryStringItem(url, 'token=c3be77b4-c9f1-3109-8729-e6704c93ef41');
		url = endpoint.addQueryStringItem(url, 'debug=true');

		if ((/POST|PUT|PATCH|DELETE/.test(req))) {
			$('#response').html(req + ' Action Not Supported In Demo').removeClass('hide');
		}
		else {
			axios.get(url)
				.then((response) => {
					let output = endpoint.syntaxHighlight(JSON.stringify(response.data, null, 2));
					$('#response').html(output).removeClass('hide');
				})
				.catch((err) => {
					let errMsg = `Error:   ${err.response.data.error}\nMessage: ${err.response.data.message}`;
					$('#response').html(errMsg).removeClass('hide');
				});
		}

	},
	syntaxHighlight: (json) => {
		json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
		return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
			var cls = 'number';
			if (/^"/.test(match)) {
				if (/:$/.test(match)) {
					cls = 'key';
				}
				else {
					cls = 'string';
				}
			}
			else if (/true|false/.test(match)) {
				cls = 'boolean';
			}
			else if (/null/.test(match)) {
				cls = 'null';
			}
			return '<span class="' + cls + '">' + match + '</span>';
		});
	},
	extractDomain: (url, options = {removePort: false}) => {
		var domain;
		//find & remove protocol (http, ftp, etc.) and get domain
		if (url.indexOf('://') > -1) {
			domain = url.split('/')[2];
		}
		else {
			domain = url.split('/')[0];
		}

		//find & remove port number
		if (options.removePort) {
			domain = domain.split(':')[0];
		}

		return domain;
	}
};

module.exports = endpoint;