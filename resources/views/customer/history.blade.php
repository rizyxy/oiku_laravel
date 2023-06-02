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
        @foreach ($orders as $order)
        <tr>
            @foreach ($order->orderDetails as $detail)
            <td class="id-product">
                <h3>{{ $detail->product->id }}</h3>
            </td>
            <td class="order-time">
                <time datetime="{{ $order->timestamps }}">{{ $order->created_at }}</time>
            </td>
            <td>
                <div class="cartinfo">
                    <img src="{{ asset('storage/'.$detail->product->product_image) }}" alt="Blueberry Cake">
                    <div class="detail-product">
                        <h2>{{ $detail->product->product_name }}</h2>
                        <h3>Rp {{ $detail->product->product_price }}</h3>
                    </div>
                </div>
            </td>
            <td class="amount-item">{{ $detail->quantity }}</td>
            @endforeach
            <td class="price-product">
                <h3>Rp {{ $order->total }}</h3>
            </td>
        </tr>
        @endforeach
    </table>
</div>
</div>
@endsection