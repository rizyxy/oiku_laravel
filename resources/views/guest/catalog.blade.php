@extends('layout.main')

@section('content')
<section class="catalog" id="catalog">

    <div class="heading">
        <h1>Catalog</h1>
    </div>

    <div class="box-container">
        @foreach ($products as $product)
        <div class="box">
            <img src="{{ asset('storage/'.$product->product_image)}}"
                alt="Strawberry Cake" class="product-img">
            <h2 class="product-title">{{ $product->product_name }}</h2>
            <p>{{ $product->product_desc }}</p>
            <span class="price">Rp {{ $product->product_price }}</span>
            <a href="/login" class="all-btn add-cart">Order Now</a>
        </div>
        @endforeach
    </div>
</section>
@endsection