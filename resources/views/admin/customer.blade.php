@extends('layout.admin')

@section('css')
<link rel="stylesheet" href="{!! asset('assets/css/admin/consignor.css') !!}">
@endsection

@section('content')
<section class="main-body">
    <div class="heading row">
        <h4>Customer List</h4>
    </div>
    <div class="cartpage user-info">
        <table>
            <tr>
                <th>Id Consignor</th>
                <th>Register Time</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th> </th>
                <th> </th>
            </tr>
            @foreach ($customers as $customer)
            <tr>
                <td class="fill" >
                    <input type="text" name="Id-user" id="Id-user" value="{{ $customer->id }}" readonly>
                </td>
                <td class="fill">
                    <input type="datetime" name="register-time" id="register-time" value="{{ $customer->timestamps }}" readonly>
                </td>
                <td class="fill">
                    <input type="text" name="name-user" id="name-user" value="{{ $customer->name }}" readonly>
                </td>
                <td class="fill">
                    <input type="email" name="email-user" id="email-user" value="{{  $customer->email }}" readonly>
                </td>
                <td class="fill">
                    <input type="text" name="address-user" id="address-user" value="{{  $customer->address }}" readonly>
                </td>
                <td class="fill">
                    <button class="crud-btn edit-user">Edit</button>
                </td>
                <td class="fill">
                    <button class="crud-btn del-user">Delete</button>
                </td>
            </tr>
            @endforeach

        </table>
    </div>


</section>
<br>
@endsection