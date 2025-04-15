<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\CustomerLogin;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    function github_redirect(){
        return Socialite::driver('github')->redirect();
    }


    function github_callback(){
        $user = Socialite::driver('github')->user();

        if(CustomerLogin::where('email',$user->getEmail())->exists()){
            return redirect('/');
        }
        else{
        CustomerLogin::insert([
            'name'=>$user->getName(),
            'email'=>$user->getEmail(),
            'password'=>bcrypt('tushar@123@'),
            'created_at'=>Carbon::now(),
        ]);

            
        if(Auth::guard('customerlogin')->attempt(['email' => $user->getEmail(), 'password' => 'tushar@123@']));
    }
}
}
