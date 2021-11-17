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
        $danhsach_baiviet = Post::orderby('post_id')->paginate(5);
        
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
    // //sửa sản phẩm
    // public function sua_sanpham($sanpham_id){
    //     $this->KiemtraAdmin();
    //     $danhmuc_sanpham = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
    //     $thuonghieu_sanpham = DB::table('tbl_brand')->orderby('brand_id','desc')->get();

    //     $sua_sanpham = DB::table('tbl_product')->where('product_id',$sanpham_id)->get();
    //     $quanly_sanpham = view('admin.suasanpham')->with('suasanpham',$sua_sanpham)->with('danhmuc_sanpham',$danhmuc_sanpham)->with('thuonghieu_sanpham',$thuonghieu_sanpham);
    //     return view('admin_layout')->with('admin.suasanpham',$quanly_sanpham);
    // }
    // //cập nhật sản phẩm
    // public function capnhat_sanpham(Request $request, $sanpham_id){
    //     $this->KiemtraAdmin();
    //     $data = array();
    //     $data['product_name'] = $request->ten_sanpham;
    //     $data['product_quantity'] = $request->soluong_sanpham;
    //     $data['product_price'] = $request->gia_sanpham;
    //     $data['product_desc'] = $request->mota_sanpham;
    //     $data['product_content'] = $request->noidung_sanpham;
    //     $data['category_id'] = $request->danhmuc;
    //     $data['brand_id'] = $request->thuonghieu;
    //     $data['product_status'] = $request->hienthi_sanpham;
    //     //chon san pham moi dc cap nhat
    //     $get_image = $request->file('hinhanh_sanpham');

    //     if($get_image){
    //         $get_name_image = $get_image->getClientOriginalName();
    //         $name_image = current(explode('.',$get_name_image));
    //         $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension();
    //         $get_image->move('public/uploads/product',$new_image);
    //         $data['product_image'] = $new_image;
    //         DB::table('tbl_product')->where('product_id',$sanpham_id)->update($data);
    //         Session::put('message','Sửa sản phẩm thành công');
    //         return Redirect::to('danhsachsanpham');
    //     }
    //     DB::table('tbl_product')->where('product_id',$sanpham_id)->update($data);
    //     Session::put('message','Sửa sản phẩm thành công');
    //     return Redirect::to('danhsachsanpham');
    // }

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
