<?php

namespace App\Http\Controllers\backend\cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // store
    public function store($id) {
        try {
            $check = Cart::where('product_id',$id)->first();
            if(!$check) {
                $product = Product::where('id',$id)->first();
                $store = new Cart();
                $store->product_id = $id;
                $store->price = $product->price;
                $store->qty = 1;
                $store->save();
                session()->flash('type','success');
                session()->flash('message','Product Add to cart');
                return redirect()->back();
            } else {
                session()->flash('type','danger');
                session()->flash('message','Product Already Add to cart');
                return redirect()->back();
            }
        } catch (Exception $error) {
            session()->flash('type','danger');
            session()->flash('message',$error->getMessage());
            return redirect()->back();
        }
    }

    // cart delete
    public function destroy($id) {
        try {
            $delete = Cart::where('id',$id)->first();
            $delete->delete();
            return redirect()->back();
        } catch (Exception $error) {
            session()->flash('type','danger');
            session()->flash('message',$error->getMessage());
            return redirect()->back();
        }
    }

    // qty update
    public function edit(Request $request,$id) {
        try {
            $update = Cart::find($id);
            $update->qty = $request->qty;
            $update->update();
            return redirect()->back();
        } catch (Exception $error) {
            session()->flash('type','danger');
            session()->flash('message',$error->getMessage());
            return redirect()->back();
        }
    }
}
