<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerLogin;
use App\Models\EmailVerify;
use Carbon\Carbon;
use Auth;
use App\Notifications\EmailVerifyNotification;
use Notification;

class CustomerController extends Controller
{
    //register/login
    function register(){
        return view('frontend.customer_register');
    }

    // Customer Register Store
function customer_register_store(Request $request) {
    CustomerLogin::insert([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'created_at' => Carbon::now(),
    ]);

    // Redirect to the homepage with a success message
    return redirect('/')->with('success', 'Registration successful.');
}

    

    function logout(){

        Auth::guard('customerlogin')->logout();
        return redirect()->route('master');

        // Auth::guard('customerlogin')::logout();
        // return redirect()->route('register');
    }
}
