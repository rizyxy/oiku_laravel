@extends('layout.customer')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/customer/history.css') }}">

@endsection

@section('content')
<div class="main-body">
    <div class="row">
        <h4>History Order</h4>
    </div>
<div class="cartpage">
    <table>
        <tr>
            <th>Id Product</th>
            <th>Order Time</th>
            <th>Detail Products</th>
            <th>Amount</th>
            <th>Price</th>
        </tr>
        <tr>
            <td class="id-product">
                <h3>#AA003</h3>
            </td>
            <td class="order-time">
                <time datetime="2023-03-25 10:00">value</time>
            </td>
            <td>
                <div class="cartinfo">
                    <img src="../images/Blueberry Cake.jpg" alt="Blueberry Cake">
                    <div class="detail-product">
                        <h2>Blueberry Cake</h2>
                        <h3>Rp110000</h3>
                    </div>
                </div>
            </td>
            <td class="amount-item">1</td>
            <td class="price-product">
                <h3>Rp110000</h3>
            </td>
        </tr>
      
        <tr>
            <td class="id-product">
                <h3>#AA004</h3>
            </td>
            <td class="order-time">
                <time datetime="2023-03-25 10:00">value</time>
            </td>
            <td>
                <div class="cartinfo">
                    <img src="../images/Matcha and Mint.jpg" alt="Matcha Cake">
                    <div class="detail-product">
                        <h2>Matcha Cake</h2>
                        <h3>Rp150000</h3>
                    </div>
                </div>
            </td>
            <td class="amount-item">3</td>
            <td class="price-product">
                <h3>Rp450000</h3>
            </td>
        </tr>
    </table>
</div>
</div>
@endsection