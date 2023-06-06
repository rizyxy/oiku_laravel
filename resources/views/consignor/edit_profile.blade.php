@extends('layout.consignor')

@section('css')
<link rel="stylesheet" href="{!! asset('assets/css/consignor/form.css') !!}">
@endsection

@section('content')
<section class="main-body">
    <div class="Container">
        <h1>Edit Profile</h1>
<form action="/consignor/update-profile/{{ auth()->user()->id }}" method="POST">
    @method('put')
    @csrf
    <input type="file" name="profile_pic" id="consignor-img">
    <input type="text" name="name" id="consignor-name" value="{{ auth()->user()->name }}" required>
    <input type="text" name="email" id="consignor-email" value="{{ auth()->user()->email }}" required>
    <input type="number" name="phone" id="consignor-phone" value="{{ auth()->user()->phone }}" required>
    <input type="text" name="address" id="address" value="{{ auth()->user()->address }}" placeholder="Address" required>
    <button type="submit" class="all-btn btn-add-product">Save</button>
</form>
    </div>
    
</section>
<br>
@endsection