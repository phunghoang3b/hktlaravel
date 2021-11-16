<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Slider;
use App\Models\CategoryProductModel;
use Session;
use Auth;
use App\Models\CatePost;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class CategoryPost extends Controller
{
    public function KiemtraAdmin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('/Trangadmin');
        }else{
            return Redirect::to('/admin')->send();
        }
    }

    public function them_danhmuc_baiviet(){
        $this->KiemtraAdmin();
        return view('admin.DanhMuc_BaiViet.Them_DanhMuc');
    }

    public function luudanhmuc_baiviet(Request $request){
        $this->KiemtraAdmin();
        $data = $request->all();
        $category_post = new CatePost();
        $category_post->cate_post_name = $data['ten_DMPost'];
        $category_post->cate_post_status = $data['hienthi_DMPost'];
        $category_post->cate_post_slug = $data['slug_DMPost'];
        $category_post->cate_post_desc = $data['desc_DMPost'];
        $category_post->save();
        Session::put('message','Thêm danh mục bài viết thành công');
        return redirect()->back();
    }

    public function danhsach_DM_baiviet(){
        $this->KiemtraAdmin();
        $category_post = CatePost::orderby('cate_post_id','DESC')->paginate(5);
        return view('admin.DanhMuc_BaiViet.Danhsach_dmbv')->with(compact('category_post'));
    }

    public function danh_muc_bai_viet($cate_post_slug){
        
    }
}
