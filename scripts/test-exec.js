/*global require*/

var execa = require('execa');

execa("eslint", ["./src/**/*.js"], {
	env: {FORCE_COLOR: true}
}).then(result => {
	console.log(result.stdout);
});