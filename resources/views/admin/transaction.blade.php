@extends('layout.admin')

@section('css')
<link rel="stylesheet" href="{!! asset('assets/css/admin/transaction.css') !!}">
@endsection

@section('content')
<section class="main-body">
    <div class="heading row">
        <h4>Transaction</h4>
    </div>
    <div class="small-container cartpage">
        <table>
            <tr>
                <th>Id Transaction</th>
                <th>Id Customer</th>
                <th>Order Time</th>
                <th>Detail Products</th>
                <th>Total Price</th>
            </tr>
            <tr>
                <td class="id-transaction">
                    <h3>#TR001</h3>
                </td>
                <td class="id-customer">
                    <h3>#CS001</h3>
                </td>
                <td class="order-time">
                    <time datetime="2023-03-25 10:00">2023-03-25 10:00</time>
                </td>
                <td>
                    <div class="cartinfo">
                        <img src="../images/Blueberry Cake.jpg" alt="Blueberry Cake">
                        <div class="detail-product">
                            <h2>Blueberry Cake</h2>
                            <h3 class="id-product">#AA003</h3>
                            <h3>Rp110000</h3>
                            <small>Quantity : 1</small>
                        </div>
                    </div>
                    
                </td>
                <td class="price-product">
                    <h3>Rp260000</h3>
                </td>
            </tr>
            <hr>
            <tr>
                <td class="id-transaction">
                    <h3>#TR002</h3>
                </td>
                <td class="id-customer">
                    <h3>#CS002</h3>
                </td>
                <td class="order-time">
                    <time datetime="2023-03-25 10:00">2023-03-25 10:00</time>
                </td>
                <td>
                    <div class="cartinfo">
                        <img src="../images/Chocolate Truffle Tart (gluten-free, dairy-free).jpg" alt="Chocolate Truffle">
                        <div class="detail-product">
                            <h2>Chocolate Truffle</h2>
                            <h3 class="id-product">#AA002</h3>
                            <h3>Rp130000</h3>
                            <small>Quantity : 2</small>
                        </div>
                    </div>
                </td>
                <td class="price-product">
                    <h3>Rp260000</h3>
                </td>
            </tr>
            
        </table>
    </div>
</section>
<br>
@endsection