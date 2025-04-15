<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Thumbnails;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Image;

class ProductController extends Controller
{
    function add_product(){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.product.index',[
            'categories'=>$categories,
            'subcategories'=>$subcategories,
        ]);
    }

    function getsubcategory(Request $request){
       $subcategories = Subcategory::where('category_id', $request->category_id)->get();
       $str = '<option value="">--Select Sub Category--</option>';
       foreach($subcategories as $subcategory){
           $str .='<option value="'.$subcategory->id.'">'.$subcategory->subcategory_name.'</option>';
       }
       echo $str;
    }

    //store
    function product_store(Request $request){
        $product_id = Product::insertGetId([
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'product_name'=>$request->product_name,
            'product_price'=>$request->product_price,
            'discount'=>$request->discount,
            'after_discount' => (float)$request->product_price - ((float)$request->product_price * (float)$request->discount / 100),
            'short_desp'=>$request->short_desp,
            'long_desp'=>$request->long_desp,
            'sku'=>substr($request->product_name,0,4).'-'.Str::random(5).rand(0,4),
            'slug'=>str_replace(' ','-',Str::lower($request->product_name)).'-'.rand(0,10000),
            'preview'=>$request->preview,
            'created_at'=> Carbon::now(),
        ]);
        

        $preview = $request->preview;
        $extension = $preview->getClientOriginalExtension();
        $preview_name = $product_id.'.'.$extension;
        Image::make($preview)->resize(680,680)->save(public_path('/uploads/products/preview/'.$preview_name));


        Product::find($product_id)->update([
            'preview'=>$preview_name,
        ]);
        
        
        //thumbnails
        $thumbnail = $request->thumbnail;
        $sl = 1;
        foreach($thumbnail as $thumbnail){
            $thumb_extension = $thumbnail->getClientOriginalExtension();
            $thumbnail_name = $product_id.'-'.$sl.'.'.$thumb_extension;
            Image::make($thumbnail)->resize(680,680)->save(public_path('/uploads/products/thumbnails/'.$thumbnail_name));

            Thumbnails::insert([
                'product_id'=>$product_id,
                'thumbnail'=>$thumbnail_name,
                'created_at'=> Carbon::now(),
            ]);
            $sl++;
        }
        return back();
    }

       //product list
       function product_list(){
        $all_products = Product::all();
        return view('admin.product.list',[
            'all_products'=>$all_products,
        ]);
    }
    
}
