/*global module */

const FAIL_CLI_ICON = '✘';
const PASS_CLI_ICON = '✓';
const WARN_CLI_ICON = '♺';

const config = {
	icon: {
		fail: FAIL_CLI_ICON,
		pass: PASS_CLI_ICON,
		warn: WARN_CLI_ICON
	},
	scripts: {
		server: ['./**/*.php'],
		client: []
	}
};

module.exports = config;