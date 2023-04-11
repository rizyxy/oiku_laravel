@extends('layout.admin')

@section('css')
<link rel="stylesheet" href="{!! asset('assets/css/admin/product.css') !!}">
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
                <th> </th>
                <th> </th>
            </tr>
            <tr>
                <td>
                    <input type="text" class="id-consignor" value="#01AA001">
                </td>
                <td>
                    <input type="text" class="id-product" value="#AA001">
                </td>
                <td >
                    <input type="datetime" class="added-time" value="2023-03-25 10:00">
                </td>
                <td>
                    <input type="image" class="image-product" src="../images/Easy No-bake Strawberry Cake with Biscuit Crumbles - Best of Vegan.jpg">
                </td>
                <td >
                    <input type="text" class="name-product" value="Stawberry Cake">
                </td>
                <td >
                    <input type="text" class="desc-product" value="Stawberry Cake With Biscuit Crumbles!">
                </td>
                <td class="price-product">
                    <input type="tel" class="price-product" value="Rp125000">
                </td>
                <td>
                    <button class="crud-btn edit-user">Edit</button>
                </td>
                <td>
                    <button class="crud-btn del-user">Delete</button>
                </td>
            </tr>
            <hr>
            <tr>
                <td>
                    <input type="text" class="id-consignor" value="#01AA001">
                </td>
                <td>
                    <input type="text" class="id-product" value="#AA002">
                </td>
                <td >
                    <input type="datetime" class="added-time" value="2023-03-25 10:00">
                </td>
                <td>
                    <input type="image" class="image-product" src="../images/Chocolate Truffle Tart (gluten-free, dairy-free).jpg">
                </td>
                <td >
                    <input type="text" class="name-product" value="Chocolate Truffle Tart">
                </td>
                <td >
                    <input type="text" class="desc-product" value="Gluten Free And Dairy Free">
                </td>
                <td class="price-product">
                    <input type="tel" class="price-product" value="Rp130000">
                </td>
                <td>
                    <button class="crud-btn edit-user">Edit</button>
                </td>
                <td>
                    <button class="crud-btn del-user">Delete</button>
                </td>
            </tr>
            <hr>
            <tr>
                <td>
                    <input type="text" class="id-consignor" value="#01AA001">
                </td>
                <td>
                    <input type="text" class="id-product" value="#AA003">
                </td>
                <td >
                    <input type="datetime" class="added-time" value="2023-03-25 10:00">
                </td>
                <td>
                    <input type="image" class="image-product" src="../images/Blueberry Cake.jpg">
                </td>
                <td >
                    <input type="text" class="name-product" value="Blueberry Cake">
                </td>
                <td >
                    <input type="text" class="desc-product" value="Blueberry Cake With Raspberry">
                </td>
                <td class="price-product">
                    <input type="tel" class="price-product" value="Rp110000">
                </td>
                <td>
                    <button class="crud-btn edit-user">Edit</button>
                </td>
                <td>
                    <button class="crud-btn del-user">Delete</button>
                </td>
            </tr>
            <hr>
            <tr>
                <td>
                    <input type="text" class="id-consignor" value="#01AA001">
                </td>
                <td>
                    <input type="text" class="id-product" value="#AA004">
                </td>
                <td >
                    <input type="datetime" class="added-time" value="2023-03-25 10:00">
                </td>
                <td>
                    <input type="image" class="image-product" src="../images/Matcha and Mint.jpg">
                </td>
                <td >
                    <input type="text" class="name-product" value="Matcha Cake">
                </td>
                <td >
                    <input type="text" class="desc-product" value="Matcha and Mint Cake">
                </td>
                <td class="price-product">
                    <input type="tel" class="price-product" value="Rp150000">
                </td>
                <td>
                    <button class="crud-btn edit-user">Edit</button>
                </td>
                <td>
                    <button class="crud-btn del-user">Delete</button>
                </td>
            </tr>
            <hr>
        </table>
    </div>
</section>
<br>
@endsection