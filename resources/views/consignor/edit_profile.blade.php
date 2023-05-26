@extends('layout.consignor')

@section('css')
<link rel="stylesheet" href="{!! asset('assets/css/consignor/edit_profile.css') !!}">
@endsection

@section('content')
<section class="Container">
    <h1>Edit Profile</h1>
<form action="/consignor/update-profile" method="POST">
    @method('put')
    @csrf
    <input type="file" name="consignorImg" id="consignor-img" value="{{ asset('storage/'.$user->image) }}" required>
    <input type="text" name="consignorName" id="consignor-name" value="{{ auth()->user()->name }}" required>
    <input type="text" name="consignorEmail" id="consignor-email" value="{{ auth()->user()->email }}" required>
    <input type="number" name="consignorPhone" id="consignor-phone" value="{{ auth()->user()->phone }}" required>
    <input type="password" name="consignorPass" id="consignor-pass" value="{{ auth()->user()->password}}" required>
    <button type="submit" class="all-btn btn-add-product">Save</button>
</form>
</section>
<br>
@endsection