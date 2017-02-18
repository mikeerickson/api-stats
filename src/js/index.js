/*global require */

const pkgInfo   = require('../../package.json');
const messenger = require('cd-messenger');
const endpoint  = require('./endpoint');				// using via public/js/bundle.js
const home      = require('./home');	    		  // using via public/js/bundle.js

messenger.success(' === ' + pkgInfo.appname + ' v' + pkgInfo.version + ' === ');

Vue.component('example', require('./components/Example.vue'));

// const app = new Vue({
//   el: '#v-app'
// });
