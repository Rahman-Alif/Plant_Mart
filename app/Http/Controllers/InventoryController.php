<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Size;
use App\Models\Product;
use App\Models\Inventory;
use Carbon\Carbon;

class InventoryController extends Controller
{

    //delete
    function list_delete($id){
        Product::find($id)->delete();
        return back();
    }


    
    //inventory
    
    function inventory($product_id){
        $color = Color::all();
        $size = Size::all();
        $product_info = Product::find($product_id);
        $inventory = Inventory::where('product_id',$product_id)->get();
        return view('admin.product.inventory',[
            'product_info'=>$product_info,
            'color'=>$color,
            'size'=>$size,
            'inventory'=>$inventory,
        ]);
    }
    
    //variation
    // function variation(){
    //     $color = Color::all();
    //     $size = Size::all();
    //     return view('admin.product.variation',[
    //         'color'=>$color,
    //         'size'=>$size,
    //     ]);
    // }
    
    //insert
    function color_store(Request $request){
        Color::insert([
            'color_name'=>$request->color_name,
            'color_code'=>$request->color_code,
            'created_at'=>Carbon::now(),
        ]);
        return back();
    }
    function size_store(Request $request){
        Size::insert([
            'size_name'=>$request->size_name,
            'created_at'=>Carbon::now(),
        ]);
        return back();
    }

    //color delete
    function color_delete($id){
        Color::find($id)->delete();
        return back();
    }
    //color delete
    function size_delete($id){
        Size::find($id)->delete();
        return back();
    }
    
    //inventory insert
    function add_inventory(Request $request){ 
        if(Inventory::where('product_id',$request->product_id)->where('color_id',$request->color_id)->where('size_id',$request->size_id)->exists()){
            Inventory::where('product_id',$request->product_id)->where('color_id',$request->color_id)->where('size_id',$request->size_id)->increment('quantity',$request->quantity);
        }
        else{
            Inventory::insert([
                'product_id'=>$request->product_id,
                'color_id'=>$request->color_id,
                'size_id'=>$request->size_id,
                'quantity'=>$request->quantity,
                'created_at'=>Carbon::now(),
            ]);
        }
        return back();
    }
    
    //inventory delete
    function inv_delete($id){
        Inventory::find($id)->delete();
        return back();
    }


}
