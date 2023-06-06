@extends('layout.admin')

@section('css')
<link rel="stylesheet" href="{!! asset('assets/css/admin/take_order.css') !!}">
@endsection

@section('content')
<section class="cart">
    <div class="heading row">

        <h4>Take Order</h4>
    </div>
    <div class="divided"></div>
    @foreach ($orders as $order)
        <div class="cart-content">
            <div class="person-order">
                <div>
                    <h3>ID Transaction : <span class="id-transaction">{{ $order->id }}</span></h3>
                </div>
                <div>
                    <h3>ID Customer : <span class="id-customer">{{ $order->id_customer }}</span></h3>
                </div>
                <div class="name-customer">
                    <h3>Customer 2</h3>
                </div>
            </div>
        </div>
        @foreach ($order->orderDetails as $detail)
        <div class="cart-box">
            <img src="{{ asset('storage/'.$detail->product->product_image) }}" alt=""
                class="cart-img">
            <div class="detail-box">
                <h2 class="cart-product-title">{{ $detail->product->product_name }}</h2>
                <div>
                    <h3>ID product : <span class="cart-product-id">{{ $detail->product->id }}</span></h3>
                </div>
                <div class="cart-price">Rp {{ $detail->subtotal }}</div>
                <input type="number" min="1" value="{{ $detail->quantity }}" class="cart-quantity" readonly>
            </div>
            <div class="decision">
                <button class="acc-cart">Accept</button>
                <button class="remove-cart">Remove</button>
            </div>
        </div>
        @endforeach
        <div class="total">
            <div class="total-title">Total</div>
            <div class="total-price">Rp {{ $order->total }}</div>
        </div>
    </div>
    <div class="divided"></div>
    @endforeach
    <div class="cart-content">




</section>
<br>
@endsection