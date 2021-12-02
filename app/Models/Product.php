<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamp = false;
    protected $fillable=[
        'category_id', 'product_name', 'brand_id', 'product_desc', 'product_content', 'product_price', 'product_image', 'product_status', 'meta_keywords', 'product_slug'
    ];
    protected $primaryKey = 'product_id';
    protected $table = 'tbl_product';

    public function category(){
        return $this->belongsTo('App\Models\CategoryProductModel','category_id');
    }

    public function brand(){
        return $this->belongsTo('App\Models\Brand','brand_id');
    }
}
