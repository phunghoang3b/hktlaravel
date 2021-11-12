<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;//sử dụng database
use App\Http\Requests;
use Session;
use Cart;
use App\Models\Slider;
use Illuminate\Support\Facades\Redirect;
session_start();
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Feeship;

use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetails;

class CheckoutController extends Controller
{
    public function KiemtraAdmin(){
        $admin_id = Session::get('admin_id');
            if($admin_id){
                return Redirect::to('/Trangadmin');
            }else{
                return Redirect::to('/admin')->send();
            }
    }

    public function dangnhap_thanhtoan(Request $request){
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(5)->get();

        //seo
        $meta_desc = "Đăng nhập thanh toán";
        $meta_keywords = "Đăng nhập thanh toán";
        $the_tieude = "Đăng nhập thanh toán";
        $duongdan = $request->url();
        //seo

        $danhmuc_sanpham = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $thuonghieu_sanpham = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        return view('pages.ThanhToan.Dangnhap_thanhtoan')->with('category',$danhmuc_sanpham)->with('brand',$thuonghieu_sanpham)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('the_tieude',$the_tieude)->with('duongdan',$duongdan)->with('slider',$slider);
    }

    //đăng kí khách hàng
    public function them_khachhang(Request $request){
        //tạo mảng để chứa dữ liệu
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);
        $data['customer_phone'] = $request->customer_phone;

