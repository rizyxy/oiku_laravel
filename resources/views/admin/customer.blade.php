@extends('layout.admin')

@section('css')
<link rel="stylesheet" href="{!! asset('assets/css/admin/consignor.css') !!}">
@endsection

@section('content')
<section class="main-body">
    <div class="heading row">
        <h4>Consignor</h4>
        <a href="dash-admin-addConsignor.html">Add Consignor</a>
    </div>
    <div class="cartpage user-info">
        <table>
            <tr>
                <th>Id Consignor</th>
                <th>Register Time</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Password</th>
                <th> </th>
                <th> </th>
            </tr>
            <tr>
                <td class="fill" >
                    <input type="text" name="Id-user" id="Id-user" value="#01AA001" readonly>
                </td>
                <td class="fill">
                    <input type="datetime" name="register-time" id="register-time" value="2023-03-25 10:23" readonly>
                </td>
                <td class="fill">
                    <input type="text" name="name-user" id="name-user" value="Consignor 1" readonly>
                </td>
                <td class="fill">
                    <input type="email" name="email-user" id="email-user" value="consignor1@gmail.com" readonly>
                </td>
                <td class="fill">
                    <input type="text" name="addres" id="address" value="Surabaya" readonly>
                </td>
                <td class="fill">
                    <input type="password" name="pass-user" id="pass-user" value="password123" readonly>
                </td>
                <td class="fill">
                    <button class="crud-btn edit-user">Edit</button>
                </td>
                <td class="fill">
                    <button class="crud-btn del-user">Delete</button>
                </td>
            </tr>

        </table>
    </div>


</section>
<br>
@endsection