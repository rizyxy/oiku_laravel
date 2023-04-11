@extends('layout.consignor')

@section('css')
<link rel="stylesheet" href="{!! asset('assets/css/consignor/edit_profile.css') !!}">
@endsection

@section('content')
<section class="Container">
    <h1>Edit Profile</h1>
<form action="dash-const-profile.html">
    @csrf
    <input type="text" name="consignorName" id="consignor-name" value="Consignor 1" required>
    <input type="text" name="consignorEmail" id="consignor-email" value="Consignor1@Gmail.Com" required>
    <input type="password" name="consignorPass" id="consignorPass" value="Password123" required>
    <button type="submit" class="all-btn btn-add-product">Save</button>
</form>
</section>
<br>
@endsection