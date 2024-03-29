<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected  $table = 'product_attributes';

    protected $fillable = ['product_id','attribute_id','attribute_value','status'];
}
