<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\OrderDetail;

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
                'orders' => Order::with('orderDetails')->where('id_customer', '=', auth()->user()->id)->get()
            ]);
        } else if (auth()->user()->role == 'admin') {
            return view('admin.transaction', [
                'title' => 'Transaction',
                'orders' => Order::with('orderDetails')->get()
            ]);
        } else if(auth()->user()->role == 'consignor') {
            return view('consignor.transaction'. [
                'title' => 'Transaction',
                'orders' => OrderDetail::with('order')->get() 
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
    public function store(StoreOrderRequest $request)
    {
        //
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
