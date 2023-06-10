@extends('layout.customer')

@section('content')
<section class="home" id="home">
    <div class="content">
        <h1>OIKU</h1>
        <h2>Taste the home made cakes that we provide</h2>
        <p>Various kinds of flavors are ready for you to taste.
            Find your own favorite dessert here!</p>
        <a href="#catalog" class="all-btn">Get it Now</a>
    </div>
    <div class="box">
        <img src="{{ asset('assets/images/various-cakes-supermarket-shelves-sale.jpg') }}" alt="Cake shelves">
    </div>
</section>

<section class="home" style="padding-bottom: 60px;">
    <div class="content-const">
        <h1>Interested in becoming a consignor?</h1>
        <p>Become a consignor and let us sell your cakes, get all benefits from partnership</p>
        <a href="https://wa.link/5jgqzq" target="_blank" class="all-btn">Join</a>
    </div>
</section>

<section class="catalog" id="catalog">

    <div class="heading">
        <h1>Best Seller</h1>
    </div>

    <div class="box-container">
        @foreach ($products->take(4) as $product)
            <div class="box">
                <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->product_name }}"
                    class="product-img">
                <h2 class="product-title">{{ $product->product_name }}</h2>
                <p>{{ $product->product_desc }}</p>
                <div class="product-info">
                    <span class="price">Rp {{ $product->product_price }}</span>
                    <br>
                    <span class="sales">Total Sales: {{ $product->total_sales }}</span>
                    <br>
                    <form action="/customer/cart" method="post">
                        @csrf
                        <input type="text" name="id" value="{{ $product->id }}" hidden>
                        <button type="submit" class="all-btn add-cart">Add</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <br>
    <div class="heading">
        <h1>Catalog</h1>
        <p>We provide various types of delicious cakes and can be your choice with the best quality.</p>
        <br>
        <a href="/customer/catalog" class="all-btn">See More</a>
    </div>
</section>
@endsection