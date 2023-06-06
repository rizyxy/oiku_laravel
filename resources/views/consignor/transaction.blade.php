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
                @php $processedOrderIds = []; @endphp
                @foreach ($orders as $order)
                    @php
                        $consignorProducts = $order->orderDetails->filter(function ($detail) {
                            return $detail->product->id_consignor === auth()->user()->id;
                        });
                        $rowCount = count($consignorProducts);
                        $totalSubtotal = $consignorProducts->sum('subtotal');
                    @endphp

                    @if ($rowCount > 0 && !in_array($order->id, $processedOrderIds))
                        @php
                            $processedOrderIds[] = $order->id;
                            $rowIndex = 0;
                        @endphp
                        @foreach ($consignorProducts as $index => $detail)
                            <tr class="fill">
                                @if ($rowIndex === 0)
                                    <td class="id-transaction" rowspan="{{ $rowCount }}">
                                        <h3>{{ $order->id }}</h3>
                                    </td>
                                    <td class="id-customer" rowspan="{{ $rowCount }}">
                                        <h3>{{ $order->id_customer }}</h3>
                                    </td>
                                    <td class="order-time" rowspan="{{ $rowCount }}">
                                        <h3>{{ $detail->created_at }}</h3>
                                    </td>
                                @endif
                                <td class="name-product">
                                    <h3>{{ $detail->product->product_name }}</h3>
                                </td>
                                <td class="quantity">
                                    <h3>{{ $detail->quantity }}</h3>
                                </td>
                                <td class="subtotal">
                                    <h3>Rp {{ $detail->subtotal }}</h3>
                                </td>
                                @if ($rowIndex === 0)
                                    <td class="total" rowspan="{{ $rowCount }}">
                                        <h3>Rp {{ "$totalSubtotal" }}</h3>
                                    </td>
                                @endif
                            </tr>
                            @php $rowIndex++; @endphp
                        @endforeach
                    @endif
                @endforeach
            </table>
        </div>
    </section>
    <br>
@endsection
