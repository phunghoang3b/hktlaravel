<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;//sử dụng database
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cart;
use App\Models\Slider;
use App\Models\Coupon;
session_start();

class CartController extends Controller
{
    public function luu_giohang(Request $request){        
        $sanphamId = $request->sanphamid_hidden;
        $soluong = $request->so_luong;
        $thongtin_sanpham = DB::table('tbl_product')->where('product_id',$sanphamId)->first();

        $data['id'] = $thongtin_sanpham->product_id;
        $data['qty'] = $soluong;
        $data['name'] = $thongtin_sanpham->product_name;
        $data['price'] = $thongtin_sanpham->product_price;
        $data['weight'] = $thongtin_sanpham->product_price;
        $data['options']['image'] = $thongtin_sanpham->product_image;
        Cart::add($data);
        Cart::setGlobalTax(5);
        return Redirect::to('/hienthi-giohang');
    }

    public function hienthi_giohang(Request $request){
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(5)->get();
        
        //seo
        $meta_desc = "Giỏ hàng của bạn";
        $meta_keywords = "Giỏ hàng";
        $the_tieude = "Giỏ hàng";
        $duongdan = $request->url();
        //seo

        $danhmuc_sanpham = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $thuonghieu_sanpham = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        return view('pages.GioHang.Hienthi_giohang')->with('category',$danhmuc_sanpham)->with('brand',$thuonghieu_sanpham)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('the_tieude',$the_tieude)->with('duongdan',$duongdan)->with('slider',$slider);
    }

    //xóa giỏ hàng
    public function xoa_giohang($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/hienthi-giohang');
    }
    //cập nhật số lượng giỏ hàng
    public function capnhat_sl_giohang(Request $request){
        $rowId = $request->rowId_sp;
        $soluong = $request->quantity_cart;
        Cart::update($rowId,$soluong);
        return Redirect::to('/hienthi-giohang');
    }

    //Giỏ hàng Ajax
    public function themgiohang_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $giohang = Session::get('giohang');
        if($giohang == true){
            $tontai_sp = 0;
            foreach($giohang as $key => $giatri){
                if($giatri['product_id'] == $data['cart_product_id']){
                    $tontai_sp++;
                }
            }
            if($tontai_sp == 0){
                $giohang[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_quantity' => $data['cart_product_quantity'],
                'product_sales_quantity' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
                );
                Session::put('giohang',$giohang);
            }
        }else{
            $giohang[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_quantity' => $data['cart_product_quantity'],
                'product_sales_quantity' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
            );
            Session::put('giohang',$giohang);
        }       
        Session::save();
    }

    public function giohang_ajax(Request $request){
        //seo
        $meta_desc = "Giỏ hàng của bạn";
        $meta_keywords = "Giỏ hàng Ajax";
        $the_tieude = "Giỏ hàng";
        $duongdan = $request->url();
        //seo

        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(5)->get();

        $danhmuc_sanpham = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $thuonghieu_sanpham = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        return view('pages.GioHang.Giohang_ajax')->with('category',$danhmuc_sanpham)->with('brand',$thuonghieu_sanpham)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('the_tieude',$the_tieude)->with('duongdan',$duongdan)->with('slider',$slider);
    }
    //xóa sản phẩm trong giỏ hàng
    public function xoasp_ajax($session_id){
        $giohang = Session::get('giohang');
        if($giohang == true){
            foreach($giohang as $key => $giatri){
                if($giatri['session_id'] == $session_id){
                    unset($giohang[$key]);
                }
            }
            Session::put('giohang',$giohang);
            return redirect()->back()->with('message','Xóa sản phẩm thành công');
        }else{
            return redirect()->back()->with('message','Xóa sản phẩm thất bại');
        }
    }
    //cập nhật giỏ hàng
    public function capnhat_giohang_ajax(Request $request){
        $data = $request->all();
        $giohang = Session::get('giohang');
        if($giohang == true){
            $message = '';
            foreach($data['cart_qty'] as $key => $sluong){
                $i = 0;
                foreach($giohang as $session => $giatri){
                    $i++;
                    if($giatri['session_id'] == $key && $sluong < $giohang[$session]['product_quantity']){
                        $giohang[$session]['product_sales_quantity'] = $sluong;
                        $message.='<p style="color:#111">'.$i.') Cập nhật số lượng :'.$giohang[$session]['product_name'].' thành công</p>';
                    }elseif($giatri['session_id'] == $key && $sluong > $giohang[$session]['product_quantity']){
                        $message.='<p style="color:red">'.$i.') Cập nhật số lượng :'.$giohang[$session]['product_name'].' thất bại</p>';
                    }
                }
            }
            Session::put('giohang',$giohang);
            return redirect()->back()->with('message',$message);
        }else{
            return redirect()->back()->with('message','Cập nhật số lượng thất bại');
        }
    }
    //xóa tất cả sản phẩm trong giỏ hàng
    public function xoatatca_giohang(){
        $giohang = Session::get('giohang');
        if($giohang == true){
            Session::forget('giohang');
            Session::forget('giamgia');
            return redirect()->back()->with('message','Xóa giỏ hàng thành công');
        }
    }

    //mã giảm giá
    public function kiemtra_giamgia(Request $request){
        $data = $request->all();
        $coupon = Coupon::where('coupon_code',$data['giamgia'])->first();
        if($coupon){
            $count_coupon = $coupon->count();
            if($count_coupon>0){
                $coupon_session = Session::get('giamgia');
                if($coupon_session==true){
                    $is_avaiable = 0;
                    if($is_avaiable==0){
                        $cou[] = array(
                            'ma_giamgia' => $coupon->coupon_code,
                            'tinhnang_giamgia' => $coupon->coupon_condition,
                            'so_giamgia' => $coupon->coupon_number,
                        );
                        Session::put('giamgia',$cou);
                    }
                }else{
                    $cou[] = array(
                            'ma_giamgia' => $coupon->coupon_code,
                            'tinhnang_giamgia' => $coupon->coupon_condition,
                            'so_giamgia' => $coupon->coupon_number,
                        );
                    Session::put('giamgia',$cou);
                }
                Session::save();
                return redirect()->back()->with('message','Thêm mã giảm giá thành công');
            }
        }else{
            return redirect()->back()->with('error','Mã giảm giá không đúng');
        }
    }

}
