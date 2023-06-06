@extends('layout.consignor')

@section('css')
    <link rel="stylesheet" href="{!! asset('assets/css/consignor/dash.css') !!}">
@endsection
@section('content')
@php
    $penjualan = $orders->sum('quantity');
    $income = $orders->sum('subtotal');
@endphp
    <section class="main-body">
        <div class="container">
            <div class="sub-container">
                <h1 class="title">TOTAL PRODUK</h1>
                <p class="isi">{{ $products->count() }}</p> {{-- Count Produk Consignor --}}
            </div>
            <div class="sub-container">
                <h1 class="title">TOTAL PENJUALAN</h1>
                <p class="isi">{{ $penjualan }}</p> {{-- Count Penjualan by Item Consignor --}}
            </div>
            <div class="sub-container">
                <h1 class="title">TOTAL PENDAPATAN</h1>
                <p class="isi">Rp {{ $income }}</p> {{-- Count Total Pendapatan dari penjualan Item Consignor --}}
            </div>
        </div>

    </section>
    <section class="catalog" id="catalog">
        <div class="heading">
            <h1>YOUR PRODUCT</h1>
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
        <a href="/consignor/product"><button class="bottom-btn">Manage Your Product</button></a>
    </section>
    <br>
@endsection
