<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feeship;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Customer;
use App\Models\Coupon;
use App\Models\Product;
use PDF;

class OrderController extends Controller
{
    public function quanly_donhang(){
        $order = Order::orderby('created_at','DESC')->get();
        return view('admin.quanly_donhang')->with(compact('order'));
    }

    // xem chi tiết đơn hàng
    public function xem_donhang($order_code){
        $order_details = OrderDetails::where('order_code',$order_code)->get();
        $order = Order::where('order_code',$order_code)->get();
        foreach($order as $key => $ord){
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
            $order_status = $ord->order_status;
        }
        $customer = Customer::where('customer_id',$customer_id)->first();
        $shipping = Shipping::where('shipping_id',$shipping_id)->first();

        $order_details_product = OrderDetails::with('product')->where('order_code',$order_code)->get();
        foreach($order_details_product as $key => $chitiet){
            $product_coupon = $chitiet->product_coupon;
        }
        if($product_coupon != 'no'){
            $coupon = Coupon::where('coupon_code',$product_coupon)->first();
            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;
        }else{
            $coupon_condition = 2;
            $coupon_number = 0;
        }
        return view('admin.chitiet_donhang')->with(compact('order_details','customer','shipping','order_details','coupon_condition','coupon_number','order','order_status'));
    }

