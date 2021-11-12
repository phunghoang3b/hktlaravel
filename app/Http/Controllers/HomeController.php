<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;//sử dụng database
use App\Http\Requests;
use Session;
use Mail;
use App\Models\Slider;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function Contact_us(Request $request){
        //--seo
        $meta_desc = "Siêu thị thực phẩm dinh dưỡng thể hình, the thao cao cấp chính hãng. Shop thực phẩm bổ sung Gym, sữa thể hình, Whey sữa tăng cơ bắp BODY Store Việt Nam.";
        $meta_keywords = "Dinh dưỡng và phụ kiện tập Gym";
        $the_tieude = "HKT - Gym Store";
        $duongdan = $request->url();
        //--end seo
        
        return view('pages.LienHe.Lien_he')->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('the_tieude',$the_tieude)->with('duongdan',$duongdan);
    }
    public function Gioithieu(Request $request){
        //--seo
        $meta_desc = "Siêu thị thực phẩm dinh dưỡng thể hình, the thao cao cấp chính hãng. Shop thực phẩm bổ sung Gym, sữa thể hình, Whey sữa tăng cơ bắp BODY Store Việt Nam.";
        $meta_keywords = "Dinh dưỡng và phụ kiện tập Gym";
        $the_tieude = "HKT - Gym Store";
        $duongdan = $request->url();
        //--end seo
        
        return view('pages.GioiThieu.Gioi_thieu')->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('the_tieude',$the_tieude)->with('duongdan',$duongdan);
    }

    public function trang_error(){
        return view('Errors.404');
    }

    public function intro_shop(){
        return view('pages.introduce');
    }

    public function index(Request $request){
        //--slider
        $slider = Slider::orderby('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        //--seo
        $meta_desc = "Siêu thị thực phẩm dinh dưỡng thể hình, the thao cao cấp chính hãng. Shop thực phẩm bổ sung Gym, sữa thể hình, Whey sữa tăng cơ bắp BODY Store Việt Nam.";
        $meta_keywords = "Dinh dưỡng và phụ kiện tập Gym";
        $the_tieude = "HKT - Gym Store";
        $duongdan = $request->url();
        //--end seo

        $danhmuc_sanpham = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $thuonghieu_sanpham = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $tatca_sanpham = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(4)->get();
        return view('pages.home')->with('category',$danhmuc_sanpham)->with('brand',$thuonghieu_sanpham)->with('allproduct',$tatca_sanpham)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('the_tieude',$the_tieude)->with('duongdan',$duongdan)->with('slider',$slider);
    }

    //tìm kiếm sản phẩm
    public function tim_kiem(Request $request){
        //--slider
        $slider = Slider::orderby('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        //seo
        $meta_desc = "Tìm kiếm sản phẩm";
        $meta_keywords = "Tìm kiếm sản phẩm";
        $the_tieude = "Tìm kiếm sản phẩm";
        $duongdan = $request->url();
        //end seo

        $tukhoa = $request->tukhoa_sanpham;
        $danhmuc_sanpham = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $thuonghieu_sanpham = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $timkiem_sanpham = DB::table('tbl_product')->where('product_name','like','%'.$tukhoa.'%')->get();
        return view('pages.SanPham.TimKiem')->with('category',$danhmuc_sanpham)->with('brand',$thuonghieu_sanpham)->with('timkiem_sanpham',$timkiem_sanpham)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('the_tieude',$the_tieude)->with('duongdan',$duongdan)->with('slider',$slider);
    }

    //gửi mail
    public function gui_mail(){
        $den_ten = "Khải Hoàng";
        $den_email = "nguyenhoangkhai492000@gmail.com";//gửi đến eamil của ai
        $data = array("name"=>"Mail từ tài khoản khách hàng","body"=>'Mail gửi về vấn đề hàng hóa');//body của mail.blade.php
        Mail::send('pages.Gui_email',$data,function($message) use ($den_ten, $den_email){
            $message->to($den_email)->subject('Test chức năng gửi mail');//gửi đến mail đó với subject
            $message->from($den_email,$den_ten);//gửi mẫu thư này
        });
        // return Redirect('/')->with('message','');
    }
}
