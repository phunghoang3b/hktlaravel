<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
      'meta_keywords','brand_name','brand_slug','brand_desc','brand_status'
    ];
    protected $primaryKey = 'brand_id';
    protected $table = 'tbl_brand';

    public function product(){
        return $this->hasMany('App\Models\Product');
    }
}
