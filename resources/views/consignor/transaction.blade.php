@extends('layout.consignor')

@section('css')
<link rel="stylesheet" href="{!! asset('assets/css/consignor/transaction.css') !!}">
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
                <th>Product Name</th>
                <th>Quantity</th>
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
                    <h3>{{ $order->created_at }}</h3>
                </td>
                <td>
                    <h3>{{ $order->product_name }}</h3>
                </td>
                <td>
                    <h3>{{ $order->quantity }}</h3>
                </td>
                <td class="price-product">
                    <h3>Rp {{ $order->subtotal }}</h3>
                </td>
            </tr>
            <hr>
            @endforeach            
        </table>
    </div>
</section>
<br>
@endsection