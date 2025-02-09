<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('supplier', 'orderDetails')->get();
        return response()->json($orders);
    }

    public function store(Request $request)
    {
        $order = Order::create($request->all());
        return response()->json($order, 201);
    }

    public function show(Order $order)
    {
        return response()->json($order->load('supplier', 'orderDetails'));
    }

    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return response()->json($order);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json(null, 204);
    }
}
