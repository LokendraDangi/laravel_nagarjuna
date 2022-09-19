<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'categories';

    protected $fillable = ['name','slug','short_description','rank',
                        'description','image','meta_keyword','meta_title','meta_description',
                        'status','created_by','updated_by','deleted_at'
                        ];
    
    function  createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    function  updatedBy(){
        return $this->belongsTo(User::class,'updated_by');
    }

    function subcategories(){
        return $this->hasMany(Subcategory::class);
    }
    function products(){
        return $this->hasMany(Product::class);
    }
}
