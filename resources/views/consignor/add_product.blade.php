@extends('layout.consignor')

@section('css')
<link rel="stylesheet" href="{!! asset('assets/css/consignor/add_product.css') !!}">
@endsection

@section('content')
<section class="Container">
    <h1>Add Product</h1>
<form action="/consignor/add-product/store-product" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="product_image" id="item-img" placeholder="Item Image" required>
    <input type="text" name="product_name" id="item-name" placeholder="Item Name" required>
    <input type="text" name="product_desc" id="item-desc" placeholder="Item Description" required>
    <input type="number" name="product_price" id="item-price" placeholder="Item Price" required>
    <button type="submit" class="all-btn btn-add-product">Add Product</button>
</form>
</section>
<br>
@endsection