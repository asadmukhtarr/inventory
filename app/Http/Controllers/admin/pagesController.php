<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\suppliar;
use App\Models\product;

class pagesController extends Controller
{
    //
     //
     public function dashboard(){
        return view('admin.dashboard');
    }
    // products ..
    public function products(){
        $products = product::orderby('id','desc')->get();
        return view('admin.products.all',compact('products'));
    }
    public function create_product(){
        $suppliars = suppliar::all();
        return view('admin.products.create',compact('suppliars'));
    }
    public function save_product(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'unit' => 'required',
            'sup' => 'required',
            'picture' => 'required',
        ]);
        $imgex = time().".".$request->file('picture')->extension();
        $request->file('picture')->storeAs('products',$imgex,'public');
        $product = new product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->unit = $request->unit;
        $product->suppliar_id = $request->sup;
        $product->picture = $imgex;
        $product->save();
        return redirect()->back()->with('message','Product Added Succesfuly');
    }
    public function sapliars(){
        $suppliars = suppliar::all();
        return view('admin.sapliars',compact('suppliars'));
    }
    public function sapliar_save(Request $request){
        $validated = $request->validate([
            'title' => 'required|min:6|unique:suppliars',
        ]);
        $sup = new suppliar;
        $sup->title  = $request->title;
        $sup->save();
        return redirect()->back()->with('message','Suppliar Added Successfully');
    }
    public function supliar_delete($id){
        $sap = suppliar::find($id);
        if($sap->products->count() > 0){
            return redirect()->back()->with('warning','Please Delete Products First Against This Suppliar');
        } else {
            $sap->delete();
            return redirect()->back()->with('message','Suppliar Deleted Successfully');
        }   
    }
    public function customers(){
        return view('admin.customers');
    }
    public function settings(){
        return view('admin.settings');
    }
}
