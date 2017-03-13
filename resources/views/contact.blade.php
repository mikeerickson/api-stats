@extends('layout')

@section('content')
    <div id="contact-us" class="contact-us">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div id="contact-form">
                <h1>Contact Us</h1>
                <form action="contact" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Please supply your name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Please supply email address">
                    </div>
                    <div class="form-group">
                        <label for="api_token">API Token (If available)</label>
                        <input type="text" class="form-control" id="token" name="api_token" placeholder="Please supply your API token if you have one">
                    </div>
                    <div class="form-group">
                        <label for="api_endpoint">Endpoint</label>
                        <input type="text" class="form-control" id="endpoint" name="api_endpoint" placeholder="Please supply endpoint if applicable">
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <p><i>If you have sample code please supply</i></p>
                        <textarea class="form-control" id="comment" name="comment" rows="8" placeholder="Please supply as much content as necessary"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@stop