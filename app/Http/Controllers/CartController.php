<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Inventory;
use App\Models\Coupon;
use Carbon\Carbon;
use Auth;

class CartController extends Controller
{
    //cart

    function cart_store(Request $request){
        $quantity = Inventory::where('product_id',$request->product_id)->first()->quantity;

        if($quantity > $request->quantity){
            if(Cart::where('customer_id',Auth::guard('customerlogin')->id())->where('product_id',$request->product_id)->exists()){

                Cart::where('customer_id',Auth::guard('customerlogin')->id())->where('product_id',$request->product_id)->increment('quantity',$request->quantity);
                return back()->with('cart_added','Item Has Been Updated');
                }
                else{
                Cart::insert([
                    'customer_id'=>Auth::guard('customerlogin')->id(),
                    'product_id'=>$request->product_id,
                    'quantity'=>$request->quantity,
                    'created_at'=>Carbon::now(),
                    ]);
                    return back()->with('cart_added','Cart Has Been Added Successfully');
                }
        }
        else{
            return back()->with('stock','Stock Out');
        }  
    }
    
    function cart_remove($cart_id){
        Cart::find($cart_id)->delete();
        return back();
    }


    //view cart page
    function view_cart(Request $request){
        $carts = Cart::where('customer_id',Auth::guard('customerlogin')->id())->get();
        $coupon = $request->coupon;
        $discount = null;
        $message = null;
        $type = null;
        $cart_total = 0;

        if ($coupon == '') {
            $discount = 0;
        } else {
            foreach($carts as $cart){
                $cart_total += $cart->rel_to_product->after_discount * $cart->quantity;
            }
            if(Coupon::where('coupon_name',$coupon)->where('status',1)->exists()){
                if(Coupon::where('coupon_name',$coupon)->first()->validity >= Carbon::today()){
                    $min = Coupon::where('coupon_name',$coupon)->first()->min;
                    $max = Coupon::where('coupon_name',$coupon)->first()->max;
                    if($cart_total > $min && $cart_total < $max){
                        $discount = Coupon::where('coupon_name',$coupon)->first()->amount;
                        $type = Coupon::where('coupon_name',$coupon)->first()->type;
                    }
                    else{
                        $discount = 0;
                        $message = 'Minimum Amount '.$min.' And Maximum Amount '.$max;
                    }
                }
                else{
                    $discount = 0;
                    $message = 'Coupon Code Has Been Expired';
                }
            }
            else{
                $discount = 0;
                $message = 'Invalid Coupon Code';
            }
        }

        return view('frontend.view_cart',[
            'carts'=>$carts,
            'discount'=>$discount,
            'message'=>$message,
            'type'=>$type,
        ]);
    }

    //update cart 
    function cart_update(Request $request){
        foreach($request->quantity as $cart_id=>$quantity){
            Cart::find($cart_id)->update([
                'quantity'=>$quantity,
            ]);
            return back();
        }
    }
}
