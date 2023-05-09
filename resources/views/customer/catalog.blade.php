@extends('layout.customer')

@section('content')
<section class="catalog" id="catalog">

    <div class="heading">
        <h1>Shop Products</h1>
    </div>

    <div class="box-container">
        @foreach ($products as $product)
        <div class="box">
            <img src="{{ asset('storage/'.$product->product_image) }}"
                alt="Strawberry Cake" class="product-img">
            <h2 class="product-title">{{ $product->product_name }}</h2>
            <p>{{ $product->product_desc }}</p>
            <span class="price">Rp {{ $product->product_price }}</span>
            <form action="/customer/cart" method="post">
                @csrf
                <input type="text" name="id" value="{{ $product->id }}" hidden>
                <button type="submit" class="all-btn add-cart">Add</button>
            </form>
        </div>
        @endforeach
    </div>
</section>
@endsection