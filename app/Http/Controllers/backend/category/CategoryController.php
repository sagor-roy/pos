<?php

namespace App\Http\Controllers\backend\category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // store
    public function store(Request $request) {
        $request->validate([
            'category' => 'required | unique:categories,cate'
        ]);
        try {
            $store = new Category();
            $store->cate = $request->category;
            $store->slug = strtolower(str_replace(' ','-',$request->category));
            $store->save();
            session()->flash('type','success');
            session()->flash('message','Category Added Successful');
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
            'category' => 'required'
        ]);
        try {
            $update = Category::find($id);
            $update->cate = $request->category;
            $update->slug = strtolower(str_replace(' ','-',$request->category));
            $update->update();
            session()->flash('type','success');
            session()->flash('message','Category Updated Successful');
            return redirect()->back();
        } catch (Exception $error) {
            session()->flash('type','danger');
            session()->flash('message',$error->getMessage());
            return redirect()->back();
        }
    }

    // delete
    public function destroy($id) {
        Category::where('id',$id)->delete();
        session()->flash('type','success');
        session()->flash('message','Category Deleted Successful');
        return redirect()->back();
    }
}
