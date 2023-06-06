<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index() {
        return view('customer.order', [
            'title' => 'Order',
            'cart' => session()->get('cart')
        ]);
    }

    public function add(Request $request) {

        $request->validate([
            'id' => 'required'
        ]);

        $id = $request->get('id');

        $product = Product::find($id);
        $cart = session()->get('cart');
        if(!$cart) {
            $cart = [];
        }
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'product' => $product,
                'quantity' => 1
            ];
        }
        session()->put('cart', $cart);
        return redirect('/customer/order');

    }

    public function update(Request $request)
{
    $cart = session()->get('cart');

    $id = $request->get('id');
    $quantity = $request->get('quantity');

    if ($quantity > 0) {
        $cart[$id]['quantity'] = $quantity;
        session()->put('cart', $cart);
    } else {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }

    return redirect('/customer/order');
}

public function plus(Request $request)
{
    $cart = session()->get('cart');

    $id = $request->get('id');
    $quantity = $cart[$id]['quantity'] + 1;

    if ($quantity > 0) {
        $cart[$id]['quantity'] = $quantity;
        session()->put('cart', $cart);
    } else {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }

    return redirect('/customer/order');
}

public function minus(Request $request)
{
    $cart = session()->get('cart');

    $id = $request->get('id');
    $quantity = $cart[$id]['quantity'] - 1;

    if ($quantity > 0) {
        $cart[$id]['quantity'] = $quantity;
        session()->put('cart', $cart);
    } else {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }

    return redirect('/customer/order');
}

public function delete(Request $request)
{
    $cart = session()->get('cart');

    $id = $request->get('id');

    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }

    return redirect('/customer/order');
}

}