    //in đơn hàng
    public function in_donhang($checkout_code){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->in_donhang_chuyen($checkout_code));
        return $pdf->stream();
    }

    public function in_donhang_chuyen($checkout_code){
        $order_details = OrderDetails::with('product')->where('order_code',$checkout_code)->get();
        $order = Order::where('order_code',$checkout_code)->get();
        foreach($order as $key => $ord){
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
        }
        $customer = Customer::where('customer_id',$customer_id)->first();
        $shipping = Shipping::where('shipping_id',$shipping_id)->first();

        $order_details_product = OrderDetails::with('product')->where('order_code',$checkout_code)->get();
        foreach($order_details_product as $key => $chitiet){
            $product_coupon = $chitiet->product_coupon;
        }
        if($product_coupon != 'no'){
            $coupon = Coupon::where('coupon_code',$product_coupon)->first();
            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;

            if($coupon_condition == 1){
                $thongbao_giamgia = $coupon_number.' %';
            }elseif($coupon_condition == 2){
                $thongbao_giamgia = number_format($coupon_number,0,',','.').' đ';
            }
        }else{
            $coupon_condition = 2;
            $coupon_number = 0;
            $thongbao_giamgia = '0';
        }
        $output = '';
        $output.='<style>
                body{
                    font-family: DejaVu Sans;
                }
            </style>
            <h2 style="text-align: center;">Shop thực phẩm bổ sung HKT - Gym Store</h2>
            <h3 style="text-align: center;">Khách Đặt Hàng</h3>
            <table class="table-styling">
                <thead>
                    <tr>
                        <th style="border: 1px solid;text-align: center;">Tên khách hàng</th>
                        <th style="border: 1px solid;text-align: center;">Số điện thoại</th>
                        <th style="border: 1px solid;text-align: center;">Email</th>
                    </tr>
                </thead>
                <tbody>';
        $output.='
                    <tr>
                        <td style="border: 1px solid;text-align: center;">'.$customer->customer_name.'</td>
                        <td style="border: 1px solid;text-align: center;">'.$customer->customer_phone.'</td>
                        <td style="border: 1px solid;text-align: center;">'.$customer->customer_email.'</td>
                    </tr>';
        $output.='
                </tbody>
            </table>

            <h3 style="text-align: center;">Người Nhận Hàng</h3>
            <table class="table-styling">
                <thead>
                    <tr>
                        <th style="border: 1px solid;text-align: center;">Tên người nhận</th>
                        <th style="border: 1px solid;text-align: center;">Địa chỉ</th>
                        <th style="border: 1px solid;text-align: center;">Số điện thoại</th>
                        <th style="border: 1px solid;text-align: center;">Email</th>
                        <th style="border: 1px solid;text-align: center;">Ghi chú</th>
                    </tr>
                </thead>
                <tbody>';
        $output.='
                    <tr>
                        <td style="border: 1px solid;text-align: center;">'.$shipping->shipping_name.'</td>
                        <td style="border: 1px solid;text-align: center;">'.$shipping->shipping_address.'</td>
                        <td style="border: 1px solid;text-align: center;">'.$shipping->shipping_phone.'</td>
                        <td style="border: 1px solid;text-align: center;">'.$shipping->shipping_email.'</td>
                        <td style="border: 1px solid;text-align: center;">'.$shipping->shipping_notes.'</td>
                    </tr>';
        $output.='
                </tbody>
            </table>

            <h3 style="text-align: center;">Đơn Hàng</h3>
            <table class="table-styling">
                <thead>
                    <tr>
                        <th style="border: 1px solid;text-align: center;">Tên sản phẩm</th>
                        <th style="border: 1px solid;text-align: center;">Mã giảm giá</th>
                        <th style="border: 1px solid;text-align: center;">Phí ship</th>
                        <th style="border: 1px solid;text-align: center;">Số lượng</th>
                        <th style="border: 1px solid;text-align: center;">Giá sản phẩm</th>
                        <th style="border: 1px solid;text-align: center;">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>';               

                $tongtien = 0;
                foreach($order_details_product as $key => $dh){
                    $thanhtien = $dh->product_price*$dh->product_sales_quantity;
                    $tongtien += $thanhtien;

                    if($dh->product_coupon != 'no'){
                        $product_coupon = $dh->product_coupon;
                    }else{
                        $product_coupon = 'Không mã';
                    }
        $output.='
                    <tr>
                        <td style="border: 1px solid;text-align: center;">'.$dh->product_name.'</td>
                        <td style="border: 1px solid;text-align: center;">'.$product_coupon.'</td>
                        <td style="border: 1px solid;text-align: center;">'.number_format($dh->product_feeship,0,',','.').' đ'.'</td>
                        <td style="border: 1px solid;text-align: center;">'.$dh->product_sales_quantity.'</td>
                        <td style="border: 1px solid;text-align: center;">'.number_format($dh->product_price,0,',','.').' đ'.'</td>
                        <td style="border: 1px solid;text-align: center;">'.number_format($thanhtien,0,',','.').' đ'.'</td>
                    </tr>';}

                if($coupon_condition == 1){
                    $tongtiensau_giamgia = ($tongtien*$coupon_number)/100;
                    $tongtien_giamgia = $tongtien - $tongtiensau_giamgia;
                }else{
                    $tongtien_giamgia = $tongtien - $coupon_number;
                }

        $output.= '<tr>
            <td colspan="2">
                <p>Tổng giảm: '.$thongbao_giamgia.'</p>
                <p>Phí ship: '.number_format($dh->product_feeship,0,',','.').' đ'.'</p>
                <p>Thanh toán: '.number_format($tongtien_giamgia - $dh->product_feeship,0,',','.').' đ'.'</p>
            </td>
        </tr>';
        $output.='
                </tbody>
            </table>

            <h3 style="text-align: center;">Ký Tên</h3>
            <table>
                <thead>
                    <tr>
                        <th width="200px">Người lập phiếu</th>
                        <th width="800px">Người nhận</th>
                    </tr>
                </thead>
                <tbody>';
        $output.='
                </tbody>
            </table>';
        return $output;
    }

    //cập nhật số lượng dơn hàng 
    public function capnhat_sldh(Request $request){
        //cập nhật đơn hàng
        $data = $request->all();
        $order = Order::find($data['order_id']);
        $order->order_status = $data['order_status'];
        $order->save();

        //thay đổi trạng thái xử lý đơn hàng khi value = 2
        if($order->order_status == 2){
            foreach($data['order_product_id'] as $key => $product_id){
                $product = Product::find($product_id);
                $product_quantity = $product->product_quantity;
                $product_sold = $product->product_sold;
                foreach($data['quantity'] as $key2 => $soluong){
                    if($key == $key2){
                        $sanpham_conlai = $product_quantity - $soluong;
                        $product->product_quantity = $sanpham_conlai;
                        $product->product_sold = $product_sold + $soluong;
                        $product->save();
                    }
                }
            }
        }elseif($order->order_status != 2 && $order->order_status != 3){
            foreach($data['order_product_id'] as $key => $product_id){
                $product = Product::find($product_id);
                $product_quantity = $product->product_quantity;
                $product_sold = $product->product_sold;
                foreach($data['quantity'] as $key2 => $soluong){
                    if($key == $key2){
                        $sanpham_conlai = $product_quantity + $soluong;
                        $product->product_quantity = $sanpham_conlai;
                        $product->product_sold = $product_sold - $soluong;
                        $product->save();
                    }
                }
            }
        }
    }

    //cập nhật nút số lượng đơn hàng
    public function capnhat_btn_sldh(Request $request){
        $data = $request->all();
        $order_details = OrderDetails::where('product_id',$data['order_product_id'])->where('order_code',$data['order_code'])->first();
        $order_details->product_sales_quantity = $data['sl_donhang'];
        $order_details->save();
    }
}
