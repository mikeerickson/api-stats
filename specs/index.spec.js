/*global require, describe, it */

const chai  = require('chai');
const chalk = require('chalk');
const msg   = require('cd-messenger');

const expect = chai.expect;
const should = chai.should();

const app = require('../src/index');

describe('api-stats app', () => {
    it('should pass', () => {
    	expect(true).to.be.true;
		});
});