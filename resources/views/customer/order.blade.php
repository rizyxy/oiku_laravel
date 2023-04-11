@extends('layout.customer')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/customer/order.css') }}">
@endsection

@section('content')
<section class="cart">
    <div class="heading row">
        <h4>Your Order</h4>
        <a href="/customer/catalog">Add Order</a>
    </div>
    <div class="cart-content" id="cart-content">

    </div>
    <div class="total">
        <div class="total-title">Total</div>
        <div class="total-price" id="total-price">Rp0</div>
    </div>
    <button type="button" class="all-btn order-btn" onclick="showCart()">Buy Now</button>
</section>
@endsection