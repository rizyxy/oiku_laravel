@extends('layout.admin')

@section('css')
<link rel="stylesheet" href="{!! asset('assets/css/admin/form.css') !!}">
@endsection

@section('content')
<Section class="Container">
    <h1>Add Consignor</h1>
    <form action="/admin/add-consignor/store-consignor" method="POST">
        @csrf
        <input type ="text" name="name" placeholder="Consignor Name" id="name" required><br>
        <input type ="email" name="email" placeholder="Email" id="email" required><br>
        <input type ="tel" minLength="9" maxlength="13" name="phone" id="phone" placeholder="Phone Number" required><br>
        <input type ="text" name="address" placeholder="address" id="address" required><br>
        <input type ="password" name="password" placeholder="password" id="password" required><br>
        <input type ="password" name="confirm-pass" placeholder="Confirm Password" id="confirm-pass" required><br>
        <small>At least 8 characters, better use symbols and numbers.</small>
        <button type="submit">Add Consignor</button>
        
    </form>
</Section>
<br>
@endsection