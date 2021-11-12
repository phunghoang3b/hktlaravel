<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamp = false;
    protected $fillable=[
        'category_id', 'product_name', 'brand_id', 'product_desc', 'product_content', 'product_price', 'product_image', 'product_status', 'meta_keywords'
    ];
    protected $primaryKey = 'product_id';
    protected $table = 'tbl_product';
}
