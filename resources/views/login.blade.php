@extends('layout')

@section('content')
    <div id="login-form">
        <h1>Login</h1>
        <form>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Please supply email address">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password">
            </div>
            <button type="submit" class="btn btn-default">Login</button>
        </form>
    </div>

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