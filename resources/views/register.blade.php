@extends('layout')

@section('content')
    <h1>Registration Form</h1>
    <form id="registration">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Please supply your name">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Please supply email address">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Please supply desired password">
        </div>
        <div class="form-group">
            <label for="password">Password Confirmation</label>
            <input type="password" class="form-control" id="passwordconfirm" placeholder="Please confirm password">
        </div>


        <button type="submit" class="disabled btn btn-default">Register</button>
    </form>
    <br />
    <span class="text-center">
        Already Register? <a href="/login">Login</a>
    </span>
@stop