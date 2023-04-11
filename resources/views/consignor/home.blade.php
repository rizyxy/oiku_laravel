@extends('layout.consignor')

@section('css')
<link rel="stylesheet" href="{!! asset('assets/css/consignor/product.css') !!}">
@endsection

@section('content')
<section class="main-body">
    <div class="heading row">
        <h4>Products</h4>
        <a href="/consignor/add-product">Add Product</a>
    </div>
    <div class="small-container cartpage">
        <table>
            <tr>
                <th >Id Product</th>
                <th >Added Time</th>
                <th >Image Product</th>
                <th >Name Product</th>
                <th >Description</th>
                <th >Price</th>
                <th> </th>
                <th> </th>
            </tr>
            @foreach ($products as $product)
            <tr>
                <td>
                    <input type="text" class="id-product" value="{{ $product->id }}" readonly>
                </td>
                <td >
                    <input type="datetime" class="added-time" value="{{ $product->timestamps }}" readonly>
                </td>
                <td>
                    <input type="image" class="image-product" readonly src="{{ $product->product_image }}">
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
                    <button class="crud-btn edit-user">Edit</button>
                </td>
                <td>
                    <form action="/consignor/delete/{{ $product->id }}" method="POST">
                        @method('delete')
                        @csrf
                        <button class="crud-btn del-user">Delete</button>
                    </form>
                </td>
            </tr>
            <hr>
            @endforeach
        </table>
    </div>
</section>
<br>
@endsection