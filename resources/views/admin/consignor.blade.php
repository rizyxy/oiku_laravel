@extends('layout.admin')

@section('css')
<link rel="stylesheet" href="{!! asset('assets/css/admin/tableing.css') !!}">
@endsection

@section('content')
<section class="main-body">
    <div class="heading row">
        <h4>Consignor List</h4>
        <a href="add-consignor">Add Consignor</a>
    </div>
    <div class="cartpage user-info">
        <table>
            <tr>
                <th>Id Consignor</th>
                <th>Register Time</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
            </tr>
            @foreach ($consignors as $consignor)
            <tr>
                <td class="fill" >
                    <input type="text" name="Id-user" id="Id-user" value="{{ $consignor->id }}" readonly>
                </td>
                <td class="fill">
                    <input type="datetime" name="register-time" id="register-time" value="{{ $consignor->created_at }}" readonly>
                </td>
                <td class="fill">
                    <input type="text" name="name-user" id="name-user" value="{{ $consignor->name }}" readonly>
                </td>
                <td class="fill">
                    <input type="email" name="email-user" id="email-user" value="{{  $consignor->email }}" readonly>
                </td>
                <td class="fill">
                    <input type="text" name="phone-user" id="phone-user" value="{{  $consignor->phone }}" readonly>
                </td>
                <td class="fill">
                    <input type="text" name="address-user" id="address-user" value="{{  $consignor->address }}" readonly>
                </td>
            </tr>
            @endforeach

        </table>
    </div>


</section>
<br>
@endsection