<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class CouponController extends Controller
{
    public function them_magiamgia(){
        return view('admin.Giamgia.them_giamgia');
    }

    public function luumagiamgia(Request $request){
        $data = $request->all();
        $giamgia = new Coupon;

        $giamgia->coupon_name = $data['ten_giamgia'];
        $giamgia->coupon_code = $data['ma_giamgia'];
        $giamgia->coupon_time = $data['soluong_giamgia'];
        $giamgia->coupon_number = $data['so_giamgia'];
        $giamgia->coupon_condition = $data['tinhnang_giamgia'];
        $giamgia->save();
        Session::put('message','Thêm mã giảm giá thành công');
        return Redirect::to('them-magiamgia');
    }

    public function danhsachmagiamgia(){
        $giamgia = Coupon::orderby('coupon_id','DESC')->get();
        return view('admin.Giamgia.danhsach_giamgia')->with(compact('giamgia'));
    }

    public function xoamagiamgia($coupon_id){
        $giamgia = Coupon::find($coupon_id);
        $giamgia->delete();
        Session::put('message','Xóa mã giảm giá thành công');
        return Redirect::to('danhsachmagiamgia');
    }

    public function xoagiamgia_giohang(){
        $giamgia = Session::get('giamgia');
        if($giamgia == true){
            Session::forget('giamgia');
            return redirect()->back()->with('message','Xóa mã khuyến mãi thành công');
        }
    }
}
