@extends('layout.admin')

@section('css')
<link rel="stylesheet" href="{!! asset('assets/css/consignor/form.css') !!}">
@endsection

@section('content')
<Section class="Container">
    <h1>Add Consignor</h1>
    <form action="">
        <input type="text" name="consignorName" id="consignor-name" placeholder="Consignor Name" required>
        <input type="email" name="consignorEmail" id="consignor-email" placeholder="Consignor Email" required>
        <input type="text" name="consignorAddress" id="consignor-address" placeholder="Consignor Address" required>
        <input type="password" name="consignorPass" id="consignor-pass" placeholder="Consignor Password" required>
        <button type="submit" class="all-btn btn-add-product">Add Consignor</button>
    </form>
</Section>
<br>
@endsection