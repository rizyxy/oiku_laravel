@extends('layout.admin')

@section('css')
<link rel="stylesheet" href="{!! asset('assets/css/admin/tableing.css') !!}">
@endsection

@section('content')
<section class="main-body">
    <div class="heading row">
        <h4>Products</h4>
    </div>
    <div class="small-container cartpage">
        <table>
            <tr>
                <th>Id Consignor</th>
                <th>Id Product</th>
                <th>Added Time</th>
                <th>Image Product</th>
                <th>Name Product</th>
                <th>Description</th>
                <th>Price</th>
                <th> Availability</th>
                <th> </th>
                <th> </th>
            </tr>
            @foreach ($products as $product)
            <tr>
                <td>
                    <input type="text" class="id-consignor" value="{{ $product->id_consignor }}" readonly>
                </td>
                <td>
                    <input type="text" class="id-product" value="{{ $product->id }}" readonly>
                </td>
                <td >
                    <input type="datetime" class="added-time" value="{{ $product->timestamps }}" readonly>
                </td>
                <td>
                    <input type="image" class="image-product" src="{{ asset('storage/'.$product->product_image) }}" readonly>
                </td>
                <td >
                    <input type="text" class="name-product" value="{{ $product->product_name }}" readonly>
                </td>
                <td >
                    <input type="text" class="desc-product" value="{{ $product->product_desc }}" readonly>
                </td>
                <td class="price-product">
                    <input type="tel" class="price-product" value="Rp {{ $product->product_price }}" readonly>
                </td>
                <td>
                    <input type="text" class="avail-product" value="{{ $product->product_avail }}" readonly>
                </td>
                <td>
                    <button class="crud-btn edit-user">Edit</button>
                </td>
                <td>
                    <button class="crud-btn del-user">Delete</button>
                </td>
            </tr>
            <hr>
            @endforeach
        </table>
    </div>
</section>
<br>
@endsection