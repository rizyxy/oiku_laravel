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
                    <th>Id Order</th>
                    <th>Order Time</th>
                    <th>Id Product</th>
                    <th>Detail Products</th>
                    <th>Amount</th>
                    <th>Price</th>
                    <th>Status</th>
                </tr>
                @foreach ($orders as $order)
                    @php $rowCount = count($order->orderDetails); @endphp
                    @foreach ($order->orderDetails as $index => $detail)
                        <tr>
                            @if ($index === 0)
                                <td class="id-order" rowspan="{{ $rowCount }}">
                                    <h3>{{ $detail->order_id }}</h3>
                                </td>
                                <td class="order-time" rowspan="{{ $rowCount }}">
                                    <h3>{{ $order->created_at }}</h3>
                               </td>
                            @endif
                            <td class="id-product">
                                <h3>{{ $detail->product->id }}</h3>
                            </td>
                            
                            <td>
                                <div class="cartinfo">
                                    <img src="{{ asset('storage/' . $detail->product->product_image) }}"
                                        alt="{{ $detail->product->product_name }}">
                                    <div class="detail-product">
                                        <h2>{{ $detail->product->product_name }}</h2>
                                        <h3>Rp {{ $detail->product->product_price }}</h3>
                                    </div>
                                </div>
                            </td>
                            <td class="amount-item">{{ $detail->quantity }}</td>
                            @if ($index === 0)
                                <td class="price-product" rowspan="{{ $rowCount }}">
                                    <h3>Rp {{ $order->total }}</h3>
                                </td>
                                <td class="status-product" rowspan="{{ $rowCount }}">
                                    <h3>{{ $order->status }}</h3>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @endforeach

            </table>
        </div>
    </div>
@endsection
