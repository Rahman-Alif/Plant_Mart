<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    //profile
    function profile(){
        return view('admin.users.profile');
    }
    //profile update
    function profile_update(Request $request){
       $photo = $request->profile;
       if(Auth::user()->profile != null){
        $prev_photo = public_path('uploads/users/profile/'.Auth::user()->profile);
        unlink($prev_photo);

        $extension = $photo->getClientOriginalExtension();
        $file_name = Auth::id().'.'.$extension;
        Image::make($photo)->save(public_path('uploads/users/profile/'.$file_name));
        
        User::find(Auth::id())->update([
            'profile'=>$file_name,
        ]);
       }
       else{
        $extension = $photo->getClientOriginalExtension();
        $file_name = Auth::id().'.'.$extension;
        Image::make($photo)->save(public_path('uploads/users/profile/'.$file_name));
        
        User::find(Auth::id())->update([
            'profile'=>$file_name,
        ]);
        
       }
       return back();
    }

    function users(){
        // $users=User::where('id','!=',Auth::id())->get();
        $users=User::paginate(3);
        $total= User::count();
        return view('admin.users.index',compact('users','total'));
    }
    function delete($id){
        User::find($id)->delete();
        return back();
    }

    //logout
    function logout(){
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
