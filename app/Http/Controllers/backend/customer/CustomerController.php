<?php

namespace App\Http\Controllers\backend\customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;
use Image;

class CustomerController extends Controller
{
    // store
    public function store(Request $request) {
        $request->validate([
            'name' => 'required | unique:customers,name',
            'number' => 'required',
            'address' => 'required',
            'image' => 'required | image | mimes:jpg,png,jpeg'
        ]);

        try {
            if($request->hasFile('image')) {
                $file = $request->file('image');
                $img_name = substr(md5(time()), 0, 15).'.'.$file->getClientOriginalExtension();
                Image::make($file)->resize(300,300)->save('uploads/customer/'.$img_name);
            }
            $store = new Customer();
            $store->name = $request->name;
            $store->number = $request->number;
            $store->address = $request->address;
            $store->img = $img_name;
            $store->save();
            session()->flash('type','success');
            session()->flash('message','Customer added Successful');
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
            'number' => 'required',
            'address' => 'required',
            'image' => 'image | mimes:jpg,png,jpeg'
        ]);

        try {
            if($request->file('image') == null) {
                $update = Customer::find($id);
                $update->name = $request->name;
                $update->number = $request->number;
                $update->address = $request->address;
                $update->update();
                session()->flash('type','success');
                session()->flash('message','Customer Update Successful');
                return redirect()->back();
            } else {
                if($request->hasFile('image')) {
                    $file = $request->file('image');
                    $img_name = substr(md5(time()), 0, 15).'.'.$file->getClientOriginalExtension();
                    Image::make($file)->resize(300,300)->save('uploads/customer/'.$img_name);
                }
                $update = Customer::find($id);
                 // img unlink
                if (file_exists(public_path($folder = 'uploads/customer/'.$update->img))) {
                    unlink(public_path($folder));
                }
                $update->name = $request->name;
                $update->number = $request->number;
                $update->address = $request->address;
                $update->img = $img_name;
                $update->update();
                session()->flash('type','success');
                session()->flash('message','Customer Update Successful');
                return redirect()->back();
        }
        } catch (Exception $error) {
            session()->flash('type','danger');
            session()->flash('message',$error->getMessage());
            return redirect()->back();
        }
    }

    // customer delete
    public function destroy($id) {
        try {
            $delete = Customer::where('id',$id)->first();
             // img unlink
             if (file_exists(public_path($folder = 'uploads/customer/'.$delete->img))) {
                unlink(public_path($folder));
            }
            $delete->delete();
            session()->flash('type','success');
            session()->flash('message','Customer Delete Successful');
            return redirect()->back();
        } catch (Exception $error) {
            session()->flash('type','danger');
            session()->flash('message',$error->getMessage());
            return redirect()->back();
        }
    }
}
