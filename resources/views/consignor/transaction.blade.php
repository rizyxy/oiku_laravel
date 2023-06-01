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
                    <time datetime="2023-03-25 10:00">{{ $order->timestamps }}</time>
                </td>
                <td>
                    @foreach ($orders->orderDetails as $detail)
                        @if ($detail->product->user_id === auth()->id())
                        <tr>
                            <td>{{ $detail->product->name }}</td>
                            <td>{{ $detail->product->price }}</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>{{ $detail->product->price * $detail->quantity }}</td>
                        </tr>
                        @endif
                    @endforeach
                </td>
                <td class="price-product">
                    <h3>Rp260000</h3>
                </td>
            </tr>
            <hr>
            @endforeach            
        </table>
    </div>
</section>
<br>
@endsection