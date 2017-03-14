/*global require */

const pkgInfo   = require('../../package.json');
const messenger = require('cd-messenger');
const endpoint  = require('./endpoint');				// using via public/js/bundle.js
const home      = require('./home');	    		  // using via public/js/bundle.js
const axios     = require('axios');
const moment    = require('moment');

messenger.success(' === ' + pkgInfo.appName + ' v' + pkgInfo.version + ' === ');

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
  el: '#v-account',
  data: {},
  methods: {
    updateToken: (e) => {
      e.preventDefault();
      let email = $('#email').val();
      axios.get('/resetToken/' + email)
        .then((results) => {
          $('#token').text(results.data.token);
          let expireDate = moment(new Date(results.data.expires))
            .format('YYYY-MM-DD hh:mm A');
          $('#expires').text(expireDate);
        })
        .catch((error) => {
          messenger.error(error);
        });

    }
  }
});
