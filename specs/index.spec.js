/*global require, describe, it */

const chai    = require('chai');
const chalk   = require('chalk');
const msg     = require('cd-messenger');
const pkgInfo = require('../package.json');

const expect = chai.expect;
const should = chai.should();

const app = require('../src/index');

describe('api-stats app', () => {
    it('should contain name', () => {
      expect(app.name()).to.equal(pkgInfo.name);
		});
		it('should contain version', () => {
			expect(app.version()).to.equal(pkgInfo.version);
		});
});


