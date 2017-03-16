<div class="message">
    @if (session()->has('flash_notification.message'))
        <div class="alert alert-{{ session('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {!! session('flash_notification.message') !!}
        </div>
    @endif
    <div id="message-js" class="alert hide">
        <span id="message-js-message" style="font-weight: normal;">Javascript Message</span>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>
</div>