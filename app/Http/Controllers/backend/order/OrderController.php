<?php

namespace App\Http\Controllers\backend\order;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
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
                'qty' => $request->qty,
                'pay' => $request->amount,
                'due' => $request->total - $request->amount,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            $cart = Cart::get();
                foreach ($cart as $carts) {
                    OrderItem::insert([
                        'order_id' => $order_id,
                        'product_id' => $carts->product_id,
                        'qty' => $carts->qty,
                        'price' => $carts->price,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                }
            Cart::truncate();
            $customer = Customer::where('id',$request->customer)->first();
            $item = OrderItem::where('order_id',$order_id)->with('product')->get();
            $date = OrderItem::where('order_id',$order_id)->first();
            $order = Order::where('customer_id',$request->customer)->latest()->first();
            return view('invoice',compact('customer','item','order','date'));
        } catch (Exception $error) {
            session()->flash('type','danger');
            session()->flash('message',$error->getMessage());
            return redirect()->back();
        }
    }

    public function show($id) {
        $check = Order::where('id',$id)->first();
        $customer = Customer::where('id',$check->customer_id)->first();
        $item = OrderItem::where('order_id',$check->id)->with('product')->get();
        $date = OrderItem::where('order_id',$check->id)->first();
        return view('confirm',compact('customer','item','date'));
    }
}
