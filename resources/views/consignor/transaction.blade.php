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
                    <th>Price</th>
                    <th>Total Price</th>
                </tr>
                @foreach ($orders as $order)
                    @php $rowCount = count($order->orderDetails); @endphp
                    @foreach ($order->orderDetails as $index => $detail)
                        <tr>
                            @if ($index == 0)
                                <td class="id-transaction" rowspan="{{ $rowCount }}">
                                    <h3>{{ $order->order_id }}</h3>
                                </td>
                                <td class="id-customer" rowspan="{{ $rowCount }}">
                                    <h3>{{ $order->id_customer }}</h3>
                                </td>
                                <td class="order-time" rowspan="{{ $rowCount }}">
                                    <h3>{{ $order->created_at }}</h3>
                                </td>
                            @endif
                            <td class="name-product">
                                <h3>{{ $detail->product->product_name }}</h3>
                            </td>
                            <td class="quantity">
                                <h3>{{ $detail->quantity }}</h3>
                            </td>
                            <td class="price-product">
                                <h3>Rp {{ $detail->subtotal }}</h3>
                            </td>
                            @if ($index === 0)
                                <td class="price-total" rowspan="{{ $rowCount }}">
                                    <h3>Rp {{ $order->total }}</h3>
                                </td>
                            @endif
                        </tr>
                        <hr>
                        @endforeach
                    @endforeach
            </table>
        </div>
    </section>
    <br>
@endsection
