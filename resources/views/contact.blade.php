@extends('layout')

@section('content')
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div id="contact-form">
            <h1>Contact Us</h1>
            <form>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Please supply your name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Please supply email address">
                </div>
                <div class="form-group">
                    <label for="token">API Token (If available)</label>
                    <input type="text" class="form-control" id="token" placeholder="Please supply your API token if you have one">
                </div>
                <div class="form-group">
                    <label for="endpoint">Endpoint</label>
                    <input type="text" class="form-control" id="endpoint" placeholder="Please supply endpoint if applicable">
                </div>
                <div class="form-group">
                    <label for="comment">Comment</label>
                    <p><i>If you have sample code please supply</i></p>
                    <textarea class="form-control" id="comment" rows="8" placeholder="Please supply as much content as necessary"></textarea>
                </div>

                <button type="submit" class="disabled btn btn-default">Submit</button>
            </form>
        </div>
    </div>
    <div class="col-md-3"></div>
@stop