<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Image;

class CategoryController extends Controller
{
    function index(){
        $category = Category::all();
        $trash = Category::onlyTrashed()->get();
        $total = Category::count();
        return view('admin.category.index',[
            'category'=>$category,
            'trash'=>$trash,
            'total'=>$total,
        ]);
    }
    
    //insert
    // function store(Request $request){

    
    //     $request->validate([
    //         'category_name'=>'required|unique:categories',
    //     ],[
    //         'category_name.required'=>'This Field is Required!'
    //     ]);
    //      Category::insert([
    //         'category_name'=>$request->category_name,
    //         'added_by'=>Auth::id(),
    //         'created_at'=>Carbon::now(),
    //     ]);

    //     return back()->with('success','Category Added Successfully! ');
    // }

    function image(Request $request){
            $request->validate([
                'category_name'=>'required|unique:categories',
                'category_image'=>'mimes:jpg,bmp,png',
                'category_image'=>'file|max:1024',
            ],[
                'category_name.required'=>'This Field is Required!'
            ]);


        if($request->category_image){
            $id = Category::insertGetId([
                'added_by'=>Auth::id(),
                'category_name'=>$request->category_name,
                'created_at'=>Carbon::now(),
            ]);
            $category_image = $request->category_image;
            $extension = $category_image->getClientOriginalExtension();
            $file_name = $id.'.'.$extension;
             // create a new image resource from file
            Image::make($category_image)->save(public_path('/uploads/category/'.$file_name));
            Category::find($id)->update([
                'category_image'=> $file_name,
            ]);
        }
        else{
            $id = Category::insertGetId([
                'added_by'=>Auth::id(),
                'category_name'=>$request->category_name,
                'created_at'=>Carbon::now(),
            ]);
        }


        return back()->with('success','Category Added Successfully! ');
    }
    
    function delete($id){
        Category::find($id)->delete();
        return back();
    }
    function edit($category_id){
        $category_info = Category::find($category_id);
        return view('admin.category.edit',[
            'category_info'=>$category_info,
        ]);
    }
    function update(Request $request){
        if($request->category_image == ''){
            Category::find($request->category_id)-> update([
                'category_name'=> $request->category_name,
                'added_by'=>Auth::id(),
                'updated_at'=>Carbon::now(),
            ]);
        }
        else{
            $image = Category::find($request->category_id);
            if($image->category_image == 'default.png'){
                $category_image = $request->category_image;
                $extension = $category_image->getClientOriginalExtension();
                $file_name = $request->category_id.'.'.$extension;
                Image::make($category_image)->save(public_path('/uploads/category/'.$file_name));
                Category::find($request->category_id)->update([
                    'category_image'=> $file_name,
                ]);
                return redirect('/categories')->with('update','Category Updated Successfully! ');
            }
            else{
               $delete_image = public_path('/uploads/category/'.$image->category_image);
               unlink($delete_image);
                $category_image = $request->category_image;
                $extension = $category_image->getClientOriginalExtension();
                $file_name = $request->category_id.'.'.$extension;
                Image::make($category_image)->save(public_path('/uploads/category/'.$file_name));
                Category::find($request->category_id)->update([
                    'category_image'=> $file_name,
                ]);
            }
        }
        Category::find($request->category_id)-> update([
            'category_name'=> $request->category_name,
            'added_by'=>Auth::id(),
            'updated_at'=>Carbon::now(),
        ]);
        return redirect('/categories')->with('update','Category Updated Successfully! ');
    }
    function restore($id){
        Category::onlyTrashed()->find($id)->restore();
        return back();
    }
    function per_delete($id){
        $image = Category::onlyTrashed()->find($id);
        if($image->category_image == 'default.png'){
            Category::onlyTrashed()->find($id)->forceDelete();
        return back();
        }
        else{
            $delete_image = public_path('/uploads/category/'.$image->category_image);
            unlink($delete_image);
            Category::onlyTrashed()->find($id)->forceDelete();
        return back();
        }
        
    }
    function mark(Request $request){
        // $request->validate([
        //  'mark' => 'require',    
        // ]);
       foreach($request->mark as $mark){
           Category::find($mark)->delete();
        }
        return back();
    }

}
