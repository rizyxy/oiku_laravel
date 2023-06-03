<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == 'customer') {
            return view('customer.history', [
                'title' => 'History Order',
                'orders' => Order::with('orderDetails.product')->where('id_customer', '=', auth()->user()->id)->get()
            ]);
        } else if (auth()->user()->role == 'admin') {
            return view('admin.transaction', [
                'title' => 'Transaction',
                'orders' => Order::with('orderDetails')->get()
            ]);
        } else if(auth()->user()->role == 'consignor') {
            return view('consignor.transaction', [
                'title' => 'Transaction',
                'orders' => Order::with('orderDetails.product')
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
        if (auth()->user()->role == 'customer') {
            return view('customer.order', [
                'title' => 'Order'
            ]);
        } else if (auth()->user()->role == 'consignor') {
            return view('admin.take_order', [
                'title' => 'Take Order'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get the authenticated user
        $user = auth()->user();

        // Get the cart items from the session
        $cart = $request->session()->get('cart', []);

        // Calculate the total price of the order
        $totalPrice = 0;
        foreach ($cart as $id => $item) {
            $totalPrice += $item['product']->product_price * $item['quantity'];
        }

        // Create a new order and save it to the database
        $order = new Order();
        $order->id_customer = $user->id;
        $order->total = $totalPrice;
        $order->save();

        // Loop through the items in the cart and create new order detail records
        foreach ($cart as $id => $item) {
            $product = $item['product'];

            // Create a new order detail record and save it to the database
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $product->id;
            $orderDetail->quantity = $item['quantity'];
            $orderDetail->subtotal = $product->product_price * $item['quantity'];
            $orderDetail->save();
        }

        // Clear the cart items from the session
        $request->session()->forget('cart');

        // Redirect to the order confirmation page
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('customer.history', [
            'title' => 'Order History'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
