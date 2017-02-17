@extends('layout')

@section('content')
    <div class="col-md-3">

    </div>

    <div class="col-md-6">
        <div id="login-form">
            <h1>Login</h1>
            <form action="/login" method="POST">

                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-default btn-primary">Login</button>
                <p>
                    <br />
                    If you don't have an account, please <a href="register">register</a> to gain full access.
                </p>
            </form>
        </div>
    </div>

    <div class="col-md-3"></div>
@stop