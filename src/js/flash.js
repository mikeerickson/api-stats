/*global module*/

const flash = {

  template: () => {

    // NOTE: The template is currently not used... For now, just place the template
    //       text in your markup and jQuery will extract and use

    return (
      `
        <div id="message-js" class="alert {type} hide">
            <span id="message-js-message">{message}</span>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
      `
    );
  },
  add: (message, type, autoClose = true) => {
    flash.clear(); // clear alert
    $('#message-js').addClass('alert-' + type)
      .removeClass('hide').addClass('show');
    $('#message-js-message').html(message);
    if (autoClose) {
      setTimeout(() => {
        flash.clear();
      }, 5000);
    }
  },

  clear: () => {
    $('#message-js').addClass('hide').removeClass('show')
      .removeClass('alert-danger')
      .removeClass('alert-success')
      .removeClass('alert-info')
      .removeClass('alert-warning');
  }

};

module.exports = flash;

