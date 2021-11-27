<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProductModel extends Model
{
    use HasFactory;
    public $timestamp = false;
    protected $fillable=[
        'meta_keywords','category_name','slug_category_product', 'category_desc','category_status'
    ];
    protected $primaryKey = 'category_id';
    protected $table = 'tbl_category_product';
}
