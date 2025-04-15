<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\OrderProduct;
use Carbon\Carbon;

class FrontendController extends Controller
{
   
   function master(){
      $all_products = Product::all();
      $new_arrival = Product::latest()->take(3)->get();
      $top_category = Category::take(6)->get();
      return view('frontend.index',[
      'all_products'=>$all_products,
      'new_arrival'=>$new_arrival,
      'top_category'=>$top_category,
    ]);
   }

   public function search(Request $request)
   {
       // Validate the search query
       $request->validate([
           'query' => 'required|string|min:3'
       ]);

       $query = $request->input('query');

       // Perform the search
       $products = Product::where('product_name', 'like', '%' . $query . '%')
           ->get();

       // Return results to a view
       return view('frontend.results', compact('products', 'query'));
   }


   function getSize(Request $request){
     $size = Inventory::where('product_id',$request->product_id)->where('color_id',$request->color_id)->get();
     $str = '<option>Choose A Option</option>';
     foreach($size as $size){
      $str.='<option value = "'.$size->size_id.'">'.$size->rel_to_size->size_name.'</option>';
     }
     echo $str;
   }

   function prodect_details($slug){
      $product_details = Product::where('slug',$slug)->get();
      $product_id = $product_details->first()->id;
      $category_id = $product_details->first()->category_id;
      $related_product = Product::where('category_id',$category_id)->where('id','!=',$product_id)->get();
      
      $review = OrderProduct::where('product_id',$product_id)->whereNotNull('review')->get();
      $total_review = OrderProduct::where('product_id',$product_id)->whereNotNull('review')->count();
      $total_star = OrderProduct::where('product_id',$product_id)->whereNotNull('star')->sum('star');

      $available_color = Inventory::where('product_id',$product_id)->selectRaw('color_id, count(*) as total')->groupBy('color_id')->get();
      return view('frontend.product_details',[
         'product_details'=>$product_details,
         'available_color'=>$available_color,
         'related_product'=>$related_product,
         'review'=>$review,
         'total_review'=>$total_review,
         'total_star'=>$total_star,
      ]);
   }

   //review
   function review_store(Request $request){
      OrderProduct::where('user_id',$request->user_id)->where('product_id',$request->product_id)->update([
         'review'=>$request->review,
         'star'=>$request->star,
         'updated_at'=>Carbon::now,
      ]);
      return back();
   }


}
