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
        <img class="prof-img" src="../images/562ebed9cd49b9a09baa35eddfe86b00.jpg"><br>
        <table>
            <tr>
                <td class="label"><label>Nama</label></td>
                <td class="equals">:</td>
                <td class="input">
                    <input class="fill" type="text" name="nama" id="nama" value="{{ Auth::user()->name }}" readonly><br>
                </td>
            </tr>
            <tr>
                <td class="label"><label>ID</label></td>
                <td class="equals">:</td>
                <td class="input">
                    <input class="fill" type="text" name="nama" id="nama" value="{{ Auth::user()->id }}" readonly><br>
                </td>
            </tr>
            <tr>
                <td class="label"><label>Email</label></td>
                <td class="equals">:</td>
                <td class="input">
                    <input class="fill" type="text" name="email" id="email" value="{{ Auth::user()->email }}" readonly
                         ><br>
                </td>
            </tr>
        </table>
    </form>
    <div>
        <a href="dash-cust-editProfile.html"><button class="edit-prof">Edit Profile</button></a>
    </div>
</section>
@endsection