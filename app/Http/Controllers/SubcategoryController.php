<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Carbon;

class SubcategoryController extends Controller
{
    //

    function index(){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.subcategory.index',[
            'categories'=>$categories,
            'subcategories'=>$subcategories,
        ]);
    }
    function store(Request $request){
        if(Subcategory::where('category_id',$request->category_id)->where('subcategory_name',$request->subcategory_name)->exists()){
            return back()->with('exist','subcategory is already exist in this category');
        }           
        else{
            Subcategory::insert([
                'category_id'=>$request->category_id,
                'subcategory_name'=>$request->subcategory_name,
                'created_at'=>Carbon::now()
            ]);
            return back()->with('success','Subcategory Added Successfully! ');
        }

    }

    
    function sub_delete($id){
    Subcategory::find($id)->delete();
    return back();
    }
}

