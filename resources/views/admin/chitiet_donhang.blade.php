@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin khách hàng
    </div>
    <div class="table-responsive">
      <?php
        $message = Session::get('message');
        if($message){
          echo '<span class="text-alert">',$message,'</span>';
          Session::put('message',null);
        }
      ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="border: 1px solid;text-align: center;">Tên khách hàng</th>
            <th style="border: 1px solid;text-align: center;">Số điện thoại</th>
            <th style="border: 1px solid;text-align: center;">Email</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="border: 1px solid;text-align: center;">{{$customer->customer_name}}</td>
            <td style="border: 1px solid;text-align: center;">{{$customer->customer_phone}}</td>
            <td style="border: 1px solid;text-align: center;">{{$customer->customer_email}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<br><br>

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin vận chuyển hàng
    </div>
    <div class="table-responsive">
      <?php
        $message = Session::get('message');
        if($message){
          echo '<span class="text-alert">',$message,'</span>';
          Session::put('message',null);
        }
      ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="border: 1px solid;text-align: center;width: 15%;">Tên người vận chuyển</th>
            <th style="border: 1px solid;text-align: center;width: 25%;">Địa chỉ</th>
            <th style="border: 1px solid;text-align: center;">Số điện thoại</th>
            <th style="border: 1px solid;text-align: center;width: 15%;">Email</th>
            <th style="border: 1px solid;text-align: center;width: 22%;">Ghi chú</th>
            <th style="border: 1px solid;text-align: center;width: 12%;">Hình thức thanh toán</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="border: 1px solid;text-align: center">{{$shipping->shipping_name}}</td>
            <td style="border: 1px solid;">{{$shipping->shipping_address}}</td>
            <td style="border: 1px solid;text-align: center;">{{$shipping->shipping_phone}}</td>
            <td style="border: 1px solid;text-align: center;">{{$shipping->shipping_email}}</td>
            <td style="border: 1px solid;">{{$shipping->shipping_notes}}</td>
            <td style="border: 1px solid;text-align: center;">@if($shipping->shipping_method == 0)
                Chuyển khoản
              @else
                Tiền mặt
              @endif
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<br><br>

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Chi Tiết Đơn Hàng
    </div>
    <div class="table-responsive">
      <?php
        $message = Session::get('message');
        if($message){
          echo '<span class="text-alert">',$message,'</span>';
          Session::put('message',null);
        }
      ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="border: 1px solid;text-align: center;width: 15%;">Thứ tự</th>
            <th style="border: 1px solid;text-align: center;">Tên sản phẩm</th>
            <th style="border: 1px solid;text-align: center;">Số lượng trong kho</th>
            <th style="border: 1px solid;text-align: center;">Mã giảm giá</th>
            <th style="border: 1px solid;text-align: center;">Phí ship hàng</th>
            <th style="border: 1px solid;text-align: center;">Số lượng</th>
            <th style="border: 1px solid;text-align: center;">Giá sản phẩm</th>
            <th style="border: 1px solid;text-align: center;">Tổng tiền</th>
          </tr>
        </thead>
        <tbody>
          @php
              $i = 0;
              $tongtien = 0;
          @endphp
          @foreach($order_details as $key => $chitiet)
            @php
                $i++;
                $thanhtien = $chitiet->product_price*$chitiet->product_sales_quantity;
                $tongtien += $thanhtien;
            @endphp
            <tr class="mau_soluong_{{$chitiet->product_id}}">
              <td style="text-align: center;"><i>{{$i}}</i></td>
              <td style="border: 1px solid;">{{$chitiet->product_name}}</td>
              <td style="border: 1px solid;text-align: center;">{{$chitiet->product->product_quantity}}</td>
              <td style="border: 1px solid;text-align: center;">
                  @if($chitiet->product_coupon != 'no')
                      {{$chitiet->product_coupon}}
                  @else
                      Không Mã
                  @endif
              </td>
              <td style="border: 1px solid;text-align: center;">{{number_format($chitiet->product_feeship,0,',','.')}} đ</td>
              <td style="border: 1px solid;text-align: center;">
                <input type="number" min="1" {{$order_status == 2 ? 'disabled' : ''}} class="sl_donhang_{{$chitiet->product_id}}" value="{{$chitiet->product_sales_quantity}}" name="product_sales_quantity">

                <input type="hidden" name="sl_tonkho" class="sl_tonkho_{{$chitiet->product_id}}" value="{{$chitiet->product->product_quantity}}">

                <input type="hidden" name="order_code" class="order_code" value="{{$chitiet->order_code}}">

                <input type="hidden" name="kiemtra_productid" class="kiemtra_productid" value="{{$chitiet->product_id}}">

                @if($order_status != 2)
                  <button class="btn btn-default update_quantity_order" data-product_id="{{$chitiet->product_id}}" name="update_quantity_order">Cập nhật</button>
                @endif
              </td>
              <td style="border: 1px solid;text-align: center;">{{number_format($chitiet->product_price,0,',','.')}} đ</td>
              <td style="border: 1px solid;text-align: center;">{{number_format($thanhtien,0,',','.')}} đ</td>
            </tr>
          @endforeach  
          <tr>
              <td colspan="2">
                @php
                  $tongtien_giamgia = 0;
                @endphp
                @if($coupon_condition == 1)
                  @php
                    $tongtiensau_giamgia = ($tongtien*$coupon_number)/100;
                    echo 'Tổng giảm: '.number_format($tongtiensau_giamgia,0,',','.').'</br>';
                    $tongtien_giamgia = $tongtien - $tongtiensau_giamgia - $chitiet->product_feeship;
                  @endphp
                @else
                  @php
                    echo 'Tổng giảm: '.number_format($coupon_number,0,',','.').'k'.'</br>';
                    $tongtien_giamgia = $tongtien - $coupon_number - $chitiet->product_feeship;
                  @endphp
                @endif
                Phí ship: {{number_format($chitiet->product_feeship,0,',','.')}} đ</br>
                Thanh toán: {{number_format($tongtien_giamgia,0,',','.')}} đ
              </td>
          </tr>
          <tr>
            <td colspan="6">
              @foreach($order as $key => $dh)
                @if($dh->order_status == 1)
                  <form>
                    @csrf
                    <select class="form-control order_detail">
                      <option value="">------Chọn hình thức đơn hàng------</option>
                      <option id="{{$dh->order_id}}" selected value="1">Chưa xử lý</option>
                      <option id="{{$dh->order_id}}" value="2">Đã xử lý đơn hàng</option>
                      <option id="{{$dh->order_id}}" value="3">Hủy đơn hàng</option>
                    </select>
                  </form>
                @elseif($dh->order_status == 2)
                  <form>
                    @csrf
                    <select class="form-control order_detail">
                      <option value="">------Chọn hình thức đơn hàng------</option>
                      <option id="{{$dh->order_id}}" value="1">Chưa xử lý</option>
                      <option id="{{$dh->order_id}}" selected value="2">Đã xử lý đơn hàng</option>
                      <option id="{{$dh->order_id}}" value="3">Hủy đơn hàng</option>
                    </select>
                  </form>
                @else
                  <form>
                    @csrf
                    <select class="form-control order_detail">
                      <option value="">------Chọn hình thức đơn hàng------</option>
                      <option id="{{$dh->order_id}}" value="1">Chưa xử lý</option>
                      <option id="{{$dh->order_id}}" value="2">Đã xử lý đơn hàng</option>
                      <option id="{{$dh->order_id}}" selected value="3">Hủy đơn hàng</option>
                    </select>
                  </form>
                @endif
              @endforeach   
            </td>
          </tr>
        </tbody>
      </table>
      <div style="text-align: center;">
        <a href="{{url('/in-donhang/'.$chitiet->order_code)}}">In đơn hàng</a>
      </div>     
    </div>
  </div>
</div>
@endsection