<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CustomerLoginController extends Controller
{
    // Login
    public function customer_login_store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        // Attempt to log in the user
        if (Auth::guard('customerlogin')->attempt($request->only('email', 'password'))) {
            // Redirect to the homepage if login is successful
            return redirect('/');
        }
    
        // Redirect back with an error message if authentication fails
         return redirect()->route('customer.register')
             ->withErrors(['email' => 'The provided credentials do not match our records.']);
    }
    

}