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

    //phần quản lý bài viết - index
    public function danh_muc_bai_viet(Request $request, $post_slug){
        //danh mục bài viết
        $category_post = CatePost::orderby('cate_post_id','DESC')->get();
        //--slider
        $slider = Slider::orderby('slider_id','DESC')->where('slider_status','1')->take(6)->get();

        $danhmuc_sanpham = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $thuonghieu_sanpham = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $catepost = CatePost::where('cate_post_slug',$post_slug)->take(1)->get();
        foreach($catepost as $key => $cate){
            //seo
            $meta_desc = $cate->cate_post_desc;
            $meta_keywords = $cate->cate_post_slug;
            $the_tieude = $cate->cate_post_name;
            $cate_id = $cate->cate_post_id;
            $duongdan = $request->url();
            //end seo
        }
        $post = Post::with('cate_post')->where('post_status',1)->where('cate_post_id',$cate_id)->paginate(10);
        return view('pages.BaiViet.Danhmucbaiviet')->with('category',$danhmuc_sanpham)->with('brand',$thuonghieu_sanpham)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('the_tieude',$the_tieude)->with('duongdan',$duongdan)->with('slider',$slider)->with('post',$post)->with('category_post',$category_post);
    }

    //xem bài viết
    public function bai_viet(Request $request, $post_slug){
        //danh mục bài viết
        $category_post = CatePost::orderby('cate_post_id','DESC')->get();
        //--slider
        $slider = Slider::orderby('slider_id','DESC')->where('slider_status','1')->take(6)->get();

        $danhmuc_sanpham = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $thuonghieu_sanpham = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $post = Post::with('cate_post')->where('post_status',1)->where('post_slug',$post_slug)->take(1)->get();
        foreach($post as $key => $p){
            //seo
            $meta_desc = $p->post_meta_desc;
            $meta_keywords = $p->post_meta_keywords;
            $the_tieude = $p->post_title;
            $cate_id = $p->cate_post_id;
            $duongdan = $request->url();
            $cate_post_id = $p->cate_post_id;
            //end seo
        }
        $lienquan = Post::with('cate_post')->where('post_status',1)->where('cate_post_id',$cate_post_id)->whereNotIn('post_slug',[$post_slug])->take(5)->get();
        return view('pages.BaiViet.Baiviet')->with('category',$danhmuc_sanpham)->with('brand',$thuonghieu_sanpham)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('the_tieude',$the_tieude)->with('duongdan',$duongdan)->with('slider',$slider)->with('post',$post)->with('category_post',$category_post)->with('lienquan',$lienquan);
    }
}
