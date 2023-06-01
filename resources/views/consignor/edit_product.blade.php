@extends('layout.consignor')

@section('css')
<link rel="stylesheet" href="{!! asset('assets/css/consignor/form.css') !!}">
@endsection

@section('content')
<section class="main-body">
    <div class="Container">
        <h1>Edit Product</h1>
<form action="/consignor/add-product/update-product" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="product_image" id="item-img" placeholder="Item Image" alue="{{ $product->product_image }}" required>
    <input type="text" name="product_name" id="item-name" placeholder="Item Name" value="{{ $product->product_name }}" required>
    <input type="text" name="product_desc" id="item-desc" placeholder="Item Description" value="{{ $product->product_desc }}" required>
    <input type="number" name="product_price" id="item-price" placeholder="Item Price" value="{{ $product->product_price }}" required>
    <div class="drop-down">
        <label for="Availability">Availability : </label>
        <select id="item_avail" name="item_avail" required>
          <option value="available">Available</option>
          <option value="not-available">Not Available</option>
        </select>
      </div>
    <button type="submit" class="all-btn btn-add-product">Update Product</button>
</form>
    </div>
    
</section>
<br>
@endsection