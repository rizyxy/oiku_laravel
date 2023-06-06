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
            @foreach ($orders as $order)
            <tr>
                <td class="id-transaction">
                    <h3>{{ $order->id }}</h3>
                </td>
                <td class="id-customer">
                    <h3>{{ $order->id_customer }}</h3>
                </td>
                <td class="order-time">
                    <time datetime="{{ $order->created_at }}">{{ $order->created_at }}</time>
                </td>
                <td>
                    @foreach ($order->orderDetails as $detail)
                    <div class="cartinfo">
                        <img src="{{ asset('storage/'.$detail->product->product_image) }}" alt="Blueberry Cake">
                        <div class="detail-product">
                            <h2>{{ $detail->product->product_name }}</h2>
                            <h3 class="id-product">{{ $detail->product->id }}</h3>
                            <h3>Rp {{ $detail->subtotal }}</h3>
                            <small>Quantity : {{ $detail->quantity }}</small>
                        </div>
                    </div>
                    @endforeach
                </td>
                <td class="price-product">
                    <h3>Rp {{ $order->total }}</h3>
                </td>
            </tr>
            <hr>
            @endforeach
        
        </table>
    </div>
</section>
<br>
@endsection