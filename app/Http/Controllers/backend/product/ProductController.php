<?php

namespace App\Http\Controllers\backend\product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class ProductController extends Controller
{
    // store
    public function store(Request $request) {
        $request->validate([
            'name' => 'required | unique:products,name',
            'category' => 'required',
            'price' => 'required',
            'image' => 'required | image | mimes:jpg,png,jpeg'
        ]);

        try {
            if($request->hasFile('image')) {
                $file = $request->file('image');
                $img_name = substr(md5(time()), 0, 15).'.'.$file->getClientOriginalExtension();
                Image::make($file)->resize(300,300)->save('uploads/product/'.$img_name);
            }
            $store = new Product();
            $store->name = $request->name;
            $store->cate_id = $request->category;
            $store->code = Str::random(6);
            $store->price = $request->price;
            $store->img = $img_name;
            $store->save();
            session()->flash('type','success');
            session()->flash('message','Product added Successful');
            return redirect()->back();
        } catch (Exception $error) {
            session()->flash('type','danger');
            session()->flash('message',$error->getMessage());
            return redirect()->back();
        }
    }

    // edit
    public function edit(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'image' => 'image | mimes:jpg,png,jpeg'
        ]);

        try {
            if($request->file('image') == null) {
                $update = Product::find($id);
                $update->name = $request->name;
                $update->cate_id = $request->category;
                $update->price = $request->price;
                $update->update();
                session()->flash('type','success');
                session()->flash('message','Product Update Successful');
                return redirect()->back();
            } else {
                if($request->hasFile('image')) {
                    $file = $request->file('image');
                    $img_name = substr(md5(time()), 0, 15).'.'.$file->getClientOriginalExtension();
                    Image::make($file)->resize(300,300)->save('uploads/product/'.$img_name);
                }
                $update = Product::find($id);
                 // img unlink
                if (file_exists(public_path($folder = 'uploads/product/'.$update->img))) {
                    unlink(public_path($folder));
                }
                $update->name = $request->name;
                $update->cate_id = $request->category;
                $update->price = $request->price;
                $update->img = $img_name;
                $update->update();
                session()->flash('type','success');
                session()->flash('message','Product Update Successful');
                return redirect()->back();
        }
        } catch (Exception $error) {
            session()->flash('type','danger');
            session()->flash('message',$error->getMessage());
            return redirect()->back();
        }
    }

    // product delete
    public function destroy($id) {
        try {
            $delete = Product::where('id',$id)->first();
             // img unlink
             if (file_exists(public_path($folder = 'uploads/product/'.$delete->img))) {
                unlink(public_path($folder));
            }
            $delete->delete();
            session()->flash('type','success');
            session()->flash('message','Product Delete Successful');
            return redirect()->back();
        } catch (Exception $error) {
            session()->flash('type','danger');
            session()->flash('message',$error->getMessage());
            return redirect()->back();
        }
    }
}
