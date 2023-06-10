@extends('layout.admin')

@section('css')
    <link rel="stylesheet" href="{!! asset('assets/css/admin/dash.css') !!}">
@endsection

@section('content')
    <section class="main-body">
        <div class="container">
            <div class="sub-container">
                <h1 class="title">TOTAL PRODUK</h1>
                <div class="sub-content">
                    <p class="isi">{{ $products->count() }}</p></div> 
            </div>
            <div class="sub-container">
                <h1 class="title">TOTAL PENJUALAN</h1>
                <div class="sub-content">
                    <p class="isi">{{ $orders->where('status', 'Accepted')->count() }}</p> 
                </div>
            </div>
            <div class="sub-container">
                <h1 class="title">TOTAL PRODUK TERJUAL</h1>
                <div class="sub-content">
                    <p class="isi">{{ $orders->where('status', 'Accepted')->sum(function ($order) {
                        return $order->orderDetails->sum('quantity');
                    }) }}</p> 
                </div>
            </div>
            <div class="sub-container">
                <h1 class="title">TOTAL PENDAPATAN</h1>
                <div class="sub-content">
                    <p class="isi">Rp {{ $orders->where('status','Accepted')->sum('total') }}</p> 
                </div>
            </div>
            <div class="sub-container">
                <h1 class="title">TOTAL CONSGINOR</h1>
                <div class="sub-content">
                    <p class="isi">{{ $consignors }}</p></div> 
            </div>
            <div class="sub-container">
                <h1 class="title">TOTAL CUSTOMER</h1>
                <div class="sub-content">
                    <p class="isi">{{ $customers }}</p>
                </div> 
            </div>
        </div>
    </section>

    <section class="catalog" id="catalog">
        <div class="heading">
            <h1>ALL PRODUCT</h1>
        </div>
        <div class="box-container">
            @foreach ($products as $product)
                <div class="box">
                    <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}" class="product-img">
                    <h2 class="product-title">{{ $product->product_name }}</h2>
                    <p>{{ $product->product_desc }}</p>
                    <span class="price">Rp {{ $product->product_price }}</span>
                </div>
            @endforeach
        </div>
    </section>
    <br>
@endsection
