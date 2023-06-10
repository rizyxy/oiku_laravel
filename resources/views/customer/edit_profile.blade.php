@extends('layout.customer')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/customer/edit-profile.css') }}">
@endsection

@section('content')
<section class="main-body">
    <div class="Container">
        <h1>Edit Profile</h1>
<form action="/customer/update-profile/{{ auth()->user()->id }}" method="POST" enctype="multipart/form-data" >
    @method('put')
    @csrf
    <input type="file" name="profile_pic" id="customer-img">
    <input type="text" name="name" id="customer-name" value="{{ auth()->user()->name }}" required>
    <input type="email" name="email" id="customer-email" value="{{ auth()->user()->email }}" required>
    <input type="number" name="phone" id="customer-phone" value="{{ auth()->user()->phone }}" required>
    <input type="text" name="address" id="customer-address" value="{{ auth()->user()->address }}" placeholder="Address" required>
    <button type="submit" class="all-btn btn-add-product">Save</button>
</form>
    </div>
</section>
<br>
@endsection