/*global require, module*/

const Vue      = require('vue');
const axios    = require('axios');
const msg      = require('cd-messenger');
const TreeView = require('vue-json-tree-view');


Vue.use(TreeView);

let endpoint = new Vue({
	delimiters: ['{%', '%}'],
	el: '#v-resource',
	data: {
		result: ['Select Endpoint From List Above...'],
    tree: ['Select Endpoint From List Above...'],
    formData: { form: {fname: 'Mike'} }
	},
	methods: {
		handleRequest(evt, request) {
			let req = request;

			// convert this to baseURL (remove up to endpoint)
			let baseURL = 'http://' + this.extractDomain(evt.target.baseURI) + '/api/v1/';
			if (!req) {
				req = evt.target.innerHTML;
			}

			// do not globally lowercase, causes issues with `sqlite` database (case-sensitivity)
			let url = baseURL + req;

			url = this.addQueryStringItem(url, 'token=c3be77b4-c9f1-3109-8729-e6704c93ef41');
			url = this.addQueryStringItem(url, 'debug=true');

			if ((/POST|PUT|PATCH|DELETE/.test(req))) {
				this.result = req + ' Action Not Supported In Demo';
				this.tree = { data: [this.result] };
			}
			else {
				this.result = '';
				axios.get(url)
					.then((response) => {
						let output = (JSON.stringify(response.data, null, 2));
						// this.result = this.syntaxHighlight(output);
						this.tree = response.data;
						// this.formData = this.buildForm(response.data);
					})
					.catch((err) => {
						let errMsg = `Error:   ${err.response.data.error}\nMessage: ${err.response.data.message}`;
						this.result = errMsg;
					});
			}

		},
		addQueryStringItem(req, item) {
			return req += (req.indexOf('?') > 0) ? '&' + item : '?' + item;
		},
		extractDomain(url, options = {removePort: false}) {
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
		},
		syntaxHighlight(json) {
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
    buildForm(response) {
      return buildForm(response.data);
    }
	},
	mounted() {
		msg.success(' === Vue Container Ready === ');
	}
});

function buildForm(data) {

  if(data.length === 1) {
    let model  = _model(Object.keys(data[0]));
    let fields = _fields(Object.keys(data[0]));
    return {form: {}, model, fields};
  }
  else {
    return {form: {}, model: {}, fields: {}};
  }


  function _model(keys) {
    let record = {};
    keys.forEach((item) => {
      record[item] = '';
    });
    return record;
  }

  function _fields(keys) {
    let fields = [];
    for (let i = 0; i <= keys.length; i++) {
      fields.push({key: keys[i], type: 'input', required: true});
    }
    return fields;
  }

}

module.exports = endpoint;