        $khachhang_id = DB::table('tbl_customers')->insertGetId($data);
        //khi thêm dữ liệu sẽ sinh ra 2 phiên là id, name
        Session::put('customer_id',$khachhang_id);
        Session::put('customer_name',$request->customer_name);
        return Redirect::to('/thanhtoan');
    }

    //thanh toán đơn hàng
    public function thanhtoan(Request $request){
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(5)->get();

        //seo
        $meta_desc = "Đăng nhập thanh toán";
        $meta_keywords = "Đăng nhập thanh toán";
        $the_tieude = "Đăng nhập thanh toán";
        $duongdan = $request->url();
        //seo

        $danhmuc_sanpham = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $thuonghieu_sanpham = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $city = City::orderby('matp','ASC')->get();
        return view('pages.ThanhToan.Hienthi_thanhtoan')->with('category',$danhmuc_sanpham)->with('brand',$thuonghieu_sanpham)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('the_tieude',$the_tieude)->with('duongdan',$duongdan)->with('city',$city)->with('slider',$slider);
    }

    //lưu thông tin thanh toán khách hàng
    public function luu_thanhtoan_khachhang(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_notes'] = $request->shipping_notes;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
        Session::put('shipping_id',$shipping_id);
        return Redirect::to('/payment');
    }

    //thanh toán
    public function payment(Request $request){
        //seo
        $meta_desc = "Đăng nhập thanh toán";
        $meta_keywords = "Đăng nhập thanh toán";
        $the_tieude = "Đăng nhập thanh toán";
        $duongdan = $request->url();
        //seo

        $danhmuc_sanpham = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $thuonghieu_sanpham = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        return view('pages.ThanhToan.Payment')->with('category',$danhmuc_sanpham)->with('brand',$thuonghieu_sanpham)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('the_tieude',$the_tieude)->with('duongdan',$duongdan);
    }
    //đăng xuất tài khoản
    public function dangxuat_thanhtoan(){
        Session::flush();
        return Redirect::to('/');
    }
    //Đăng nhập tài khoản
    public function dangnhap_khachhang(Request $request){
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table('tbl_customers')->where('customer_email',$email)->where('customer_password',$password)->first();
        if($result){
            Session::put('customer_id',$result->customer_id);
            return Redirect::to('/thanhtoan');
        }else{
            return Redirect::to('/dangnhap_thanhtoan');
        }
    }

    //Hình thức thanh toán và đặt hàng
    public function hinhthuc_thanhtoan(Request $request){
        //seo
        $meta_desc = "Đăng nhập thanh toán";
        $meta_keywords = "Đăng nhập thanh toán";
        $the_tieude = "Đăng nhập thanh toán";
        $duongdan = $request->url();
        //seo

        //them hinh thuc thanh toan
        $data = array();
        $data['payment_method'] = $request->caidat_payment;
        $data['payment_status'] = 'Đang xử lý...';
        $thanhtoan_id = DB::table('tbl_payment')->insertGetId($data);
        
        //them vao don hang
        $donhang_data = array();
        $donhang_data['customer_id'] = Session::get('customer_id');
        $donhang_data['shipping_id'] = Session::get('shipping_id');
        $donhang_data['payment_id'] = $thanhtoan_id;
        $donhang_data['order_total'] = Cart::total();
        $donhang_data['order_status'] = 'Đang xử lý...';
        $donhang_id = DB::table('tbl_order')->insertGetId($donhang_data);

        //them vao chi tiet don hang
        $content = Cart::content();
        foreach($content as $giatri){
            $chitiet_donhang['order_id'] = $donhang_id;
            $chitiet_donhang['product_id'] = $giatri->id;
            $chitiet_donhang['product_name'] = $giatri->name;
            $chitiet_donhang['product_price'] = $giatri->price;
            $chitiet_donhang['product_sales_quantity'] = $giatri->qty;
            DB::table('tbl_order_details')->insert($chitiet_donhang);
        }
        if($data['payment_method'] == 1){
            echo 'Thanh toán bằng thẻ ATM';
        }else{
            Cart::destroy();
            $danhmuc_sanpham = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
            $thuonghieu_sanpham = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
            return view('pages.ThanhToan.payATM')->with('category',$danhmuc_sanpham)->with('brand',$thuonghieu_sanpham)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('the_tieude',$the_tieude)->with('duongdan',$duongdan);
        }
    }

    //quản lý đơn hàng admin
    public function quanly_donhang(){
        $this->KiemtraAdmin();
        $danhsach_donhang = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->select('tbl_order.*','tbl_customers.customer_name')
        ->orderby('tbl_order.order_id','desc')->get();
        $quanly_DH = view('admin.quanly_donhang')->with('danhsach_donhang',$danhsach_donhang);
        return view('admin_layout')->with('admin.quanly_donhang',$quanly_DH);
    }

    //chi tiết đơn hàng
    public function sua_donhang($orderId){
        $this->KiemtraAdmin();
        $donhang_theo_id = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->select('tbl_order.*','tbl_customers.*','tbl_shipping.*','tbl_order_details.*')->first();
        $quanly_CTDH_id = view('admin.chitiet_donhang')->with('donhang_theo_id',$donhang_theo_id);
        return view('admin_layout')->with('admin.chitiet_donhang',$quanly_CTDH_id);
    }

    //thanh toán chọn phí vận chuyển
    public function chon_vanchuyen_giohang(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action'] == "city"){
                $chon_quanhuyen = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
                    $output.='<option>----Chọn quận huyện----</option>';
                foreach($chon_quanhuyen as $key => $quanhuyen){
                    $output.='<option value="'.$quanhuyen->maqh.'">'.$quanhuyen->name_quanhuyen.'</option>';
                }
            }else{
                $chon_xaphuong = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
                    $output.='<option>----Chọn xã phường----</option>';
                foreach($chon_xaphuong as $key => $xaphuong){
                    $output.='<option value="'.$xaphuong->xaid.'">'.$xaphuong->name_xaphuong.'</option>';
                }
            }
            echo $output;
        }
    }

    //tính phí vận chuyển giỏ hàng
    public function tinhtoanphi_giohang(Request $request){
        $data = $request->all();
        if($data['matp']){
            $feeship = Feeship::where('fee_matp',$data['matp'])->where('fee_maqh',$data['maqh'])->where('fee_xaid',$data['xaid'])->get();
            if($feeship){
                $dem_feeship = $feeship->count();
                if($dem_feeship > 0){
                        foreach($feeship as $key => $fee){
                        Session::put('fee',$fee->fee_feeship);
                        Session::save();
                    }
                }else{
                    Session::put('fee',15000);
                    Session::save();
                }
            }
        }
    }

    //xóa phí vân chuyển giỏ hàng
    public function xoaphi_giohang(){
        Session::forget('fee');
        return redirect()->back();
    }

    //xác nhận đơn hàng
    public function xacnhan_donhang(Request $request){
        $data = $request->all();
        $shipping = new Shipping();
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_notes = $data['shipping_notes'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->save();
        $shipping_id = $shipping->shipping_id;

        // tạo mã order_code random tự động
        $checkout_code = substr(md5(microtime()),rand(0,26),5);

        $order = new Order();
        $order->customer_id = Session::get('customer_id');
        $order->shipping_id = $shipping_id;
        // cho bằng 1 tức lấy thông tin của đơn hàng mới
        $order->order_status = 1;
        $order->order_code = $checkout_code;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order->save();

        if(Session::get('giohang') == true){
            foreach(Session::get('giohang') as $key => $gio){
                $order_details = new OrderDetails();
                $order_details->order_code = $checkout_code;
                $order_details->product_id = $gio['product_id'];
                $order_details->product_name = $gio['product_name'];
                $order_details->product_price = $gio['product_price'];
                $order_details->product_sales_quantity = $gio['product_sales_quantity'];
                $order_details->product_coupon = $data['order_coupon'];
                $order_details->product_feeship = $data['order_fee'];
                $order_details->save();
            }
        }
        Session::forget('giamgia');
        Session::forget('fee');
        Session::forget('giohang');
    }
}
