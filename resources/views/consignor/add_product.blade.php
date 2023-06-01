@extends('layout.consignor')

@section('css')
<link rel="stylesheet" href="{!! asset('assets/css/consignor/form.css') !!}">
@endsection

@section('content')
<section class="main-body">
    <div class="Container">
        <h1>Add Product</h1>
<form action="/consignor/add-product/store-product" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="product_image" id="item-img" placeholder="Item Image" required>
    <input type="text" name="product_name" id="item-name" placeholder="Item Name" required>
    <input type="text" name="product_desc" id="item-desc" placeholder="Item Description" required>
    <input type="number" name="product_price" id="item-price" placeholder="Item Price" required>
    <div class="drop-down">
        <label for="Availability">Availability : </label>
        <select id="item_avail" name="item_avail" required>
          <option value="available">Available</option>
          <option value="not-available">Not Available</option>
        </select>
      </div>
    <button type="submit" class="all-btn btn-add-product">Add Product</button>
</form>
    </div>
    
</section>
<br>
@endsection