<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected  $table = 'products';

    protected $fillable = [ 'category_id', 'subcategory_id', 'title', 'slug', 'price', 
    'discount', 'stock', 'quantity', 'short_description', 'specification', 'description',
     'meta_keyword', 'meta_title', 'meta_description', 'feature_product', 'flash_product', 'status', 'created_by', 'updated_by'];

    function  createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    function  updatedBy(){
        return $this->belongsTo(User::class,'updated_by');
    }
    
    function categories(){
        return $this->belongsTo(Category::class,'category_id');
    }
    function subcategories(){
        return $this->belongsTo(Subcategory::class,'subcategory_id');
    }
    
    function tags(){
        return $this->belongsToMany(Tag::class,'ProductTag','product_id','tag_id');
    }
    function attributes(){
        return $this->hasMany(ProductAttribute::class);
    }
    function product_images(){
    return $this->hasMany(ProductImage::class,'product_id');
    }
}
