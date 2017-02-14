@extends('layout')

@section('content')
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

    <script id="contact-form">

//        let inputs = document.querySelectorAll(".form-control");
//        inputs.forEach((item) => {
//        	 item.className += ' valid';
//          console.log(item);
//        });
//

    </script>

    <style id="contact-form">
        form > button.btn-default {

        }
        .error {
            border: 1px solid red;
        }
        .valid {
            border: 1px solid green;
        }
    </style>
@stop