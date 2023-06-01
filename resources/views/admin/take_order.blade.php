@extends('layout.admin')

@section('css')
<link rel="stylesheet" href="{!! asset('assets/css/admin/take_order.css') !!}">
@endsection

@section('content')
<section class="cart">
    <div class="heading row">

        <h4>Take Order</h4>
    </div>
    <div class="divided"></div>
    <div class="cart-content">
        <div class="person-order">
            <div>
                <h3>ID Transaction : <span class="id-transaction">#TR001</span></h3>
            </div>
            <div>
                <h3>ID Customer : <span class="id-customer">#CR001</span></h3>
            </div>
            <div class="name-customer">
                <h3>Customer 1</h3>
            </div>
        </div>
        <div class="cart-box">
            <img src="../images/Easy No-bake Strawberry Cake with Biscuit Crumbles - Best of Vegan.jpg" alt=""
                class="cart-img">
            <div class="detail-box">
                <h2 class="cart-product-title">Strawberry Cake</h2>
                <div>
                    <h3>ID product : <span class="cart-product-id">#AA001</span></h3>
                </div>
                <div class="cart-price">Rp125000</div>
                <input type="number" min="1" value="1" class="cart-quantity" readonly>
            </div>
            <div class="decision">
                <button class="acc-cart">Accept</button>
                <button class="remove-cart">Remove</button>
            </div>
        </div>
    </div>
    <div class="total">
        <div class="total-title">Total</div>
        <div class="total-price">Rp125000</div>
    </div>
    <div class="divided"></div>
    <div class="cart-content">
        <div class="person-order">
            <div>
                <h3>ID Transaction : <span class="id-transaction">#TR002</span></h3>
            </div>
            <div>
                <h3>ID Customer : <span class="id-customer">#CR002</span></h3>
            </div>
            <div class="name-customer">
                <h3>Customer 2</h3>
            </div>
        </div>
        <div class="cart-box">
            <img src="../images/Chocolate Truffle Tart (gluten-free, dairy-free).jpg" alt="" class="cart-img">
            <div class="detail-box">
                <h2 class="cart-product-title">Chocolate Truffle Tart</h2>
                <div>
                    <h3>ID product : <span class="cart-product-id">#AA002</span></h3>
                </div>
                <div class="cart-price">Rp130000</div>
                <input type="number" min="1" value="1" class="cart-quantity" readonly>
            </div>
            <div class="decision">
                <button class="acc-cart">Accept</button>
                <button class="remove-cart">Remove</button>
            </div>
        </div>
        <div class="cart-box">
            <img src="../images/Easy No-bake Strawberry Cake with Biscuit Crumbles - Best of Vegan.jpg" alt=""
                class="cart-img">
            <div class="detail-box">
                <h2 class="cart-product-title">Strawberry Cake</h2>
                <div>
                    <h3>ID product : <span class="cart-product-id">#AA001</span></h3>
                </div>
                <div class="cart-price">Rp125000</div>
                <input type="number" min="1" value="1" class="cart-quantity" readonly>
            </div>
            <div class="decision">
                <button class="acc-cart">Accept</button>
                <button class="remove-cart">Remove</button>
            </div>
        </div>
        <div class="total">
            <div class="total-title">Total</div>
            <div class="total-price">Rp255000</div>
        </div>
    </div>
    <div class="divided"></div>
</section>
<br>
@endsection