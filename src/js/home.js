/*global require, module*/

const pkgInfo = require('../../package.json');

let home = new Vue({
  delimiters: ['{%', '%}'],
  el: '#v-home',
  data: {
    version: pkgInfo.version,
    appName: pkgInfo.appName
  },
  methods: {
    getVersion2: () => {
      return this.version;
    },
    getAppName: () => {
      return this.appName;
    }
  },
  computed: {
    getVersion: function () {
      return this.version;
    }
  },
  mounted() {

  }
});

module.exports = home;
