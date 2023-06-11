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
                    <th>Subtotal</th>
                    <th>Total</th>
                </tr>
                @foreach ($orders as $order)
                    @foreach ($order->orderDetails as $detail)
                        <tr class="fill">
                            @if ($loop->first)
                            <td class="id-transaction" rowspan="{{ $order->orderDetails->count()  }}">
                                <h3>{{ $order->id }}</h3>
                            </td>
                            <td class="id-customer" rowspan="{{ $order->orderDetails->count() }}">
                                <h3>{{ $order->id_customer }}</h3>
                            </td>
                            <td class="order-time" rowspan="{{ $order->orderDetails->count() }}">
                                <h3>{{ $order->created_at }}</h3>
                            </td>
                            @endif
                            <td class="name-product">
                                <h3>{{ $detail->product->product_name ?? "" }}</h3>
                            </td>
                            <td class="quantity">
                                <h3>{{ $detail->quantity }}</h3>
                            </td>
                            <td class="subtotal">
                                <h3>Rp {{ $detail->subtotal }}</h3>
                            </td>
                            @if ($loop->first)
                            <td class="total" rowspan="{{ $order->orderDetails->count() }}">
                                <h3>Rp {{ $order->orderDetails->sum('subtotal') }}</h3>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                @endforeach
            </table>
        </div>
    </section>
    <br>
@endsection
