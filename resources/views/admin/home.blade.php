@extends('layout.admin')

@section('css')
    <link rel="stylesheet" href="{!! asset('assets/css/admin/dash.css') !!}">
@endsection

@section('content')
    <section class="main-body">
        <div class="container">
            <div class="sub-container">
                <h1 class="title">TOTAL PRODUK</h1>
                <p class="isi">{{ $products->count() }}</p> {{-- Count aLL Produk --}}
            </div>
            <div class="sub-container">
                <h1 class="title">TOTAL PENJUALAN</h1>
                <p class="isi">{{ $orders->count() }}</p> {{-- Count All Penjualan --}}
            </div>
            <div class="sub-container">
                <h1 class="title">TOTAL PENDAPATAN</h1>
                <p class="isi">Rp {{ $orders->sum('total') }}</p> {{-- Count Total Pendapatan dari penjualan --}}
            </div>
            <div class="sub-container">
                <h1 class="title">TOTAL CONSGINOR</h1>
                <p class="isi">{{ $consignors }}</p> {{-- Count Total Consignor --}}
            </div>
            <div class="sub-container">
                <h1 class="title">TOTAL CUSTOMER</h1>
                <p class="isi">{{ $customers }}</p> {{-- Count Total Customer --}}
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
        <a href="/admin/product"><button class="bottom-btn">Manage Your Product</button></a>
    </section>
    <br>
@endsection
