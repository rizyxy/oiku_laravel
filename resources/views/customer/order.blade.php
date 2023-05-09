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
        @if (isset($cart))
        @foreach ($cart as $id => $item)
        <div class="cart-box">
            <img src="{{ asset('storage/'.$item['product']->product_image)}}" alt="" class="cart-img">
            <div class="detail-box">
                <h2 class="cart-product-title">{{ $item['product']->product_name }}</h2>
                <div class="cart-price">{{ $item['product']->product_price }}</div>
                <form action="/customer/cart" method="post">
                    @method('put')
                    @csrf
                    <input type="text" name="id" value="{{ $item['product']->id }}" hidden>
                    <input type="number" name="quantity" min="1" value="{{ $item['quantity'] }}" onchange="this.form.submit()" class="cart-quantity"></div>
                </form>
                <form action="/customer/cart" method="post">
                    @csrf
                    @method('delete')
                    <input type="text" name="id" value="{{ $item['product']->id }}" hidden>
                    <button class="remove-cart" type="submit">Remove</button>
                </form>
            </div>
        </div>
        @endforeach
        @else
        <p>Empty</p>
        @endif
    </div>
    <div class="total">
        <div class="total-title">Total</div>
        @if (isset($cart))
        <div class="total-price" id="total-price">Rp {{ array_sum(array_map(function($item) { return $item['product']->product_price * $item['quantity']; }, $cart)) }}</div>
        @else
        <div class="total-price" id="total-price">Rp 0</div>
        @endif
    </div>
    <form action="/customer/cart/buy" method="post">
        @csrf
        <button class="all-btn order-btn" type="submit">Buy Now</button>
    </form>
</section>
@endsection