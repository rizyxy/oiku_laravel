@extends('layout.auth')

@section('content')
    <div class="Container" style="height: 550px">
        <h1>Create Account</h1>
        <form action="/store-user" method="POST">
            @csrf
            <input type ="text" name="name" placeholder="Full Name" id="name" required><br>
            <input type ="email" name="email" placeholder="Email" id="email" required><br>
            <input type ="tel" minLength="9" maxlength="13" name="phone" id="phone" placeholder="Phone Number" required><br>
            <input type ="password" name="password" placeholder="Password" id="password" required><br>
            <input type ="password" name="confirm-pass" placeholder="Confirm Password" id="confirm-pass" required><br>
            <small>At least 8 characters, better use symbols and numbers.</small>
            <button type="submit">Create</button>
            
        </form>
        <div class="dha">
            <p>By Clicking Create Account, you confirm that you accept out</p>
            <p><b>Terms and Privacy.</b></p>
        </div>
        <div class="fyp">
            <p>Already have an account? <span><a href="/login">Login</a></span></p>
        </div>
    </div>
@endsection