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
        $output = '
                <form>
                '.csrf_field().'
                <table class="table table-hover">
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
                    <td contenteditable class="edit_gal_name" data-gal_id="'.$gal->gallery_id.'">'.$gal->gallery_name.'</td>
                    <td><img src="'.url('public/uploads/gallery/'.$gal->gallery_image).'" class="img-thumbnail" width="120" height="120"></td>
                    <td>
                        <button type="button" data-gal_id="'.$gal->gallery_id.'" class="btn btn-xs btn-danger delete-gallery">Xóa</button>
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
        $output.='
                </tbody>
                </table>
                </form> 
                ';
        echo $output;
    }

    //thêm thư viện gallery vào csdl
    public function insert_gallery(Request $request, $pro_id){
        $get_image = $request->file('file');
        if($get_image){
            foreach($get_image as $key => $anh){
                $get_name_image = $anh->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image = $name_image.rand(0,99).'.'.$anh->getClientOriginalExtension();
                $anh->move('public/uploads/gallery',$new_image);
                $gallery = new Gallery();
                $gallery->gallery_name = $new_image;
                $gallery->gallery_image = $new_image;
                $gallery->product_id = $pro_id;
                $gallery->save();
            }
        }
        Session::put('message','Thêm thư viện Gallery thành công');
        return redirect()->back();
    }

    // sửa tên
    public function capnhat_gallery_name(Request $request){
        $gal_id = $request->gal_id;
        $gal_text = $request->gal_text;
        $gallery = Gallery::find($gal_id);
        $gallery->gallery_name = $gal_text;
        $gallery->save();
    }

    public function xoa_gallery(Request $request){
        $gal_id = $request->gal_id;
        $gallery = Gallery::find($gal_id);
        unlink('public/uploads/gallery/'.$gallery->gallery_image);
        $gallery->delete();
    }
}
