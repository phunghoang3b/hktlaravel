<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;//sử dụng database
use App\Http\Requests;
use Session;
use Auth;
use App\Models\Slider;
use App\Models\CatePost;
use Illuminate\Support\Facades\Redirect;
use App\Imports\ImportBrand;
use App\Exports\ExcelBrand;
use Excel;
session_start();

class BrandProduct extends Controller
{
    public function KiemtraAdmin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('/Trangadmin');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    
    public function them_thuonghieu_sanpham(){
        $this->KiemtraAdmin();
        return view('admin.ThuongHieu.themthuonghieu');
    }

    public function danhsach_thuonghieu_sanpham(){
        $this->KiemtraAdmin();
        $danhsach_TH_sanpham = DB::table('tbl_brand')->get();
        $quanly_thuonghieu_sanpham = view('admin.ThuongHieu.danhsachthuonghieu')->with('danhsachTHsanpham',$danhsach_TH_sanpham);
        return view('admin_layout')->with('admin.ThuongHieu.danhsachthuonghieu',$quanly_thuonghieu_sanpham);
    }

    public function luu_thuonghieu_sanpham(Request $request){
        $this->KiemtraAdmin();
        //khai bao bien data = mang
        $data = array();
        $data['brand_name'] = $request->ten_thuonghieu;
        $data['meta_keywords'] = $request->tukhoa_mota_thuonghieu;
        $data['brand_desc'] = $request->mota_thuonghieu;
        $data['brand_status'] = $request->hienthi_thuonghieu;
        $data['brand_slug'] = $request->slug_thuonghieu;

        DB::table('tbl_brand')->insert($data);
        Session::put('message','Thêm thương hiệu sản phẩm thành công');
        return Redirect::to('themthuonghieu');
    }
    //ẩn danh mục
    public function unactive_thuonghieu($thuonghieu_id){
        $this->KiemtraAdmin();
        //đi vào DB và kiểm tra 
        DB::table('tbl_brand')->where('brand_id',$thuonghieu_id)->update(['brand_status'=>1]);
        Session::put('message','Không kích hoạt thương hiệu sản phẩm thành công');
        return Redirect::to('danhsachthuonghieu'); 
    }
    //hiển thị danh mục
    public function active_thuonghieu($thuonghieu_id){
        $this->KiemtraAdmin();
        DB::table('tbl_brand')->where('brand_id',$thuonghieu_id)->update(['brand_status'=>0]);
        Session::put('message','Kích hoạt thương hiệu sản phẩm thành công');
        return Redirect::to('danhsachthuonghieu'); 
    }
    //sua danh mục sản phẩm
    public function sua_thuonghieu_sanpham($thuonghieu_id){
        $this->KiemtraAdmin();
        $sua_TH_sanpham = DB::table('tbl_brand')->where('brand_id',$thuonghieu_id)->get();
        $quanly_thuonghieu_sanpham = view('admin.ThuongHieu.suathuonghieu')->with('suaTHsanpham',$sua_TH_sanpham);
        return view('admin_layout')->with('admin.ThuongHieu.suathuonghieu',$quanly_thuonghieu_sanpham);
    }
    //cập nhật danh mục sản phẩm
    public function capnhat_TH_sanpham(Request $request, $thuonghieu_id){
        $this->KiemtraAdmin();
        $data = array();
        $data['brand_name'] = $request->ten_thuonghieu;
        $data['meta_keywords'] = $request->tukhoa_mota_thuonghieu;
        $data['brand_desc'] = $request->mota_thuonghieu;
        $data['brand_slug'] = $request->slug_thuonghieu;
        DB::table('tbl_brand')->where('brand_id',$thuonghieu_id)->update($data);
        Session::put('message','Cập nhật thương hiệu sản phẩm thành công');
        return Redirect::to('danhsachthuonghieu');
    }
    //xóa danh mục sản phẩm
    public function xoa_thuonghieu_sanpham($thuonghieu_id){
        $this->KiemtraAdmin();
        DB::table('tbl_brand')->where('brand_id',$thuonghieu_id)->delete();
        Session::put('message','Xóa thương hiệu sản phẩm thành công');
        return Redirect::to('danhsachthuonghieu');
    }
    //kết thúc phần admin
    //phần hiển thị thương hiệu trang index
    public function Hienthi_Thuonghieu_index(Request $request, $thuonghieu_id){
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(5)->get();

        //danh mục bài viết
        $category_post = CatePost::orderby('cate_post_id','DESC')->get();
        
        $danhmuc_sanpham = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $thuonghieu_sanpham = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $thuonghieu_theo_id = DB::table('tbl_product')->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')->where('tbl_product.brand_id',$thuonghieu_id)->get();
        foreach($thuonghieu_sanpham as $key => $giatri){
            //--seo
            $meta_desc = $giatri->brand_desc;
            $meta_keywords = $giatri->meta_keywords;
            $the_tieude = $giatri->brand_name;
            $duongdan = $request->url();
            //--end seo
        }

        //chọn tên danh mục, thương hiệu thì banner lọc theo tên
        $thuonghieu_ten = DB::table('tbl_brand')->where('tbl_brand.brand_id',$thuonghieu_id)->limit(1)->get();
        return view('pages.ThuongHieu.Hienthi_thuonghieu')->with('category',$danhmuc_sanpham)->with('brand',$thuonghieu_sanpham)->with('thuonghieu_theo_id',$thuonghieu_theo_id)->with('thuonghieu_ten',$thuonghieu_ten)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('the_tieude',$the_tieude)->with('duongdan',$duongdan)->with('slider',$slider)->with('category_post',$category_post);
    }

    public function import_file_brand(Request $request){
         $path = $request->file('file')->getRealPath();
        Excel::import(new ImportBrand, $path);
        return back();
    }
    public function export_file_brand(){
        return Excel::download(new ExcelBrand , 'brand_product.xlsx');
    }
}
