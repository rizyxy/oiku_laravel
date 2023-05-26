@extends('layout.customer')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/customer/edit-profile.css') }}">
@endsection

@section('content')
<section class="Container">
    <h1>Edit Profile</h1>
<form action="/customer/update-profile" method="POST">
    @method('put')
    @csrf
    <input type="file" name="consignorImg" id="customer-img" value="{{ asset('storage/'.$user->image) }}" required>
    <input type="text" name="name" id="customer-name" value="{{ auth()->user()->name }}" required>
    <input type="email" name="email" id="customer-email" value="{{ auth()->user()->email }}" required>
    <input type="number" name="phone" id="customer-phone" value="{{ auth()->user()->phone }}" required>
    <input type="password" name="pass" id="customer-pass" value="{{ auth()->user()->password}}" required>
    <button type="submit" class="all-btn btn-add-product">Save</button>
</form>
</section>
<br>
@endsection