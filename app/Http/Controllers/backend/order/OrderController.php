<?php

namespace App\Http\Controllers\backend\order;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // order
    public function store(Request $request) {
        $request->validate([
            'customer' => 'required',
            'payment_method' => 'required',
            'amount' => 'required',
            'total' => 'required',
        ]);

        try {
            $order_id = Order::insertGetId([
                'customer_id' => $request->customer,
                'payment_method' => $request->payment_method,
                'total' => $request->total,
                'pay' => $request->amount,
                'due' => $request->total - $request->amount,
            ]);

            $cart = Cart::get();
                foreach ($cart as $carts) {
                    OrderItem::insert([
                        'order_id' => $order_id,
                        'product_id' => $carts->product_id,
                        'qty' => $carts->qty,
                        'price' => $carts->price,
                    ]);
                }
            Cart::truncate();
            return view('invoice');
        } catch (Exception $error) {
            session()->flash('type','danger');
            session()->flash('message',$error->getMessage());
            return redirect()->back();
        }
    }
}
