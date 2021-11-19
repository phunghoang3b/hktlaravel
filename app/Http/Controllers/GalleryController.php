<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;//sử dụng database
use App\Http\Requests;
use Session;
use Auth;
use App\Imports\ImportProduct;
use App\Exports\ExcelProduct;
use Excel;
use App\Models\Gallery;
use App\Models\Slider;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
session_start();

class GalleryController extends Controller
{
    public function KiemtraAdmin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('/Trangadmin');
        }else{
            return Redirect::to('/admin')->send();
        }
    }

    // hiển thị giao diện
    public function them_gallery($product_id){
        $this->KiemtraAdmin();
        $pro_id = $product_id;
        return view('admin.Gallery.Them_gallery')->with(compact('pro_id'));
    }

    // form thư viện ảnh gallery 
    public function chon_gallery(Request $request){
        $product_id = $request->pro_id;
        $gallery = Gallery::where('product_id',$product_id)->get();
        $gallery_count = $gallery->count();
        $output = '<table class="table table-hover">
                            <thead>
                              <tr>
                                <th>Thứ tự</th>
                                <th>Tên hình ảnh</th>
                                <th>Hình ảnh</th>
                                <th>Chức năng</th>
                              </tr>
                            </thead>
                            <tbody>          
        ';
        if($gallery_count > 0){
            $i = 0;
            foreach($gallery as $key => $gal){
                $i++;
                $output.='
                <tr>
                                <td>'.$i.'</td>
                                <td>'.$gal->gallery_name.'</td>
                                <td><img src="'.url('public/uploads/gallery/'.$gal->gallery_image).'" class="img-thumbnail" width="120" height="120"></td>
                                <td>
                                    <button data-gal_id="'.$gal->gallery_id.'" class="btn btn-xs btn-danger delete-gallery">Xóa</button>
                                </td>
                              </tr> 
                ';
            }
        }else{
            $output.='
                <tr>
                                <td colspan="4">Sản phẩm chưa có thư viện ảnh</td>
                              </tr> 
                ';
        }
        echo $output;
    }
}
