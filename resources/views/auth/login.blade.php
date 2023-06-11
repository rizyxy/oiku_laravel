@extends('layout.auth')
@section('css')
    <link rel="stylesheet" href="{!! asset('assets/css/auth/form.css') !!}">
@endsection
@section('content')
    <Section class="main-body">
        <div class="Container">
            <h1>Add Consignor</h1>
            <form id="loginForm" method="POST" action="/login">
                @csrf
                <input type="email" name="email" placeholder="Email" id="email-form"><br>
                <p style="color: red;" id="email-error"></p>
                <input type="password" name="password" placeholder="Password" id="pass-form"><br>
                <p style="color: red; font-size: x-small;" id="password-error"></p>
                <button type="submit">Log In</button>
            </form>
            <div class="fyp">

            </div>
            <div class="dha">
                <p>Don't have an account?</p>
                <form action="/register"><button>Create Account</button></form>

            </div>
        </div>
    </Section>
@endsection
