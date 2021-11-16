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
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
    public function KiemtraAdmin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('/Trangadmin');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    
    public function them_sanpham(){
        $this->KiemtraAdmin();
        $danhmuc_sanpham = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $thuonghieu_sanpham = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        return view('admin.themsanpham')->with('danhmuc_sanpham',$danhmuc_sanpham)->with('thuonghieu_sanpham',$thuonghieu_sanpham);
    }

    public function danhsach_sanpham(){
        $this->KiemtraAdmin();
        $danhsach_sanpham = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->orderby('tbl_product.product_id','desc')->get();
        $quanly_sanpham = view('admin.danhsachsanpham')->with('danhsachsanpham',$danhsach_sanpham);
        return view('admin_layout')->with('admin.danhsachsanpham',$quanly_sanpham);
    }

    public function luu_sanpham(Request $request){
        $this->KiemtraAdmin();
        //khai bao bien data = mang
        $data = array();
        $data['product_name'] = $request->ten_sanpham;
        $data['product_quantity'] = $request->soluong_sanpham;
        $data['product_price'] = $request->gia_sanpham;
        $data['product_desc'] = $request->mota_sanpham;
        $data['product_content'] = $request->noidung_sanpham;
        $data['category_id'] = $request->danhmuc;
        $data['brand_id'] = $request->thuonghieu;
        $data['product_status'] = $request->hienthi_sanpham;

        $get_image = $request->file('hinhanh_sanpham');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('danhsachsanpham');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('danhsachsanpham');
    }
    //ẩn sản phẩm
    public function unactive_sanpham($sanpham_id){
        $this->KiemtraAdmin();
        //đi vào DB và kiểm tra 
        DB::table('tbl_product')->where('product_id',$sanpham_id)->update(['product_status'=>1]);
        Session::put('message','Không kích hoạt sản phẩm thành công');
        return Redirect::to('danhsachsanpham'); 
    }
    //hiển thị sản phẩm
    public function active_sanpham($sanpham_id){
        $this->KiemtraAdmin();
        DB::table('tbl_product')->where('product_id',$sanpham_id)->update(['product_status'=>0]);
        Session::put('message','Kích hoạt sản phẩm thành công');
        return Redirect::to('danhsachsanpham'); 
    }
    //sửa sản phẩm
    public function sua_sanpham($sanpham_id){
        $this->KiemtraAdmin();
        $danhmuc_sanpham = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $thuonghieu_sanpham = DB::table('tbl_brand')->orderby('brand_id','desc')->get();

        $sua_sanpham = DB::table('tbl_product')->where('product_id',$sanpham_id)->get();
        $quanly_sanpham = view('admin.suasanpham')->with('suasanpham',$sua_sanpham)->with('danhmuc_sanpham',$danhmuc_sanpham)->with('thuonghieu_sanpham',$thuonghieu_sanpham);
        return view('admin_layout')->with('admin.suasanpham',$quanly_sanpham);
    }
    //cập nhật sản phẩm
    public function capnhat_sanpham(Request $request, $sanpham_id){
        $this->KiemtraAdmin();
        $data = array();
        $data['product_name'] = $request->ten_sanpham;
        $data['product_quantity'] = $request->soluong_sanpham;
        $data['product_price'] = $request->gia_sanpham;
        $data['product_desc'] = $request->mota_sanpham;
        $data['product_content'] = $request->noidung_sanpham;
        $data['category_id'] = $request->danhmuc;
        $data['brand_id'] = $request->thuonghieu;
        $data['product_status'] = $request->hienthi_sanpham;
        //chon san pham moi dc cap nhat
        $get_image = $request->file('hinhanh_sanpham');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id',$sanpham_id)->update($data);
            Session::put('message','Sửa sản phẩm thành công');
            return Redirect::to('danhsachsanpham');
        }
        DB::table('tbl_product')->where('product_id',$sanpham_id)->update($data);
        Session::put('message','Sửa sản phẩm thành công');
        return Redirect::to('danhsachsanpham');
    }
    //xóa sản phẩm
    public function xoa_sanpham($sanpham_id){
        $this->KiemtraAdmin();
        DB::table('tbl_product')->where('product_id',$sanpham_id)->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('danhsachsanpham');
    }

    //chi tiết sản phẩm
    public function Chi_tiet_san_pham(Request $request, $sanpham_id){
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(5)->get();
        
        $danhmuc_sanpham = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $thuonghieu_sanpham = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        //lấy chi tiết sản phẩm
        $chitiet_sanpham = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id',$sanpham_id)->get();

        foreach($chitiet_sanpham as $key => $chitiet){
            $danhmuc_id = $chitiet->category_id;
            //seo
            $meta_desc = $chitiet->product_desc;
            $meta_keywords = $chitiet->product_content;
            $the_tieude = $chitiet->product_name;
            $duongdan = $request->url();
        }
        //lay ra danh muc thuoc id 
        $sanpham_lienquan = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_category_product.category_id',$danhmuc_id)->whereNotIn('tbl_product.product_id',[$sanpham_id])->get();

        return view('pages.SanPham.Hienthi_chitiet')->with('category',$danhmuc_sanpham)->with('brand',$thuonghieu_sanpham)->with('chitiet_sanpham',$chitiet_sanpham)->with('lienquan',$sanpham_lienquan)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('the_tieude',$the_tieude)->with('duongdan',$duongdan)->with('slider',$slider);
    }

    //import file
    public function import_file_product(Request $request){
        $path = $request->file('file')->getRealPath();
        Excel::import(new ImportProduct, $path);
        return back();
    }

    //export file
    public function export_file_product(){
        // product.xlsx tên file muốn đặt
        return Excel::download(new ExcelProduct , 'product.xlsx');
    }
}
