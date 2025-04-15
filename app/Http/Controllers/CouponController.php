<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    function add_coupon(){
        $coupon = Coupon::all();
        return view('admin.coupon.index',[
            'coupon'=>$coupon,
        ]);
    }
    function coupon_store(Request $request){
        Coupon::insert([
            'coupon_name'=>$request->coupon_name,
            'type'=>$request->type,
            'amount'=>$request->amount,
            'validity'=>$request->validity,
            'min'=>$request->min,
            'max'=>$request->max,
            'created_at'=>Carbon::now(),
        ]);
        return back();
    }
}
