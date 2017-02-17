@extends('layout')

@section('content')
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <h1>Registration</h1>
        <form id="registration" action="/register" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="password">Password Confirmation</label>
                <input type="password" class="form-control" id="passwordconfirm" name="passwordconfirm">
            </div>

            <button type="submit" name="submit" class="btn btn-default btn-primary">Register</button>
        </form>
        <br />
        <span class="text-center">
        Already Register? <a href="/login">Login</a>
    </span>
    </div>
    <div class="col-md-3"></div>

@stop