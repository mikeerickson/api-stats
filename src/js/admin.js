/*global module, require, bootbox*/

const axios = require('axios');
const flash = require('./flash');
const admin = {
  deleteCacheItem: (evt) => {
    let value = evt.target.dataset.key;
    axios.delete('/cache/' + value)
      .then((result) => {
        $(evt.target).parent().parent().remove();
        flash.add('<strong>Success: </strong>Cache item deleted successfully.','success');
      })
      .catch((error) => {
        flash.add('<strong>Error: </strong>An error occurred deleting cache item.','danger');
      });
  }
};

module.exports = admin;
