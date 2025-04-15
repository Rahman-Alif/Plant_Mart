<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Country;
use App\Models\City;
use App\Models\Order;
use App\Models\BillingDetails;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Inventory;
use Mail;
use App\Mail\InvoiceSend;
use Carbon\Carbon;
use Auth;

class CheckoutController extends Controller
{
    function checkout(){
        $carts = Cart::where('customer_id',Auth::guard('customerlogin')->id())->get();
        $cart_total = 0;
        foreach($carts as $cart){
            $cart_total += $cart->rel_to_product->after_discount * $cart->quantity;
        }
        return view('frontend.checkout',[
            'carts'=>$carts,
            'cart_total'=>$cart_total,
        ]);
    }



    //order
    function order_store(Request $request){
        if($request->payment_method == 1){
            $order_id = Order::insertGetId([
                'user_id'=>Auth::guard('customerlogin')->id(),
                'sub_total'=>$request->sub_total,
                'discount'=>$request->discount,
                'charge'=>$request->charge,
                'total'=>$request->total,
                'created_at'=>Carbon::now(),
            ]);

            BillingDetails::insert([
                'user_id'=>Auth::guard('customerlogin')->id(),
                'order_id'=>$order_id,
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'company'=>$request->company,
                'address'=>$request->address,
                'notes'=>$request->notes,
                'created_at'=>Carbon::now(),
            ]);
            $carts = Cart::where('customer_id',Auth::guard('customerlogin')->id())->get();
            foreach ($carts as  $cart) {
                OrderProduct::insert([
                    'user_id'=>Auth::guard('customerlogin')->id(),
                    'order_id'=>$order_id,
                    'product_id'=>$cart->product_id,
                    'quantity'=>$cart->quantity,
                    'price'=>$cart->rel_to_product->after_discount,
                    'created_at'=>Carbon::now(),
                ]);
                Inventory::where('product_id',$cart->product_id)->decrement('quantity',$cart->quantity);
            }

            //SMS SEND
            function sms_send() {

        }

        // Delete all cart items after successful order
        Cart::where('customer_id', Auth::guard('customerlogin')->id())->delete();  
        return redirect()->route('order.success')->with('success', $request->name);
        }

        
        elseif($request->payment_method == 2){
          return view('ssl_pay',[
            'data'=>$request->all(),
          ]);
        }
        else{
            return view('stripe',[
                'data'=>$request->all(),
              ]);
        }
    }

    function order_success(){
        return view('order_success');
    }
}
