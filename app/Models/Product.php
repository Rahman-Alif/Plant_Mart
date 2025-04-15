<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;



    function rel_to_catagory(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    function rel_to_subcatagory(){
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }
    protected $guarded = ['id'];
}
