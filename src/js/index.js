/*global require, Vue, bootbox */

const pkgInfo   = require('../../package.json');
const messenger = require('cd-messenger');
const axios     = require('axios');
const moment    = require('moment');
const flash     = require('./flash');
const msg       = require('cd-messenger');

const admin     = require('./admin');
const endpoint  = require('./endpoint');

messenger.success(' === ' + pkgInfo.appName + ' v' + pkgInfo.version + ' === ');

// Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
  delimiters: ['{%', '%}'],
  el: '#v-app',
  data: {
    version: pkgInfo.version,
    appName: pkgInfo.appName
  },
  methods: {
    getVersion: () => {
      return this.version;
    },
    getAppName: () => {
      return this.appName;
    },
    helloWorld: () => {
      msg.success(' === Hello World from v-app instance ===');
    },
    updateToken: (e) => {
      updateToken(e);
    },
    deleteCacheItem: (e) => {
      bootbox.confirm('Are you sure you would like to delete this item?', (result) => {
        if (result) {
          admin.deleteCacheItem(e);
        }
      });
    }
  },
  computed: {
    getVersion: function () {
      return this.version;
    }
  },
  mounted() {
    msg.success(' === Vue App Ready === ');
  }
});

function updateToken(e) {
  let email = $('#email').val();
  axios.get('/resetToken/' + email)
    .then((results) => {
      $('#token').text(results.data.token);
      let expireDate = moment(new Date(results.data.expires))
        .format('YYYY-MM-DD hh:mm A');
      $('#expires').text(expireDate);
      flash.add('Token Updated Successfully','success', true);
    })
    .catch((error) => {
      messenger.error(error);
    });
}


