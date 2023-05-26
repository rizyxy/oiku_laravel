@extends('layout.consignor')

@section('css')
<link rel="stylesheet" href="{!! asset('assets/css/consignor/add_product.css') !!}">
@endsection

@section('content')
<section class="Container">
    <h1>Add Product</h1>
<form action="/consignor/add-product/update-product" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="product_image" id="item-img" placeholder="Item Image" alue="{{ $product->product_image }}" required>
    <input type="text" name="product_name" id="item-name" placeholder="Item Name" value="{{ $product->product_name }}" required>
    <input type="text" name="product_desc" id="item-desc" placeholder="Item Description" value="{{ $product->product_desc }}" required>
    <input type="number" name="product_price" id="item-price" placeholder="Item Price" value="{{ $product->product_price }}" required>
    <button type="submit" class="all-btn btn-add-product">Update Product</button>
</form>
</section>
<br>
@endsection