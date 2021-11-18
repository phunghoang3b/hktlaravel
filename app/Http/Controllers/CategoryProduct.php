<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;//sử dụng database
use App\Http\Requests;
use Session;
use Auth;
use App\Models\Slider;
use App\Imports\Imports;
use App\Exports\ExcelExports;
use Excel;
use App\Models\CategoryProductModel;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    public function KiemtraAdmin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('/Trangadmin');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    
    public function them_danhmuc_sanpham(){
        $this->KiemtraAdmin();
        return view('admin.DanhMucSanPham.themdanhmucsanpham');
    }

    public function danhsach_danhmuc_sanpham(){
        $this->KiemtraAdmin();
        $danhsach_DM_sanpham = DB::table('tbl_category_product')->get();
        $quanly_danhmuc_sanpham = view('admin.DanhMucSanPham.danhsachdanhmucsanpham')->with('danhsachDMsanpham',$danhsach_DM_sanpham);
        return view('admin_layout')->with('admin.DanhMucSanPham.danhsachdanhmucsanpham',$quanly_danhmuc_sanpham);
    }

    public function luu_danhmuc_sanpham(Request $request){
        $this->KiemtraAdmin();
        //khai bao bien data = mang
        $data = array();
        $data['category_name'] = $request->ten_sanpham;
        $data['meta_keywords'] = $request->tukhoa_mota_sanpham;
        $data['category_desc'] = $request->mota_sanpham;
        $data['category_status'] = $request->hienthi_sanpham;

        DB::table('tbl_category_product')->insert($data);
        Session::put('message','Thêm danh mục sản phẩm thành công');
        return Redirect::to('danhsachdanhmucsanpham');
    }
    //ẩn danh mục
    public function unactive_danhmuc($danhmuc_id){
        $this->KiemtraAdmin();
        //đi vào DB và kiểm tra 
        DB::table('tbl_category_product')->where('category_id',$danhmuc_id)->update(['category_status'=>1]);
        Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('danhsachdanhmucsanpham'); 
    }
    //hiển thị danh mục
    public function active_danhmuc($danhmuc_id){
        $this->KiemtraAdmin();
        DB::table('tbl_category_product')->where('category_id',$danhmuc_id)->update(['category_status'=>0]);
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('danhsachdanhmucsanpham'); 
    }
    //sua danh mục sản phẩm
    public function sua_danhmuc_sanpham($danhmuc_id){
        $this->KiemtraAdmin();
        $sua_DM_sanpham = DB::table('tbl_category_product')->where('category_id',$danhmuc_id)->get();
        $quanly_danhmuc_sanpham = view('admin.DanhMucSanPham.suadanhmucsanpham')->with('suaDMsanpham',$sua_DM_sanpham);
        return view('admin_layout')->with('admin.DanhMucSanPham.suadanhmucsanpham',$quanly_danhmuc_sanpham);
    }
    //cập nhật danh mục sản phẩm
    public function capnhat_DM_sanpham(Request $request, $danhmuc_id){
        $this->KiemtraAdmin();
        $data = array();
        $data['category_name'] = $request->ten_sanpham;
        $data['meta_keywords'] = $request->tukhoa_mota_sanpham;
        $data['category_desc'] = $request->mota_sanpham;
        DB::table('tbl_category_product')->where('category_id',$danhmuc_id)->update($data);
        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('danhsachdanhmucsanpham');
    }
    //xóa danh mục sản phẩm
    public function xoa_danhmuc_sanpham($danhmuc_id){
        $this->KiemtraAdmin();
        DB::table('tbl_category_product')->where('category_id',$danhmuc_id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('danhsachdanhmucsanpham');
    }

    //kết thúc phần admin
    //phần hiển thị danh mục trang index
    public function Hienthi_Danhmuc_index(Request $request, $danhmuc_id){
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(5)->get();

        $danhmuc_sanpham = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $thuonghieu_sanpham = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $danhmuc_theo_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('tbl_product.category_id',$danhmuc_id)->get();
        foreach($danhmuc_sanpham as $key => $giatri){
            //--seo
            $meta_desc = $giatri->category_desc;
            $meta_keywords = $giatri->meta_keywords;
            $the_tieude = $giatri->category_name;
            $duongdan = $request->url();
            //--end seo
        }

        //chọn tên danh mục, thương hiệu thì banner lọc theo tên
        $danhmuc_ten = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$danhmuc_id)->limit(1)->get();
        return view('pages.DanhMuc.Hienthi_danhmuc')->with('category',$danhmuc_sanpham)->with('brand',$thuonghieu_sanpham)->with('danhmuc_theo_id',$danhmuc_theo_id)->with('danhmuc_ten',$danhmuc_ten)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('the_tieude',$the_tieude)->with('duongdan',$duongdan)->with('slider',$slider);
    }

    //import file
    public function import_file(Request $request){
        $path = $request->file('file')->getRealPath();
        Excel::import(new Imports, $path);
        return back();
    }

    //export file
    public function export_file(){
        // product.xlsx tên file muốn đặt
        return Excel::download(new ExcelExports , 'category_product.xlsx');
    }
}
