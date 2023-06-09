@extends('layout.customer')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/customer/profile.css') }}">
@endsection

@section('content')
<section class="heading">
    <h3>Profile</h3>
</section>
<section class="main-body">
    <form class="profil">
        <img class="prof-img" src="{{ asset('storage/'.$user->profile_pic) }}" width="10%"><br>
        <table>
            <tr>
                <td class="label"><label>Nama</label></td>
                <td class="equals">:</td>
                <td class="input">
                    <input class="fill" type="text" name="nama" id="nama" value="{{ $user->name }}" readonly><br>
                </td>
            </tr>
            <tr>
                <td class="label"><label>ID</label></td>
                <td class="equals">:</td>
                <td class="input">
                    <input class="fill" type="text" name="nama" id="nama" value="{{ $user->id }}" readonly><br>
                </td>
            </tr>
            <tr>
                <td class="label"><label>Email</label></td>
                <td class="equals">:</td>
                <td class="input">
                    <input class="fill" type="text" name="email" id="email" value="{{ $user->email }}" readonly
                         ><br>
                </td>
            </tr>
            <tr>
                <td class="label"><label>Phone</label></td>
                <td class="equals">:</td>
                <td class="input">
                    <input class="fill" type="text" name="phone" id="phone" value="{{ $user->phone }}" readonly><br>
                </td>
            </tr>
            <tr>
                <td class="label"><label>Address</label></td>
                <td class="equals">:</td>
                <td class="input">
                    <input class="fill" type="text" name="address" id="address" value="{{ $user->address }}" readonly><br>
                </td>
            </tr>
        </table>
    </form>
    <div>
        <a href="/customer/edit-profile"><button class="edit-prof">Edit Profile</button></a>
    </div>
</section>
@endsection