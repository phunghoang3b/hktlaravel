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
use App\Models\Slider;
use App\Models\Product;
use App\Models\Post;
use App\Models\CatePost;
use Illuminate\Support\Facades\Redirect;
session_start();

class PostController extends Controller
{
    public function KiemtraAdmin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('/Trangadmin');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    
    public function them_baiviet(){
        $this->KiemtraAdmin();
        $danhmuc_baiviet = CatePost::orderby('cate_post_id','DESC')->get();
        return view('admin.BaiViet.Them_baiviet')->with(compact('danhmuc_baiviet'));
    }

    public function danhsach_baiviet(){
        $this->KiemtraAdmin();
        $danhsach_baiviet = Post::with('cate_post')->orderby('post_id')->paginate(5);       
        return view('admin.BaiViet.Danhsach_baiviet')->with(compact('danhsach_baiviet',$danhsach_baiviet));
    }

    public function luu_baiviet(Request $request){
        $this->KiemtraAdmin();
        //khai bao bien data = mang
        $data = $request->all();
        $post = new Post();
        $post->post_title = $data['ten_baiviet'];
        $post->post_slug = $data['slug_baiviet'];
        $post->post_desc = $data['desc_baiviet'];
        $post->post_content = $data['cotent_baiviet'];
        $post->post_meta_desc = $data['meta_desc'];
        $post->post_meta_keywords = $data['meta_keywords'];
        $post->post_status = $data['hienthi_baiviet'];
        $post->cate_post_id = $data['cate_post_id'];

        $get_image = $request->file('hinhanh_baiviet');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName(); //lấy tên hình ảnh đó
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension(); //lấy đuôi file mở rộng
            $get_image->move('public/uploads/post',$new_image);
            $post->post_image = $new_image;
            $post->save();
            Session::put('message','Thêm bài viết thành công');
            return redirect()->back();
        }else{
            Session::put('message','Hãy chọn hình ảnh cần thêm cho bài viết');
            return redirect()->back();
        }      
    }

    public function sua_baiviet($post_id){
        $this->KiemtraAdmin();
        $danhmuc_baiviet = CatePost::orderby('cate_post_id')->get();
        $post = Post::find($post_id);
        return view('admin.BaiViet.Sua_baiviet')->with(compact('post','danhmuc_baiviet'));
    }

    public function capnhat_baiviet(Request $request, $post_id){
        $this->KiemtraAdmin();
        $data = $request->all();
        $post = Post::find($post_id);
        $post->post_title = $data['ten_baiviet'];
        $post->post_slug = $data['slug_baiviet'];
        $post->post_desc = $data['desc_baiviet'];
        $post->post_content = $data['cotent_baiviet'];
        $post->post_meta_desc = $data['meta_desc'];
        $post->post_meta_keywords = $data['meta_keywords'];
        $post->post_status = $data['hienthi_baiviet'];
        $post->cate_post_id = $data['cate_post_id'];

        $get_image = $request->file('hinhanh_baiviet');
        if($get_image){
            // xóa ảnh cũ
            $hinhanh_cu = $post->post_image;
            $path = 'public/uploads/post/'.$hinhanh_cu;
            unlink($path);

            // cập nhật ảnh mới
            $get_name_image = $get_image->getClientOriginalName(); //lấy tên hình ảnh đó
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension(); //lấy đuôi file mở rộng
            $get_image->move('public/uploads/post',$new_image);
            $post->post_image = $new_image;
        }
        $post->save();
        Session::put('message','Cập nhật bài viết thành công');
        return redirect()->back();
    }

    public function xoa_baiviet($post_id){
        $this->KiemtraAdmin();
        $post = Post::find($post_id);
        $hinhanh = $post->post_image;
        if($hinhanh){
            $path = 'public/uploads/post/'.$hinhanh;
            unlink($path);
        }
        $post->delete();
        Session::put('message','Xóa bài viết thành công');
        return redirect()->back();
    }
}
