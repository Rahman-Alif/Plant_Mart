<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\CustomerLogin;
use App\Models\CustomerPassReset;
use App\Models\EmailVerify;
use Carbon\Carbon;
use Auth;
use PDF;
use App\Notifications\PassResetNotification;
use Notification;
use Hash;

class AccountController extends Controller
{
    function account(){
        $order = Order::where('user_id',Auth::guard('customerlogin')->id())->get();
        return view('account',[
            'order'=>$order,
        ]); 
    }

    //forgot password
    function forgot_password(){
        return view('forgot_password');
    }

    function customer_pass_reset_store(Request $request){
        $customer = CustomerLogin::where('email',$request->email)->get();

        $delete_old = CustomerPassReset::where('customer_id', $customer->first()->id)->delete();

        $reset_info =CustomerPassReset::create([
            'customer_id'=>$customer->first()->id,
            'token'=>uniqid(),
            'created_at'=>Carbon::now()
        ]);
        Notification::send($customer, new PassResetNotification($reset_info));
        return redirect()->route('customer.register')->with('PassNotification','Please Check Your Email');
    }


    function forgot_password_form($token){
        if(CustomerPassReset::where('token',$token)->exists()){
            return view('forgot_password_form',compact('token'));
        }
        else{
            abort(404);
        }
    }

    function pass_reset_update(Request $request){
        $customer = CustomerPassReset::where('token',$request->token)->firstOrFail();
        $customer_id = CustomerLogin::findOrFail($customer->customer_id);
        
        $customer_id->update([
            'password'=>Hash::make($request->password),
        ]);
        CustomerPassReset::where('customer_id', $customer->customer_id)->delete();

        return redirect()->route('customer.register')->with('Pass','Successfully Reset Password');
    }

    //email verify
    function email_verify($token){
        $customer = EmailVerify::where('token',$token)->firstOrFail();
        $customer_id = CustomerLogin::findOrFail($customer->customer_id);
        
        $customer_id->update([
            'email_verified_at'=>Carbon::now(),
        ]);
        EmailVerify::where('customer_id', $customer->customer_id)->delete();

        return redirect()->route('customer.register')->with('email_verify','Your Email Has been Verified');
    }
}
