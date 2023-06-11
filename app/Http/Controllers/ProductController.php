<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (auth()->user() != null) {
            if (auth()->user()->role == 'customer') {
                    return view('customer.catalog', [
                        'title' => 'Home',
                        'products' => Product::where('product_avail', 'Available')->get()
                    ]);
             
            } else if (auth()->user()->role == 'consignor') {
                return view('consignor.product', [
                    'title' => 'Product',
                    'products' => Product::all()->where('id_consignor' , '=', auth()->user()->id)
                ]);
            } else if (auth()->user()->role == 'admin') {
                return view('admin.product', [
                    'title' => 'Product',
                    'products' => Product::where('product_avail', 'Available')->get()
                ]);
            }
        } else {
            return view('guest.catalog', [
                'title' => 'Catalog',
                'products' => Product::where('product_avail', 'Available')->get()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('consignor.add_product', [
            'title' => 'Add Product'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $image = $request->file('product_image');
        $path =  $image->store('product_images');
        $data['product_avail'] = 'Available';

        Product::create([
            'id_consignor' => Auth::user()->id,
            'product_image' => $path,
            'product_name' => $data['product_name'],
            'product_desc' => $data['product_desc'],
            'product_price' => $data['product_price'],
            'product_avail' => $data['product_avail']
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('consignor.edit_product', [
            'title' => "Edit Product",
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required',
            'product_desc' => 'required',
            'product_avail' => 'required',
        ]);
        $image = $request->file('product_image');

        if ($image != null) {
            $path =  $image->store('product_images');
        }

        $data = $request->all();

        Product::where('id', '=', $product->id)->update([
            'product_image' => $path ?? $product->product_image, 
            'product_name' => $data['product_name'],
            'product_desc' => $data['product_desc'],
            'product_price' => $data['product_price'],
            'product_avail' => $data['product_avail']
        ]);

        return redirect('/consignor/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);

        return redirect()->back();
    }
}
